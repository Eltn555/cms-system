<?php

namespace App\Services;

use Behat\Transliterator\Transliterator;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class MoyskladService
{
    protected $client;
    protected $baseUri;
    protected $token;

    public function __construct()
    {
        $this->token = env('MOYSKLAD_KEY');
        $this->baseUri = env('MOYSKLAD_BASE');

        $this->client = new Client([
            'base_uri' => $this->baseUri,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
                'Accept-Encoding' => 'gzip',
            ]
        ]);
    }

    public function getStockReport(){
        $allStock = [];
        $limit = 1000;
        $offset = 0;

        while (true) {
            try {
                $response = $this->client->get('report/stock/all', [
                    'query' => [
                        'limit' => $limit,
                        'offset' => $offset,
                    ],
                ]);

                $data = json_decode($response->getBody()->getContents(), true);

                if (isset($data['rows']) && count($data['rows']) > 0) {
                    $allStock = array_merge($allStock, $data['rows']);
                    $offset += $limit;
                } else {
                    break;
                }
            } catch (RequestException $e) {
                if ($e->hasResponse()) {
                    return json_decode($e->getResponse()->getBody()->getContents(), true);
                }
                return ['error' => 'Request failed: ' . $e->getMessage()];
            }
        }
        $checked = 0;
        $created = 0;
        $updated = 0;
        foreach ($allStock as $stock){
            $name = $stock['name'];

            $product = Product::where('title', $name)->first();
            $newPrice = number_format($stock['salePrice'] / 100, 0, '', '');
            $newAmount = number_format($stock['quantity'], 0, '', '');

            if ($newAmount < 0) {
                $newAmount = 0;
            }

            if ($product) {
                // If the product exists, update the price and stock
                if ($product->price != $newPrice || $product->amount != $newAmount) {
                    if ($newAmount == 0 && $product->amount != 0){
                        $product->update([
                            'price' => $newPrice,
                            'amount' => $newAmount,
                            'status' => 0
                        ]);
                    }else{
                        $product->update([
                            'price' => $newPrice,
                            'amount' => $newAmount,
                            'status' => 1
                        ]);
                    }


                    $updated++;
                }
                $checked++;
            } else {
                $next = Product::orderBy('id', 'desc')->first()->id + 1;
                // If the product does not exist, create a new one with is_active set to 0
                Product::create([
                    'title' => $name,
                    'price' => $newPrice,
                    'amount' => $newAmount,
                    'status' => 0,
                    'seo_title' => $name,
                    'slug' => Str::slug(Transliterator::transliterate($name), '-').'-'.$next,
                ]);
                $created++;
            }

        }

        $allStockNames = array_column($allStock, 'name'); // Extract names from $allStock

        // Get all products from the database
        $dbProducts = Product::all(['id', 'title', 'status'])->toArray();

        // Find products in the database that are not in $allStock
        $missingProducts = array_filter($dbProducts, function ($product) use ($allStockNames) {
            return !in_array($product['title'], $allStockNames);
        });

        // Process the missing products
        foreach ($missingProducts as $missingProduct) {
            // Optionally, mark missing products as inactive
            Product::where('id', $missingProduct['id'])->update(['status' => 0]);
            echo "Marked product {$missingProduct['title']} as inactive.\n";
        }
        $telegramBotToken = '7089662981:AAGLhqK0L3VeeOy2KLfeWo1zvswVogy3K_c';

        $response = Http::post("https://api.telegram.org/bot{$telegramBotToken}/sendMessage", [
            'chat_id' => '-1002108174754',
            'text' => 'Синхронизация завершена - '.date("h:i:sa")."\n\nПроверено:$checked \nОтредактировано:$updated \nСоздано:$created",
            'parse_mode' => 'HTML',
        ]);

        return $allStock;
    }
}


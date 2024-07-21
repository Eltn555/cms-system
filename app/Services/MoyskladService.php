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

        foreach ($allStock as $stock){
            $name = $stock['name'];
            $product = Product::where('title', $name)->first();
            if ($product) {
                // If the product exists, update the price and stock
                $product->update([
                    'title' => $name,
                    'price' => number_format($stock['salePrice'] / 100, 0, '', ''),
                    'amount' => number_format($stock['quantity'], 0, '', ''),
                ]);
            } else {
                $next = Product::orderBy('id', 'desc')->first()->id + 1;
                // If the product does not exist, create a new one with is_active set to 0
                Product::create([
                    'title' => $name,
                    'price' => number_format($stock['salePrice'] / 100, 0, '', ''),
                    'amount' => number_format($stock['quantity'], 0, '', ''),
                    'status' => 0,
                    'seo_title' => $stock['name'],
                    'slug' => Str::slug(Transliterator::transliterate($stock['name']), '-').'-'.$next,
                ]);
            }
            $telegramBotToken = '7089662981:AAGLhqK0L3VeeOy2KLfeWo1zvswVogy3K_c';
            $chatId = ['']; //1641704306 You'll need to obtain your chat ID from your bot

                $response = Http::post("https://api.telegram.org/bot{$telegramBotToken}/sendMessage", [
                    'chat_id' => '791430493',
                    'text' => 'Sync finished '.date("h:i:sa"),
                    'parse_mode' => 'HTML',
                ]);
        }

        return $allStock;
    }
}


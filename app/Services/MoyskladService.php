<?php

namespace App\Services;

use Behat\Transliterator\Transliterator;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Models\Product;
use Illuminate\Support\Str;

class MoyskladService
{
    protected $client;
    protected $baseUri;
    protected $token;

    public function __construct()
    {
        $this->token = '4b8f5b48ce0123f61359cafdd5bb62fd41cf9f29';
        $this->baseUri = 'https://api.moysklad.ru/api/remap/1.2/';

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
            $product = Product::where('title', $stock['name'])->first();

            if ($product) {
                // If the product exists, update the price and stock
                $product->update([
                    'price' => number_format($stock['salePrice'], 0, '', ''),
                    'amount' => number_format($stock['quantity'], 0, '', ''),
                ]);
            } else {
                $next = Product::orderBy('id', 'desc')->first()->id + 1;
                // If the product does not exist, create a new one with is_active set to 0
                Product::create([
                    'title' => $stock['name'],
                    'price' => number_format($stock['salePrice'], 0, '', ''),
                    'amount' => number_format($stock['quantity'], 0, '', ''),
                    'status' => 0,
                    'seo_title' => $stock['name'],
                    'slug' => Str::slug(Transliterator::transliterate($stock['name']), '-').'-'.$next,
                ]);
            }
        }

        return $allStock;
    }
}


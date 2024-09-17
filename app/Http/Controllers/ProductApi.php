<?php

namespace App\Http\Controllers;

use App\Services\MoyskladService;
use Illuminate\Support\Facades\Log;
use App\Services\smsService;

class ProductApi extends Controller
{
    protected $moyskladService;
    protected $sms;

    public function __construct(MoyskladService $moyskladService, smsService $sms)
    {
        $this->moyskladService = $moyskladService;
        $this->sms = $sms;
    }

    public function index()
    {
        echo 'started';
        $products = $this->moyskladService->getStockReport();
        if (isset($products['error'])) {
            Log::error('Failed to fetch products: ' . $products['error']);
            abort(500, 'Failed to fetch products');
        }
        foreach ($products as $product) {
            if ($product['stock'] < 1) {
                dd($product);
            }
        }
        echo 'complated';
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\MoyskladService;
use Illuminate\Support\Facades\Log;

class ProductApi extends Controller
{
    protected $moyskladService;

    public function __construct(MoyskladService $moyskladService)
    {
        $this->moyskladService = $moyskladService;
    }

    public function index()
    {
        $products = $this->moyskladService->getStockReport();
        if (isset($products['error'])) {
            Log::error('Failed to fetch products: ' . $products['error']);
            abort(500, 'Failed to fetch products');
        }
        dd($products);
    }
}

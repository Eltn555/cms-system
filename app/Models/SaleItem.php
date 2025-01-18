<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sale;
use App\Models\Product;

class SaleItem extends Model
{
    protected $fillable = [
        'sales_id', 'product_id', 'user_id', 'price', 'discount', 'amount', 'overall'
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id')->withTrashed();
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'sales_id'); // Ensure correct foreign key name
    }
}


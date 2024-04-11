<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    protected $fillable = [
        'sales_id', 'product_id', 'user_id', 'price', 'discount', 'amount', 'overall'
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}


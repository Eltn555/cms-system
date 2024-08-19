<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'click_trans_id',
        'amount',
        'status',
        'perform_time',
        'created_time',
        'cancelled_time',
        'info'
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'order_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = ['title', 'description', 'image', 'text', 'video', 'info'];

    public function categories()
    {
        return $this->belongsToMany(PortfolioCategory::class, 'port_category');
    }
}

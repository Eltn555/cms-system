<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status', 'info'];

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class, 'category_id');
    }
}

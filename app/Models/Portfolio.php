<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'category_id', 'image', 'text', 'video', 'info'];

    public function category()
    {
        return $this->belongsTo(PortfolioCategory::class, 'category_id');
    }

    public function gallery()
    {
        return $this->belongsToMany(Image::class, 'portfolio_images', 'portfolio_id', 'image_id');
    }
}

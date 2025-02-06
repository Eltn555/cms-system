<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioImage extends Model
{
    use HasFactory;

    protected $fillable = ['portfolio_id', 'image_id'];

    protected $table = 'portfolio_images';

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'image',
        'alt'
        ];

    public function portfolios()
    {
        return $this->belongsToMany(Portfolio::class, 'portfolio_images', 'image_id', 'portfolio_id');
    }
}

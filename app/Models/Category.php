<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Image;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'parent_category_id',
        'order_id',
        'title',
        'description',
        'image',
        'seo_title',
        'seo_description',
        'slug',
        'is_active',
    ];

    // Define relationships or additional methods as needed

    public function images() {
        return $this->belongsToMany(Image::class, 'category_images', 'category_id', 'image_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function products() {
        return $this->hasMany(Product::class,'category_id', 'id');
    }


    public function children()
    {
        return $this->hasMany(Category::class, 'parent_category_id')->where('is_active', 1);
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

}

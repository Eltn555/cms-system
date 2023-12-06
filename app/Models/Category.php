<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'category'; // Specify the table name if it's different from the default naming convention

    protected $fillable = [
        'parent_category_id',
        'order_id',
        'title',
        'description',
        'image',
        'seo_title',
        'seo_description',
        'is_active',
    ];

    // Define relationships or additional methods as needed
}

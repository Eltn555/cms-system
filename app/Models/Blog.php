<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'content',
        'image',
        'category_id',
    ];

    public function category() {
        return $this->belongsTo(BlogCategory::class, 'category_id', 'id');
    }
}

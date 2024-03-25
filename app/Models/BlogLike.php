<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogLike extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'blog_id',
        'author_id'
    ];
}

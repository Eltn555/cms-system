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
        'author_id',
        'description',
        'content',
        'image',
        'category_id',
    ];

    public function category() {
        return $this->belongsTo(BlogCategory::class, 'category_id', 'id');
    }

    public function author() {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function likes() {
        return $this->belongsToMany(Account::class,'blog_likes','id', 'account_id');
    }
}

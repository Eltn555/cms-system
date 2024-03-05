<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
      'title',
      'tag_id',
      'image'
    ];

    public function tag() {
        return $this->hasOne(Tag::class, 'id', 'tag_id');
    }
}

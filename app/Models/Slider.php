<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Slider extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'title',
        'text',
        'btn_text',
        'btn_link',
        'image'
    ];


}

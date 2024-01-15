<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Slider extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'sliders';

    protected $fillable = [
        'subtitle',
        'title',
        'href',
        'image'
    ];


}

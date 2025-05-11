<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'media',
        'options',
        'setting_group',
        'setting_key',
        'setting_value',
    ];

    protected $casts = [
        'options' => 'array',
    ];

    public static function getByKey($key)
    {
        return self::where('setting_key', $key)->first() ?? null;
    }

    public static function getByGroup($group)
    {
        return self::where('setting_group', $group)->get() ?? collect([]);
    }
}

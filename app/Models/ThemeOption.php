<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThemeOption extends Model
{
    protected $table = 'theme_options';
    protected $fillable = [
        'key', 'value',
    ];

    public static function get($key)
    {
        $obj = self::where('key', $key)->first();
        if ($obj == null) {
            return null;
        }
        return $obj->value;
    }

    public static function set($key, $value)
    {
        self::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}
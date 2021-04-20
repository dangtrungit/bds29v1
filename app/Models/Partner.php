<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partners';

    protected $appends = ['logo'];
    protected $fillable = [
        'name',
        'slug',
        'address',
        'phone',
        'email',
        'description',
        'areas_of_expertise',
        'rank',
        'logo',
    ];

    protected function getLogoAttribute($value)
    {
        $logo = explode(',', $value);
        foreach ($logo as $value) {
            if ($value !== '') {
                return $value;
            }
        }

    }

}
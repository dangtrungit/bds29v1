<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'provinces';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
        'name_with_type',
        'code',
    ];

    public function districts()
    {
        return $this->hasMany('App\Models\District', 'parent_code', 'code');
    }

    public function realty_posts()
    {
        return $this->hasManyThrough(
            'App\Models\RealtyPost',
            'App\Models\Realty',
            'province_code',
            'realty_id',
            'code',
            'id',
        );
    }

    public function details()
    {
        return $this->hasOne('App\Models\ProvinceDetail', 'province_id', 'id');
    }

}
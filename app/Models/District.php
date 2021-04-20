<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';

    protected $fillable = [
        'name',
        'slug',
        'name_with_type',
        'code',
        'parent_code',
        'path',
        'type',
        'path_with_type',
    ];

    public $timestamps = false;

    public function communes()
    {
        return $this->hasMany('App\Models\Commune', 'parent_code', 'code');
    }

    public function province()
    {
        return $this->belongsTo('App\Models\Province', 'parent_code', 'code');
    }

    public function realties()
    {
        return $this->hasMany('App\Models\Realty', 'district_code', 'code');
    }

    public function realty_posts()
    {
        return $this->hasManyThrough(
            'App\Models\RealtyPost',
            'App\Models\Realty',
            'district_code',
            'realty_id',
            'code',
            'id',
        );
    }

    public function details()
    {
        return $this->hasOne('App\Models\DistrictDetail', 'district_id', 'id');
    }
}
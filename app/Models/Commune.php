<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;

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

    public function district()
    {
        return $this->belongsTo('App\Models\District', 'parent_code', 'code');
    }

    public function details()
    {
        return $this->hasOne('App\Models\CommuneDetail', 'commune_id', 'id');
    }

    public function realty_posts()
    {
        return $this->hasManyThrough(
            'App\Models\RealtyPost',
            'App\Models\Realty',
            'commune_code',
            'realty_id',
            'code',
            'id',
        );
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommuneDetail extends Model
{
    protected $table = "commune_details";

    protected $fillable = [
        'commune_id',
        'area',
        'avatar',
        'images',
        'short_description',
        'full_description',
    ];

}
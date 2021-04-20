<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvinceDetail extends Model
{
    use HasFactory;
    protected $table = "province_details";

    protected $fillable = [
        'province_id',
        'area',
        'avatar',
        'images',
        'short_description',
        'full_description',
    ];

}
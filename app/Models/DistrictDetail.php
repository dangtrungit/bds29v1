<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistrictDetail extends Model
{
    use HasFactory;

    protected $table = "district_details";

    protected $fillable = [
        'district_id',
        'area',
        'avatar',
        'images',
        'short_description',
        'full_description',
    ];

    public function getAvatarAttribute($avatar)
    {
        $array = explode(',', $avatar);
        return $array[0] ?? '';
    }
}
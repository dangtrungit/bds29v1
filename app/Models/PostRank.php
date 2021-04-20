<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostRank extends Model
{
    protected $table = 'realty_post_rank_details';

    protected $fillable = ['name', 'price', 'rank_code', 'description'];

}
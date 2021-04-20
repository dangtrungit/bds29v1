<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisment extends Model
{
    protected $table = 'advertisments';

    protected $fillable = [
        'name',
        'type',
        'content',
        'status',
    ];
}
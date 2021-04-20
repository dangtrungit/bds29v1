<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    protected $table = 'widgets';

    public $timestamps = false;

    protected $appends = ['data_array'];

    public function getDataArrayAttribute()
    {
        return json_decode($this->data);
    }
}
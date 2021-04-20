<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    const STATUS_PUBLISHED = 1;

    protected $table = 'menu_categories';
    protected $fillable = ['name', 'status'];

    public function menus()
    {
        return $this->hasMany('App\Models\Menu', 'category', 'id');
    }
}
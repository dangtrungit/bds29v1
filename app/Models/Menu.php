<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable = ['title', 'icon', 'href', 'parent_id', 'sort', 'text', 'html', 'category'];

    protected $appends = ['children'];

    public function parent()
    {
        return $this->belongsTo('App\Models\Menu');
    }

    public function childs()
    {
        return $this->hasMany('App\Models\Menu', 'parent_id', 'id')->orderBy('sort');
    }

    public function getChildrenAttribute()
    {
        return $this->hasMany('App\Models\Menu', 'parent_id', 'id')->orderBy('sort')->get();
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

}
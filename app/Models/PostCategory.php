<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $table = 'post_categories';

    protected $fillable = ['name', 'slug', 'parent_id', 'status', 'is_featured', 'short_description', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public function childs()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'post_to_category', 'category_id', 'post_id');
    }

    public function getPostRecursion($category = null)
    {
        if (!$category) {
            $category = $this;
        }
        $result = $category->posts();
        foreach ($category->childs as $item) {
            if ($item->id == $category->id) {
                continue;
            }
            $result = $result->merge($this->getChildRecursion($item));
        }
        return $result;
    }

    public function getChildRecursion($category = null)
    {
        if (!$category) {
            $category = $this;
        }
        $result = $category->childs;
        foreach ($category->childs as $item) {
            if ($item->id == $category->id) {
                continue;
            }
            $result = $result->merge($this->getChildRecursion($item));
        }
        return $result;
    }
}
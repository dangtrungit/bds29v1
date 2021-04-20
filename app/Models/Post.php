<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Str;

class Post extends Model
{
    use \Spatie\Tags\HasTags;

    public function visits()
    {
        return visits($this)->relation();
    }

    public function vzt()
    {
        return visits($this);
    }

    protected $table = 'posts';

    protected $fillable = ['name', 'slug', 'short_description', 'content', 'status', 'avatar', 'created_by', 'is_featured'];

    protected $appends = ['thumb'];

    public function author()
    {
        return $this->belongsTo('App\Models\Admin', 'created_by', 'id');
    }

    protected function getThumbAttribute()
    {
        $avatar = explode(',', $this->avatar);
        foreach ($avatar as $value) {
            if ($value !== '') {
                $result = Str::replaceLast('/', '/thumbs/', $avatar[0]);
                return $result;
            }
        }
    }

    protected function getAvatarAttribute($value)
    {
        return Str::replaceLast(',', '', $value);
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\PostCategory', 'post_to_category', 'post_id', 'category_id');
    }

}
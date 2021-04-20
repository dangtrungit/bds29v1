<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Str;

class Ground extends Model
{
    protected $table = 'grounds';

    protected $appends = ['thumbs'];

    protected $fillable = [
        'name',
        'project_id',
        'images',
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id', 'id');
    }

    protected function getThumbsAttribute()
    {
        $thumbs = [];
        foreach (explode(',', $this->images) as $item) {
            if ($item != null) {
                $thumbs[] = Str::replaceLast('/', '/thumbs/', $item);
            }
        }
        return $thumbs;
    }

    public function getImageArrayAttribute()
    {
        if ($this->images) {
            return $this->convertImageStringToArray($this->images, ',');
        }
        return [];
    }

    protected function convertImageStringToArray(string $string = '', string $delimiter = ',')
    {
        $array = explode($delimiter, $string);
        return array_filter($array, function ($item) {
            return $item != '';
        });
    }

}
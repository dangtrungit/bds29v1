<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $append = ['thumb'];

    protected $fillable = [
        "id", "name", 'slug', "investor", "avatar", "full_address", "street", "google_map_lat", "google_map_lng", "province_code", "district_code", "commune_code", "location_description", "site_area", "construction_area", "project_type", "start_time", "launch_time", "status", "description", "promotion_term", "overview_image", "overall_diagram", "gallery", "created_at", "updated_at", "number_of_floors", "number_of_buildings", "number_of_apartments", 'project_progress_desc', 'utilities_desc', 'partner_id',
    ];

    public function realty_posts()
    {
        return $this->hasManyThrough(
            'App\Models\RealtyPost',
            'App\Models\Realty',
            'project_id',
            'realty_id',
            'id',
            'id',
        )->with('realty');
    }

    public function lowest_post()
    {
        return $this->realty_posts()->orderBy('price')->first();
    }

    public function galleries()
    {
        return $this->hasMany('App\Models\ProjectGallery', 'project_id', 'id');
    }

    protected function getThumbAttribute()
    {
        foreach (explode(',', $this->avatar) as $item) {
            if ($item != null) {
                return $item;
            }
        }
        return '';
    }

    protected function getAvatarAttribute($value)
    {
        foreach (explode(',', $value) as $item) {
            if ($item != null) {
                return $item;
            }
        }
        return '';
    }

    protected function getLinkAttribute()
    {
        return route('customer.project.show', $this->slug);
    }

    public function grounds()
    {
        return $this->hasMany('App\Models\Ground', 'project_id', 'id');
    }

    public function province()
    {
        return $this->belongsTo('App\Models\Province', 'province_code', 'code');
    }
    public function district()
    {
        return $this->belongsTo('App\Models\District', 'district_code', 'code');
    }
    public function commune()
    {
        return $this->belongsTo('App\Models\Commune', 'commune_code', 'code');
    }

    public function partner()
    {
        return $this->belongsTo('App\Models\Partner', 'partner_id', 'id');
    }

    public function getOverviewImageArrayAttribute()
    {
        return $this->convertImageStringToArray($this->overview_image ?? '', ',');
    }

    public function getOverAllDiagramArrayAttribute()
    {
        return $this->convertImageStringToArray($this->overall_diagram ?? '', ',');
    }

    protected function convertImageStringToArray(string $string = '', string $delimiter = ',')
    {
        $array = explode($delimiter, $string);
        return array_filter($array, function ($item) {
            return $item != '';
        });
    }

    public function scopePriceBetween(Builder $query, $price_start = 0, $price_end = 100000000000): Builder
    {
        $query = $query->join('realty', 'realty.project_id', '=', 'projects.id')
            ->join('realty_posts', 'realty_posts.realty_id', '=', 'realty.id')
            ->select('projects.*', DB::raw('max(realty_posts.price) as max'), DB::raw('min(realty_posts.price) as min'))
            ->groupBy('projects.id')
            ->havingRaw('NOT max < ?', [$price_start])
            ->havingRaw('NOT min > ?', [$price_end]);
        return $query;
    }
}
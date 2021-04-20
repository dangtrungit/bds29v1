<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realty extends Model
{
    use HasFactory;

    protected $table = 'realty';

    protected $append = ['direction_name', 'type_name'];

    protected $fillable = [
        'type',
        'province_code',
        'district_code',
        'commune_code',
        'street',
        'direction',
        'number_of_bed_rooms',
        'number_of_bath_rooms',
        'number_of_floors',
        'area',
        'description',
        'house_image',
        'house_design_image',
        'full_address',
        'apartment_number',
        'year_built',
        'google_map_lat',
        'google_map_lng',
        'project_id',
        'furniture',
    ];

    protected function convertImageStringToArray(string $string = '', string $delimiter = ',')
    {
        $array = explode($delimiter, $string);
        return array_filter($array, function ($item) {
            return $item != '';
        });
    }

    public function getHouseImageArrayAttribute()
    {
        return $this->convertImageStringToArray($this->house_image ?? '', ',');
    }

    protected function getDirectionNameAttribute()
    {
        switch ($this->direction) {
            case '1':
                return "Đông";
            case '2':
                return "Tây";
            case '3':
                return "Nam";
            case '4':
                return "Bắc";
            case '5':
                return "Đông Bắc";
            case '6':
                return "Đông Nam";
            case '7':
                return "Tây Bắc";
            case '8':
                return "Tây Nam";
            default:
                return 'Không xác định';
        }
        return '';
    }

    protected function getTypeNameAttribute()
    {
        switch ($this->type) {
            case '1':
                return "Chung cư/ Căn hộ";
            case '3':
                return "Nhà riêng";
            case '2':
                return "Đất nền";
        }
        return 'Không xác định';
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

    public function realty_post()
    {
        return $this->hasOne('App\Models\RealtyPost', 'realty_id', 'id');
    }

    public function scopeAreaLowerThan(Builder $query, $area): Builder
    {
        return $query->where('area', '<=', $area);
    }

    public function scopeAreaBiggerThan(Builder $query, $area): Builder
    {
        return $query->where('area', '>=', $area);
    }

    public function scopeAreaBetween(Builder $query, $area_start, $area_end): Builder
    {
        return $query->whereBetween('area', [$area_start, $area_end]);
    }

    public function project()
    {
        return $this->belongsto('App\Models\Project', 'project_id', 'id');
    }
}

<?php

namespace App\Services;

use App\Models\Commune;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class FilterService
{

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function filter($query)
    {
        $this->readQuery();

        $query = QueryBuilder::for($query);

        $realties = $query
            ->allowedFilters(
                AllowedFilter::scope('price_between'),
                AllowedFilter::scope('realty.area_between'),
                AllowedFilter::exact('loai-tin-dang', 'realty_posts.type'),
                AllowedFilter::exact('loai-bds', 'realty.type'),
                AllowedFilter::exact('huong', 'realty.direction'),
                AllowedFilter::exact('tinh', 'realty.province_code'),
                AllowedFilter::exact('huyen', 'realty.district_code'),
                AllowedFilter::exact('xa', 'realty.commune_code'),
                AllowedFilter::exact('du-an', 'realty.project_id'),
                AllowedFilter::exact('us', 'created_by'),
                AllowedFilter::exact('noi-that', 'realty.furniture'),
                AllowedFilter::exact('so-phong-ngu', 'realty.number_of_bed_rooms'),
                AllowedFilter::exact('so-ve-sinh', 'realty.number_of_bath_rooms'),
                'realty.full_address',
            )
            ->allowedSorts('price', 'area', 'rank');

        return $realties;
    }

    public function readQuery()
    {
        $result = [];
        $query = $this->request->all();
        if (!$this->request->has('filter')) {
            $this->request->filter = [];
        }
        foreach ($this->request->all() as $key => $value) {
            switch ($key) {
                case 'dien-tich':
                    $result['realty.area_between'] = $value;
                    break;
                case 'loai-tin-dang':
                    $result['loai-tin-dang'] = $value;
                    break;
                case 'gia':
                    $result['price_between'] = $value;
                    break;
                case 'loai-bds':
                    $result['loai-bds'] = $value;
                    break;
                case 'huong':
                    $result['huong'] = $value;
                    break;
                case 'tinh':
                    $result['tinh'] = $value;
                    break;
                case 'huyen':
                    $result['huyen'] = $value;
                    break;
                case 'xa':
                    $result['xa'] = $value;
                    break;
                case 'us':
                    $result['us'] = $value;
                    break;
                case 'dia-chi':
                    $result['realty.full_address'] = $value;
                    break;
                case 'du-an':
                    $result['du-an'] = $value;
                    break;
                case 'noi-that':
                    $result['noi-that'] = $value;
                    break;
                case 'so-phong-ngu':
                    $result['so-phong-ngu'] = $value;
                    break;
                case 'so-ve-sinh':
                    $result['so-ve-sinh'] = $value;
                    break;
                default:
                    break;
            }
        }

        $this->request->request->set('filter', array_merge($this->request->filter, $result));
        return $this->request->filter;
    }

    public function getSearchAddress()
    {
        $search_field = $this->readQuery();
        if (isset($search_field['tinh'])) {
            if (!empty(config('constant.provinces'))) {
                $provinces = Province::whereIn('code', config('constant.provinces'))->get();
            } else {
                $provinces = Province::orderBy('slug')->get();
            }
            $current_province = $search_field['tinh'];
            $province = Province::with('districts')->where('code', $search_field['tinh'])->first();

            // tạo object
            $result = new \stdClass();
            $result->provinces = $provinces;
            $result->current_province = $current_province;
            $result->districts = $province->districts;
            return $result;
        }

        if (isset($search_field['huyen'])) {
            $district = District::with(['communes', 'province', 'province.districts'])->where('code', $search_field['huyen'])->first();
            if (!$district) {
                return null;
            }
            $current_district = $search_field['huyen'];
            $current_province = $district->province->code;
            $districts = $district->province->districts;
            // tạo object
            $result = new \stdClass();

            $result->current_province = $current_province;
            $result->districts = $districts;
            $result->current_district = $current_district;
            $result->communes = $district->communes;

            return $result;
        }

        if (isset($search_field['xa'])) {
            $commune = Commune::with([
                'district',
                'district.communes',
                'district.province',
                'district.province.districts',
            ])->where('code', $search_field['xa'])->first();
            if (!$commune) {
                return null;
            }
            $result = new \stdClass();

            $result->current_commune = $search_field['xa'];
            $result->current_district = $commune->district->code;
            $result->current_province = $commune->district->province->code;
            $result->communes = $commune->district->communes;
            $result->districts = $commune->district->province->districts;
            return $result;
        }

        return null;
    }
}

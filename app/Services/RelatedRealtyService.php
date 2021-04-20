<?php

namespace App\Services;

use App\Models\District;
use App\Models\Province;

class RelatedRealtyService
{
    public function __construct()
    {

    }

    public function getRelatedRealty($realty_post_type = null, $realty_type = null, $province_code = null, $district_code = null)
    {
        $type_string = '';
        $type_name = '';

        if ($realty_post_type) {
            $type_string = config('constant.realty_post_type.' . $realty_post_type . '.slug') . '-';
        }
        if ($realty_type) {
            $type_name = config('constant.realty_post_type.' . $realty_post_type . '.name');
        }

        if (isset($province_code)) {
            $province = Province::with([
                'districts',
                'districts.realty_posts' => function ($query) use ($realty_post_type) {
                    if ($realty_post_type) {
                        $query->where('realty_posts.type', $realty_post_type);
                    }
                },
                'districts.realty_posts.realty' => function ($query) use ($realty_type) {
                    if ($realty_type) {
                        $query->where('realty.type', $realty_type);
                    }
                }]
            )->where('code', $province_code)->first();
            $result = $province->districts->filter(function ($item) {
                return $item->realty_posts->isNotEmpty();
            })->take(10);

            $realted_district_list = [];

            $realted_district_list['title'] = $type_name . ' bất động sản ' . $province->name;
            foreach ($result as $item) {
                $realted_district_list['items'][] = [
                    'name' => $item->name_with_type,
                    'link' => '/' . $type_string . $item->slug,
                    'count' => $item->realty_posts->count(),
                ];
            };
            $side_lists[] = $realted_district_list;
            return $side_lists;
        }

        if (isset($district_code)) {
            $district = District::with([
                'communes',
                'communes.realty_posts' => function ($query) use ($realty_post_type) {
                    if ($realty_post_type) {
                        $query->where('realty_posts.type', $realty_post_type);
                    }
                },
                'communes.realty_posts.realty' => function ($query) use ($realty_type) {
                    if ($realty_type) {
                        $query->where('realty.type', $realty_type);
                    }
                }]
            )->where('code', $district_code)->first();
            $result = $district->communes->filter(function ($item) {
                return $item->realty_posts->isNotEmpty();
            })->take(10);

            $realted_district_list = [];

            $realted_district_list['title'] = $type_name . ' bất động sản ' . $district->name;
            foreach ($result as $item) {
                $realted_district_list['items'][] = [
                    'name' => $item->name_with_type,
                    'link' => '/' . $type_string . $item->slug,
                    'count' => $item->realty_posts->count(),
                ];
            };
            $side_lists[] = $realted_district_list;
            return $side_lists;
        }

    }

}
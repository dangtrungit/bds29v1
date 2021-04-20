<?php

namespace App\Helpers;

use App\Models\Commune;
use App\Models\District;
use App\Models\Project;
use App\Models\Province;
use Illuminate\Http\Request;
use Str;

class RealtySlugHelper
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getFilterStringFromSlug($slug)
    {
        $realty_post_type = config('constant.realty_post_type');
        $realty_type = config('constant.realty_type');

        $search_query = [];

        foreach ($realty_post_type as $key => $item) {
            if (strpos($slug, $item['slug']) !== false) {
                $slug = Str::replaceFirst($item['slug'], '', $slug);
                $search_query['loai-tin-dang'] = $key;
            }
        }

        foreach ($realty_type as $key => $item) {
            if (strpos($slug, $item['slug']) !== false) {
                $slug = Str::replaceFirst($item['slug'], '', $slug);
                $search_query['loai-bds'] = $key;
            }
        }

        $address_slug = trim($slug, '-');
        $address = Province::where('slug', $address_slug)->first();
        $search_type = 'tinh';
        if (!$address) {
            $address = Project::where('slug', $address_slug)->first();
            $search_type = 'du-an';
        }
        if (!$address) {
            $address = District::where('slug', $address_slug)->first();
            $search_type = 'huyen';
        }
        if (!$address) {
            $address = Commune::where('slug', $address_slug)->first();
            $search_type = 'xa';
        }
        if ($address) {
            switch ($search_type) {
                case 'tinh':
                    $search_query['tinh'] = $address->code;
                    break;
                case 'du-an':
                    $search_query['du-an'] = $address->id;
                    break;
                case 'huyen':
                    $search_query['huyen'] = $address->code;
                    break;
                case 'xa':
                    $search_query['xa'] = $address->code;
                    break;
                default:

                    break;
            }
        }
        $result = array_merge($this->request->filter ?? [], $search_query);
        return $search_query;
    }

}
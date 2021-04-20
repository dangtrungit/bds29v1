<?php

namespace App\Helpers;

use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use Str;

class ProjectSlugHelper
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getFilterStringFromSlug($slug)
    {
        $project_type = config('constant.project_type');
        $filtered = array_filter($project_type, function ($item) use ($slug) {
            if (strpos($slug, $item['slug']) === false) {
                return false;
            }
            return true;
        });
        $search_query = [];
        foreach ($filtered as $index => $item) {
            $slug = Str::replaceFirst($item['slug'], '', $slug);
            $search_query['loai-du-an'] = $index;
            break;
        }

        $address_slug = trim($slug, '-');
        $address = Province::where('slug', $address_slug)->first();
        $search_type = 'tinh';
        if (!$address) {
            $address = District::where('slug', $address_slug)->first();
            $search_type = 'huyen';
        }
        if ($address) {
            switch ($search_type) {
                case 'tinh':
                    $search_query['tinh'] = $address->code;
                    break;
                case 'huyen':
                    $search_query['huyen'] = $address->code;
                    break;
                default:

                    break;
            }
        }
        $result = array_merge($this->request->filter ?? [], $search_query);
        return $result;

    }
}
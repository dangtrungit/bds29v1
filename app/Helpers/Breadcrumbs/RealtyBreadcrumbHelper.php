<?php

namespace App\Helpers\Breadcrumbs;

use App\Models\Commune;
use App\Models\District;
use App\Models\Province;

class RealtyBreadcrumbHelper
{

    public static function createRealtyBreadcrumb($filter = [])
    {
        $links = [];
        $base = '/';
        if (isset($filter['loai-tin-dang'])) {
            $type = config('constant.realty_post_type.' . $filter['loai-tin-dang']);
            if ($type) {
                $base .= $type['slug'];

                $links[] = [
                    'name' => $type['name'],
                    'link' => $base,
                ];
            }

        }

        if (isset($filter['xa'])) {
            $commune = Commune::with(['district', 'district.province'])->where('code', $filter['xa'])->first();

            if ($commune) {
                if ($base !== '/') {
                    $base .= '-';
                }
                $links[] = [
                    'name' => $commune->district->province->name_with_type,
                    'link' => $base . $commune->district->province->slug,
                ];
                $links[] = [
                    'name' => $commune->district->name_with_type,
                    'link' => $base . $commune->district->slug,
                ];
                $links[] = [
                    'name' => $commune->name_with_type,
                    'link' => $base . $commune->slug,
                ];
                return $links;
            }
        }

        if (isset($filter['huyen'])) {
            if ($base !== '/') {
                $base .= '-';
            }
            $district = District::with('province')->where('code', $filter['huyen'])->first();
            if ($district) {
                $links[] = [
                    'name' => $district->province->name_with_type,
                    'link' => $base . $district->province->slug,
                ];
                $links[] = [
                    'name' => $district->name_with_type,
                    'link' => $base . $district->slug,
                ];
                return $links;
            }
        }

        if (isset($filter['tinh'])) {
            if ($base !== '/') {
                $base .= '-';
            }
            $id_list = explode(',', $filter['tinh']);
            $province = Province::whereIn('code', $id_list)->first();
            if ($province) {
                $links[] = [
                    'name' => $province->name,
                    'link' => $base . $province->slug,
                ];
            }
            return $links;
        }

        return $links;
    }

    public static function render()
    {
        $filter = request()->filter;
        $links = self::createRealtyBreadcrumb($filter);
        return view('customer.components.Breadcrumbs.realty_post_breadcrum', compact('links'));
    }
}
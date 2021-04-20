<?php

namespace App\Helpers\Breadcrumbs;

use App\Models\RealtyPost;

class RealtyDetailsBreadcrumbHelper
{

    public static function createBreadcrumb(RealtyPost $realty_post)
    {
        $base = '/';
        $links = [];
        $type = config('constant.realty_post_type.' . $realty_post->type) ?? null;
        $realty_type = config('constant.realty_type.' . $realty_post->realty->type) ?? null;

        $province = $realty_post->realty->province ?? null;
        $district = $realty_post->realty->district ?? null;
        $commune = $realty_post->realty->commune ?? null;

        // type
        $type_link = [];
        if ($type && $realty_type) {
            $base .= $type['slug'] . '-' . $realty_type['slug'];
            $type_link['name'] = $type['name'] . ' ' . $realty_type['name'];
            $type_link['link'] = $base;
        } elseif ($type) {
            $base .= $type['slug'];
            $type_link['name'] = $type['name'];
            $type_link['link'] = $base;

        } elseif ($realty_type) {
            $base .= $realty_type['slug'];
            $type_link['name'] = $realty_type['name'];
            $type_link['link'] = $base;

        }

        $links[] = $type_link;

        if ($province) {
            $links[] = [
                'name' => $province->name_with_type,
                'link' => $base == '/' ? $base . $province->slug : $base . '-' . $province->slug,

            ];
        }
        if ($district) {
            $links[] = [
                'name' => $district->name_with_type,
                'link' => $base == '/' ? $base . $district->slug : $base . '-' . $district->slug,

            ];
        }
        if ($commune) {
            $links[] = [
                'name' => $commune->name_with_type,
                'link' => $base == '/' ? $base . $commune->slug : $base . '-' . $commune->slug,

            ];
        }

        return $links;

    }

    public static function render($realty_post)
    {
        $links = self::createBreadcrumb($realty_post);
        return view('customer.components.Breadcrumbs.realty_post_breadcrum', compact('links'));
    }
}
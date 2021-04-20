<?php

namespace App\Helpers\Breadcrumbs;

use App\Models\PostCategory;

class PostBreadcrumbHelper
{

    public static function createBreadcrumb(PostCategory $post_category = null)
    {
        $base = '/tin-tuc';
        $links = [];

        $links[] = [
            'name' => 'Tin tức',
            'link' => '/tin-tuc',
        ];

        if ($post_category) {
            $links[] = [
                'name' => $post_category->name,
                'link' => route('customer.post.show_by_category', $post_category->slug),
            ];
        };
        return $links;
    }

    public static function render(PostCategory $post_category = null)
    {
        $links = self::createBreadcrumb($post_category);
        return view('customer.components.Breadcrumbs.realty_post_breadcrum', compact('links'));
    }
}
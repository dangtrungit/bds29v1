<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\RealtyPost;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\Tags\Tag;

class RealtyTagController extends Controller
{
    public function getRealtyByTag($slug)
    {
        $query = RealtyPost::with(
            'author',
            'realty',
            'featured_by',
            'realty.province',
            'realty.district',
            'realty.commune')
            ->join('realty as table_realty', 'realty_posts.realty_id', '=', 'table_realty.id')
            ->select([
                'table_realty.area as area',
                'table_realty.commune_code as commune_code',
                'table_realty.district_code as district_code',
                'table_realty.province_code as province_code',
                'realty_posts.*',
            ])
        ;
        $query = QueryBuilder::for($query);

        $tag = Tag::where('slug->vi', $slug)->first();
        $realties = $query->allowedSorts('price', 'area')->withAnyTags([$tag->name], 'realty')->paginate(9)->withQueryString();
        return view('customer.pages.realty_post.list_by_tag', compact('realties', 'tag'));
    }
}
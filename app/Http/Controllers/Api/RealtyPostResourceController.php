<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\RealtyPost;
use App\Services\FilterService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class RealtyPostResourceController extends Controller
{
    public function __construct(FilterService $filter_service)
    {
        $this->filter_service = $filter_service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function getRealtyPosts(Request $request)
    {

        $query = RealtyPost::with(
            'featured_by',
            'author',
            'realty',
            'realty.province',
            'realty.district',
            'realty.commune')
            ->join('realty as table_realty', 'realty_posts.realty_id', '=', 'table_realty.id')
            ->select([
                'table_realty.area as area',
                'realty_posts.*',
            ])
        ;
        // return $query;
        $query = $this->filter_service->filter($query);
        if ($request->has('random')) {
            $realties = $query->orderByDesc('id')->take(50)->get();
            if ($realties->count() >= 8) {
                $realties = $realties->random(8)->sortByDesc('rank');
            }
        } else {
            $realties = $query->paginate(12)->appends(request()->query());

        }

        if (!$realties) {
            return abort(404);
        }

        $result = new Collection;
        foreach ($realties as $realty_post) {
            $realty = $realty_post->realty;
            $string_price = '';
            if ($realty_post->price_type !== 0) {
                $string_price .= \App\Helpers\CurrencyHelper::beautyPrice($realty_post->price);
            }
            $string_price .= ' ' . config('constant.price_type.' . $realty_post->price_type)['front_view'];

            $item = [
                'title' => $realty_post->title,
                'realty_id' => $realty->id,
                'post_id' => $realty_post->id,
                'realty_post_type' => $realty_post->type,
                'realty_post_type_name' => $realty_post->type_name,
                'price' => $realty_post->price,
                'description' => $realty_post->description,
                'realty_id' => $realty_post->realty_id,
                'thumb' => $realty_post->thumb,
                'images' => $realty->house_image_array,
                'link' => route('customer.realty_post.show', $realty_post->slug ?? 'khong-ro'),

                'realty_type' => $realty->type,
                'realty_type_name' => $realty->type_name,
                'province' => $realty->province->name_with_type,
                'district' => $realty->district->name_with_type,
                'commune' => $realty->commune->name_with_type,
                'street' => $realty->street,
                'direction' => $realty->direction_name,
                'apartment_number' => $realty->apartment_number,
                'number_of_bed_rooms' => $realty->number_of_bed_rooms,
                'number_of_bath_rooms' => $realty->number_of_bath_rooms,
                'number_of_floors' => $realty->number_of_floors,
                'area' => $realty->area,
                'description' => $realty->description,
                'house_image' => $realty->house_image,
                'house_design_image' => $realty->house_design_image,
                'full_address' => $realty->full_address,
                'post_rank' => $realty_post->rank,
                'string_price' => $string_price,
            ];
            $result->push($item);
        }

        if ($request->has("type") && $request->type == 'html') {
            return view('customer.components.ajax_component.home_realties', compact('realties'));
        }

        return response()->json($result, 200);
    }
}
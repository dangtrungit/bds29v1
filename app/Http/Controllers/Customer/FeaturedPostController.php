<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\RealtyPost;
use DB;
use Illuminate\Http\Request;

class FeaturedPostController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if (!$user) {
            return abort(404);
        }

        return $user->featured_realties->map(function ($item) {
            return $item->only(['id', 'thumb', 'link', 'title']);
        });
    }

    public function showListFrontend()
    {
        $user = auth()->user();
        if (!$user) {
            return abort(404);
        };
        $realties = RealtyPost::join('user_featured_posts as ufp', 'ufp.realty_post_id', '=', 'realty_posts.id')
            ->with(['realty'])
            ->where('ufp.user_id', $user->id)->paginate(10);
        return view('customer.pages.realty_post.list_featured_post', ['realties' => $realties]);
    }

    public function addRealtyToUserFeatured(Request $request)
    {
        $request->validate([
            'post_id' => 'required|numeric',
        ]);
        $realty_post = RealtyPost::findOrFail($request->post_id);
        try {
            DB::beginTransaction();
            DB::table('user_featured_posts')->updateOrInsert([
                'user_id' => auth()->guard('web')->user()->id,
                'realty_post_id' => $request->post_id,
            ]);
            DB::commit();
            return ['msg' => 'Lưu tin thành công'];
        } catch (Exception $e) {
            DB::rollback();
            return ['msg' => 'Lưu tin không thành công, quý khách vui lòng kiểm tra trạng thái đăng nhập'];
        }

    }

    public function removeRealtyFromUserFeatured(Request $request)
    {
        $request->validate([
            'post_id' => 'required|numeric',
        ]);
        $realty_post = RealtyPost::findOrFail($request->post_id);
        try {
            DB::beginTransaction();
            DB::table('user_featured_posts')->where([
                'user_id' => auth()->guard('web')->user()->id,
                'realty_post_id' => $request->post_id,
            ])->delete();
            DB::commit();
            return ['msg' => 'Bỏ lưu tin thành công'];
        } catch (Exception $e) {
            DB::rollback();
            return ['msg' => 'Bỏ lưu tin không thành công, quý khách vui lòng kiểm tra trạng thái đăng nhập'];
        }
    }
}
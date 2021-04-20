<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Partner;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Project;
use App\Models\Province;
use App\Models\RealtyPost;
use App\Models\Widget;
use App\Services\ProjectService;
use Illuminate\Support\Facades\Request;

class HomeController extends Controller
{
    public function __construct(ProjectService $project_service)
    {
        $this->project_service = $project_service;
    }

    public function index(Request $request)
    {
        $widgets = Widget::all();
        // $linkRequest = $request->all();

        if (!empty(config('constant.provinces'))) {
            $provinces = Province::whereIn('code', config('constant.provinces'))->get();
        } else {
            $provinces = Province::orderBy('slug')->get();
        }
        $featured_district_code = $widgets->where('name', 'bds_noi_bat')->first()->data_array->districts ?? [];
        $featured_district = District::whereIn('code', $featured_district_code)->get();
        $show_districts = District::whereIn('code', $featured_district_code)->where('parent_code', '=',config('constant.provinces'))->join('district_details','districts.id','district_details.district_id')->get();
        if ($show_districts->count() >= 8) {
            $show_districts = $show_districts->random(8)->sortByDesc('district_id');
        }

        $current_post_categories = $widgets->where('name', 'tin_tuc_noi_bat')->first()->data_array->post_categories ?? [];
        $home_featured_cats = PostCategory::whereIn('id', $current_post_categories)
            ->with('posts')
            ->get();
        $home_featured_post = Post::where('is_featured', 1)->take(6)->get();
        $home_projects = $widgets->where('name', 'du_an_noi_bat')->first()->data_array->projects ?? [];

        $home_projects = Project::whereIn('id', $home_projects)->with('realty_posts', 'realty_posts.realty')->get();

        // $home_projects = $this->project_service->getProjectDetails($home_projects)->chunk(3);
        $random_realties_type1 = RealtyPost::with('realty', 'realty.district')->where('type','=',1)->orderByDesc('id')->take(50)->get();
        $random_realties_type2 = RealtyPost::with('realty', 'realty.district')->where('type','=',2)->orderByDesc('id')->take(50)->get();
        if ($random_realties_type1->count() >= 8) {
            $random_realties_type1 = $random_realties_type1->random(8)->sortByDesc('rank');
        }
        if ($random_realties_type2->count() >= 8) {
            $random_realties_type2 = $random_realties_type2->random(8)->sortByDesc('rank');
        }

        $partners = Partner::where('rank', 1)->take(10)->get();
        return view('customer.pages.home.index', compact('partners', 'random_realties_type1', 'random_realties_type2', 'home_projects', 'provinces', 'featured_district', 'home_featured_cats', 'home_featured_post', 'show_districts'));
    }
}

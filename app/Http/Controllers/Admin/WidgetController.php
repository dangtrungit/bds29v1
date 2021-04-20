<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\PostCategory;
use App\Models\Project;
use App\Models\Province;
use App\Models\Widget;
use Illuminate\Http\Request;

class WidgetController extends Controller
{
    public function index()
    {
        $widgets = Widget::all();
        if (!empty(config('constant.provinces'))) {
            $provinces = Province::whereIn('code', config('constant.provinces'))->get();
        } else {
            $provinces = Province::orderBy('slug')->get();
        }
        $projects = Project::all();

        $current_province_code = $widgets->where('name', 'bds_noi_bat')->first()->data_array->province_code ?? null;
        $current_province = $provinces->where('code', $current_province_code)->first();
        if (isset($current_province)) {
            $districts = District::where('parent_code', $current_province->code)->get()->sortBy('slug');
        } else {
            $districts = [];
        }
        $current_district = $widgets->where('name', 'bds_noi_bat')->first()->data_array->districts ?? [];
        $current_projects = $widgets->where('name', 'du_an_noi_bat')->first()->data_array->projects ?? [];

        $post_categories = PostCategory::all()->sortBy('slug');
        $current_post_categories = $widgets->where('name', 'tin_tuc_noi_bat')->first()->data_array->post_categories ?? [];

        return view('admin.pages.widgets.index', compact('widgets',
            'provinces',
            'districts',
            'current_province',
            'current_district',
            'post_categories',
            'current_post_categories',
            'projects',
            'current_projects'
        ));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $widget = Widget::where('name', $request->widget_name)->first();
        if ($widget) {
            $widget->name = $request->widget_name ?? '';
            $widget->data = json_encode($data) ?? '';
            $widget->save();
            return ['msg' => 'Cập nhật thành công'];
        }

        $new_widget = new Widget;
        $new_widget->name = $request->widget_name ?? '';
        $new_widget->data = json_encode($data) ?? '';
        $new_widget->save();
        return ['msg' => 'Tạo mới thành công'];
    }

    public function destroy(Request $request)
    {
        if ($request->has('widget_name')) {
            Widget::where('name', $request->widget_name)->delete();
            return ['msg' => 'Xóa thành công'];
        }
        return ['error' => 'Không tìm thấy data'];
    }
}

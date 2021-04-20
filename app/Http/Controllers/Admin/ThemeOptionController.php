<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ThemeOption;
use Illuminate\Http\Request;

class ThemeOptionController extends Controller
{
    public function index()
    {
        $list = ThemeOption::all();
        $theme_options = [];
        foreach ($list as $item) {
            $theme_options[$item->key] = $item->value;
        };
        return view('admin.pages.theme_options.index', compact('theme_options'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        foreach ($data as $key => $value) {
            ThemeOption::set($key, $value);
        }
        return ['msg' => 'Cập nhật thành công'];
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebConfig;
use Illuminate\Http\Request;

class WebConfigController extends Controller
{
    public function index()
    {
        $list = WebConfig::all();
        $web_config = [];
        foreach ($list as $item) {
            $web_config[$item->key] = $item->value;
        };
        return view('admin.pages.web_config.index', compact('web_config'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        foreach ($data as $key => $value) {
            if ($key == 'bank') {
                $value = json_encode($value);
            }
            WebConfig::set($key, $value);
        }
        return ['msg' => 'Cập nhật thành công'];
    }

    public function showSocialForm()
    {
        $list = WebConfig::all();
        $web_config = [];
        foreach ($list as $item) {
            $web_config[$item->key] = $item->value;
        };
        return view('admin.pages.web_config.social', compact('web_config'));
    }
}
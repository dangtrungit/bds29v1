<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ground;
use Illuminate\Http\Request;

class GroundController extends Controller
{
    public function index($project_id)
    {
        $grounds = Ground::where('project_id', $project_id)->get();
        return $grounds;
    }

    public function store(Request $request)
    {
        Ground::create($request->all());
        return ['msg' => 'Tạo mới thành công'];
    }

    public function edit($id)
    {
        $ground = Ground::findOrFail($id);
        return $ground;
    }

    public function update($id, Request $request)
    {
        $ground = Ground::findOrFail($id);
        $ground->update($request->all());
        return ['msg' => 'Cập nhật thành công'];
    }

    public function destroy($id)
    {
        $ground = Ground::findOrFail($id)->delete();
        return ['msg' => 'Xóa thành công mặt bằng'];
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;

class AdvertismentController extends Controller
{
    public function index()
    {
        $advertisments = Advertisment::all()->sortByDesc('id');
        return view('admin.pages.advertisment.index', compact('advertisments'));
    }

    public function create()
    {
        return view('admin.pages.advertisment.create');
    }

    public function store(\App\Http\Requests\AdvertismentRequest $request)
    {
        $data = $request->all();

        $new_advertisment = Advertisment::create($data);

        if ($data['submit'] == 'save') {
            return redirect()->route('admin.advertisment.edit', $new_advertisment->id)->with('success', 'Tạo mới thành công');
        }
        return redirect()->route('admin.advertisment.index')->with('success', 'Tạo mới thành công');
    }

    public function edit($id)
    {
        $advertisment = Advertisment::findOrFail($id);
        return view('admin.pages.advertisment.edit', compact('advertisment', 'advertisment'));
    }

    public function update($id, \App\Http\Requests\AdvertismentRequest $request)
    {
        $data = $request->all();
        $advertisment = Advertisment::findOrFail($id);

        $advertisment->update($data);
        if ($data['submit'] == 'save') {
            return redirect()->route('admin.advertisment.edit', $advertisment->id)->with('success', 'Cập nhật thành công');
        }
        return redirect()->route('admin.advertisment.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        Advertisment::findOrFail($id)->delete();
        return redirect()->back()->with(['success' => 'Xóa thành công']);
    }
}
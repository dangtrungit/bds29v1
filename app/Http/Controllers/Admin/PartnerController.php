<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all()->sortByDesc('id');
        return view('admin.pages.partner.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.pages.partner.create');
    }

    public function store(\App\Http\Requests\PartnerRequest $request)
    {
        $data = $request->all();
        $new_partner = Partner::create($data);

        if ($data['submit'] == 'save') {
            return redirect()->route('admin.partner.edit', $new_partner->id)->with('success', 'Tạo mới thành công');
        }
        return redirect()->route('admin.partner.index')->with('success', 'Tạo mới thành công');
    }

    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('admin.pages.partner.edit', compact('partner', 'partner'));
    }

    public function update($id, \App\Http\Requests\PartnerRequest $request)
    {
        $data = $request->all();
        $partner = Partner::findOrFail($id);

        $partner->update($data);
        if ($data['submit'] == 'save') {
            return redirect()->route('admin.partner.edit', $partner->id)->with('success', 'Cập nhật thành công');
        }
        return redirect()->route('admin.partner.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        Partner::findOrFail($id)->delete();
        return redirect()->back()->with(['success' => 'Xóa thành công']);
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProvinceRequest;
use App\Models\Province;
use App\Models\ProvinceDetail;
use DataTables;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.pages.provinces.index');
    }

    function list(Request $request) {
        $provinces = Province::withCount(['districts']);
        return DataTables::eloquent($provinces)
            ->addColumn('action', function ($province) {
                return '
            <a data-toggle-for="tooltip" title="Sửa thông tin" href="' . route('admin.province.edit', $province->id) . '"class="btn text-info province-edit"><i class="fas fa-edit" data-toggle="modal" data-target="#province-model"></i></a>
            <a data-toggle-for="tooltip" title="Xóa" href="' . route('admin.province.destroy', $province->id) . '"class="btn text-danger province-destroy"><i class="fas fa-trash" data-toggle="modal" data-target="#province-model"></i></a>
            ';
            })
            ->rawColumns(['action', 'link'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.pages.provinces.create');
    }

    public function store(ProvinceRequest $request)
    {
        $data = $request->all();
        $province = Province::create($data);
        $data['province_id'] = $province->id;
        $province_details = ProvinceDetail::create($data);
        if ($request->submit == 'save') {
            return redirect()->route('admin.province.edit', $province->id)->with('success', 'Tạo mới thành công tỉnh');
        }
        return redirect()->route('admin.province.index')->with('success', 'Tạo mới thành công tỉnh');
    }

    public function edit($id)
    {
        $province = Province::findOrFail($id);
        return view('admin.pages.provinces.edit', compact('province'));
    }

    public function update(ProvinceRequest $request, $id)
    {
        $province = Province::with('details')->findOrFail($id);
        $data = $request->all();
        $province->update($data);
        if ($province->details) {
            $province->details->update($data);
        } else {
            $data['province_id'] = $province->id;
            $province_details = ProvinceDetail::create($data);
        }

        if ($request->submit == 'save') {
            return redirect()->route('admin.province.edit', $province->id)->with('success', 'Cập nhật thành công dự án');
        }
        return redirect()->route('admin.province.index')->with('success', 'Cập nhật thành công dự án');
    }

    public function destroy($id)
    {
        Province::findOrFail($id)->delete();
        return ['msg' => 'Xóa thành công tỉnh!'];
    }
}
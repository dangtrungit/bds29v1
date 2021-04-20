<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DistrictRequest;
use App\Http\Requests\ProvinceRequest;
use App\Models\District;
use App\Models\DistrictDetail;
use App\Models\Province;
use DataTables;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.pages.districts.index');
    }

    function list(Request $request) {
        $districts = District::withCount(['communes'])->with('province');
        return DataTables::eloquent($districts)
            ->addColumn('province', function ($district) {
                return $district->province->name;
            })
            ->addColumn('action', function ($district) {
                return '
            <a data-toggle-for="tooltip" title="Sửa thông tin" href="' . route('admin.district.edit', $district->id) . '"class="btn text-info district-edit"><i class="fas fa-edit" data-toggle="modal" data-target="#district-model"></i></a>
            <a data-toggle-for="tooltip" title="Xóa" href="' . route('admin.district.destroy', $district->id) . '"class="btn text-danger district-destroy"><i class="fas fa-trash" data-toggle="modal" data-target="#district-model"></i></a>
            ';
            })
            ->rawColumns(['action', 'link'])
            ->make(true);
    }

    public function create()
    {
        $provinces = Province::all();
        return view('admin.pages.districts.create', compact('provinces'));
    }

    public function store(ProvinceRequest $request)
    {
        $data = $request->all();
        $district = District::create($data);
        $data['province_id'] = $district->id;
        $district_details = DistrictDetail::create($data);
        if ($request->submit == 'save') {
            return redirect()->route('admin.district.edit', $district->id)->with('success', 'Tạo mới thành công');
        }
        return redirect()->route('admin.district.index')->with('success', 'Tạo mới thành công');
    }

    public function edit($id)
    {
        $district = District::findOrFail($id);
        $provinces = Province::all();
        return view('admin.pages.districts.edit', compact('district', 'provinces'));
    }

    public function update(DistrictRequest $request, $id)
    {
        $district = District::with('details')->findOrFail($id);
        $data = $request->all();
        $district->update($data);

        if ($district->details) {
            $district->details->update($data);
        } else {
            $data['district_id'] = $district->id;
            $district_details = DistrictDetail::create($data);
        }

        if ($request->submit == 'save') {
            return redirect()->route('admin.district.edit', $district->id)->with('success', 'Cập nhật thành công');
        }
        return redirect()->route('admin.district.index')->with('success', 'Cập nhật thành công ');
    }

    public function destroy($id)
    {
        district::findOrFail($id)->delete();
        return ['msg' => 'Xóa thành công tỉnh!'];
    }
}
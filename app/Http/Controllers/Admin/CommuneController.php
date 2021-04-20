<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommuneRequest;
use App\Models\Commune;
use App\Models\CommuneDetail;
use App\Models\District;
use DataTables;
use Illuminate\Http\Request;

class CommuneController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.pages.communes.index');
    }

    function list(Request $request) {
        $communes = Commune::with('district');
        return DataTables::eloquent($communes)
            ->addColumn('district', function ($commune) {
                return $commune->district->path_with_type;
            })
            ->addColumn('action', function ($commune) {
                return '
            <a data-toggle-for="tooltip" title="Sửa thông tin" href="' . route('admin.commune.edit', $commune->id) . '"class="btn text-info commune-edit"><i class="fas fa-edit" data-toggle="modal" data-target="#commune-model"></i></a>
            <a data-toggle-for="tooltip" title="Xóa" href="' . route('admin.commune.destroy', $commune->id) . '"class="btn text-danger commune-destroy"><i class="fas fa-trash" data-toggle="modal" data-target="#commune-model"></i></a>
            ';
            })
            ->rawColumns(['action', 'link'])
            ->make(true);
    }

    public function create()
    {
        $districts = District::all();
        return view('admin.pages.communes.create', compact('districts'));
    }

    public function store(CommuneRequest $request)
    {
        $data = $request->all();
        $commune = Commune::create($data);
        $data['province_id'] = $commune->id;
        $district_details = CommuneDetail::create($data);
        if ($request->submit == 'save') {
            return redirect()->route('admin.commune.edit', $commune->id)->with('success', 'Tạo mới thành công');
        }
        return redirect()->route('admin.commune.index')->with('success', 'Tạo mới thành công');
    }

    public function edit($id)
    {
        $commune = Commune::findOrFail($id);
        $districts = District::all();
        return view('admin.pages.communes.edit', compact('commune', 'districts'));
    }

    public function update(CommuneRequest $request, $id)
    {
        $commune = Commune::with('details')->findOrFail($id);
        $data = $request->all();
        $commune->update($data);
        if ($commune->details) {
            $commune->details->update($data);
        } else {
            $data['commune_id'] = $commune->id;
            $district_details = CommuneDetail::create($data);
        }

        if ($request->submit == 'save') {
            return redirect()->route('admin.commune.edit', $commune->id)->with('success', 'Cập nhật thành công');
        }
        return redirect()->route('admin.commune.index')->with('success', 'Cập nhật thành công ');
    }

    public function destroy($id)
    {
        Commune::findOrFail($id)->delete();
        return ['msg' => 'Xóa thành công xã!'];
    }
}
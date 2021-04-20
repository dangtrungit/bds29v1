<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Commune;
use App\Models\District;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Province;
use Carbon\Carbon;
use DataTables;

class ProjectController extends Controller
{
    public function index()
    {
        return view('admin.pages.project.index');
    }

    public function create()
    {
        if (!empty(config('constant.provinces'))) {
            $provinces = Province::whereIn('code', config('constant.provinces'))->get();
        } else {
            $provinces = Province::orderBy('slug')->get();
        }
        $partners = Partner::all();
        return view('admin.pages.project.create', compact('provinces', 'partners'));
    }

    public function store(ProjectRequest $request)
    {
        $data = $request->all();
        $commune = Commune::where('code', $request->commune_code)->first();
        $data['full_address'] = $request->street . ", " . $commune->path_with_type;

        $data['start_time'] = Carbon::createFromFormat('d/m/Y', $request->start_time);
        $data['launch_time'] = Carbon::createFromFormat('d/m/Y', $request->launch_time);

        $project = Project::create($data);
        if ($request->submit == 'save') {
            return redirect()->route('admin.project.edit', $project->id)->with('success', 'Cập nhật thành công dự án');
        }
        return redirect()->route('admin.project.index')->with('success', 'Cập nhật thành công dự án');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);

        if (!empty(config('constant.provinces'))) {
            $provinces = Province::whereIn('code', config('constant.provinces'))->get();
        } else {
            $provinces = Province::orderBy('slug')->get();
        };
        $districts = District::where('parent_code', $project->district->parent_code ?? 0)->get();
        $communes = Commune::where('parent_code', $project->commune->parent_code ?? 0)->get();
        $partners = Partner::all();

        return view('admin.pages.project.edit', compact('project', 'provinces', 'districts', 'communes', 'partners'));
    }

    public function update(ProjectRequest $request, $id)
    {
        $data = $request->all();
        $commune = Commune::where('code', $request->commune_code)->first();
        $data['full_address'] = $request->street . ", " . $commune->path_with_type;

        $data['start_time'] = Carbon::createFromFormat('d/m/Y', $request->start_time);
        $data['launch_time'] = Carbon::createFromFormat('d/m/Y', $request->launch_time);

        $project = Project::findOrFail($id);

        $project->update($data);
        if ($request->submit == 'save') {
            return redirect()->route('admin.project.edit', $project->id)->with('success', 'Cập nhật thành công dự án');
        }
        return redirect()->route('admin.project.index')->with('success', 'Cập nhật thành công dự án');
    }

    function list() {
        $projects = Project::query();
        return DataTables::eloquent($projects)
            ->editColumn('project_type', function (Project $project) {
                return config('constant.project_type.' . $project->project_type . '.name');
            })
            ->editColumn('name', function ($project) {
                $link = route('customer.project.show', $project->slug ?? 'du-an');
                return "<a href='{$link}' target='_blank'>{$project->name}</a>";
            })
            ->addColumn('thumb', function ($project) {
                return '<img width="100%" src="' . \htmlspecialchars($project->thumb) . '" alt="">';
            })
            ->addColumn('action', function ($project) {
                return '
                <a data-toggle-for="tooltip" title="Sửa thông tin" href="' . route('admin.project.edit', $project->id) . '"class="btn text-info customer-edit"><i class="fas fa-edit" data-toggle="modal" data-target="#customer-model"></i></a>
                <a data-toggle-for="tooltip" title="Xóa" href="' . route('admin.project.destroy', $project->id) . '"class="btn text-danger project-destroy"><i class="fas fa-trash" data-toggle="modal" data-target="#customer-model"></i></a>
                ';
            })
            ->rawColumns(['action', 'thumb', 'status', 'name'])
            ->make(true);
    }

    public function destroy($id)
    {
        $post = Project::findOrFail($id)->delete();

        return ['msg' => 'Xóa thành công'];
    }
}
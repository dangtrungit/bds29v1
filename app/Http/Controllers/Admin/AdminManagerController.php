<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminManagerRequest;
use App\Http\Requests\UpdateAdminManager;
use App\Models\Admin;
use DataTables;
use Hash;
use Illuminate\Support\Facades\Storage;
use Image;
use Str;

class AdminManagerController extends Controller
{
    public function index()
    {
        return view('admin.pages.admin_manager.index');
    }

    function list() {
        $admins = Admin::query()->orderByDesc('id');

        return DataTables::eloquent($admins)
            ->addIndexColumn()
            ->editColumn('avatar', function ($admin) {
                return '<img width="100%" src="' . \htmlspecialchars($admin->profile_photo_path) . '" alt="">';
            })
            ->addColumn('action', function ($admin) {
                return '
                <a data-toggle-for="tooltip" title="Chi tiết user" href="' . route('admin.admin_manager.edit', $admin->id) . '"class="btn text-success admin-edit"><i class="fas fa-eye"></i></a>

                <a data-toggle-for="tooltip" title="Xóa" href="' . route('admin.admin_manager.destroy', $admin->id) . '"class="btn text-danger admin-destroy"><i class="fas fa-trash"></i></a>
                ';
            })
            ->rawColumns(['action', 'avatar'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.pages.admin_manager.create');
    }

    public function store(AdminManagerRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $admin = Admin::create($data);
        if ($data['submit'] == 'save') {
            return redirect()->route('admin.admin_manager.edit', $admin->id)->with('success', 'Tạo mới thành công');
        }
        return redirect()->route('admin.admin_manager.index')->with('success', 'Tạo mới thành công');
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.pages.admin_manager.edit', compact('admin'));
    }

    public function update($id, UpdateAdminManager $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $admin = Admin::findOrFail($id);

        $input = [
            'username' => $request->username,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'fullname' => $request->fullname,
        ];

        if ($request->old_password != null && Hash::check($request->old_password, $admin->password)) {
            $input['password'] = Hash::make($request->password);
        }

        if ($request->old_password != null && !Hash::check($request->old_password, $admin->password)) {
            return redirect()->back()->with('error', 'Mật khẩu cũ không chính xác');
        }

        if ($request->hasFile('avatar')) {
            Storage::makeDirectory('/public/profile-photos');
            $file_path = '/profile-photos/' . Str::random(20) . '.jpeg';
            $image = Image::make($request->file('avatar'))->resize(300, 300)->save(storage_path('app/public' . $file_path));
            try {
                Storage::delete('public' . $admin->profile_photo_path);
            } catch (\Exception $e) {
            }
            $input['profile_photo_path'] = $file_path;
        }

        $admin->update($input);
        if ($data['submit'] == 'save') {
            return redirect()->route('admin.admin_manager.edit', $admin->id)->with('success', 'Cập nhật thành công');
        }

        return redirect()->route('admin.admin_manager.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id)->delete();
        return ['msg' => 'Xóa thành công'];
    }

}
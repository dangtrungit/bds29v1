<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\User;
use DataTables;
use Hash;
use Illuminate\Support\Facades\Storage;
use Image;
use Str;

class CustomerController extends Controller
{
    public function index()
    {
        return view('admin.pages.customer_manager.index');
    }

    function list() {
        $customers = User::query()->orderByDesc('id');

        return DataTables::eloquent($customers)
            ->addIndexColumn()
            ->editColumn('avatar', function ($customer) {
                return '<img width="100%" src="' . \htmlspecialchars($customer->profile_image_path) . '" alt="">';
            })
            ->addColumn('action', function ($customer) {
                return '
                <a data-toggle-for="tooltip" title="Chi tiết user" href="' . route('admin.customer_manager.edit', $customer->id) . '"class="btn text-success admin-edit"><i class="fas fa-eye"></i></a>
                <a data-toggle-for="tooltip" title="Xóa" href="' . route('admin.customer_manager.destroy', $customer->id) . '"class="btn text-danger admin-destroy"><i class="fas fa-trash"></i></a>
                ';
            })
            ->rawColumns(['action', 'avatar'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.pages.customer_manager.create');
    }

    public function store(CustomerRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $customer = User::create($data);
        if ($data['submit'] == 'save') {
            return redirect()->route('admin.customer_manager.edit', $customer->id)->with('success', 'Tạo mới thành công');
        }
        return redirect()->route('admin.customer_manager.index')->with('success', 'Tạo mới thành công');
    }

    public function edit($id)
    {
        $customer = User::findOrFail($id);
        return view('admin.pages.customer_manager.edit', compact('customer'));
    }

    public function update($id, UpdateCustomerRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $customer = User::findOrFail($id);

        $input = [
            'username' => $request->username,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'fullname' => $request->fullname,
            'address' => $request->address,

        ];

        if ($request->old_password != null && Hash::check($request->old_password, $customer->password)) {
            $input['password'] = Hash::make($request->password);
        }

        if ($request->old_password != null && !Hash::check($request->old_password, $customer->password)) {
            return redirect()->back()->with('error', 'Mật khẩu cũ không chính xác');
        }

        if ($request->hasFile('avatar')) {
            $save_path = storage_path('app/public/user_avatar');
            $image_name = Str::random(15) . '.jpg';
            if (!file_exists($save_path)) {
                mkdir($save_path, 777, true);
            }
            Image::make($request->file('avatar'))->save(storage_path('app/public/user_avatar/' . $image_name));
            if (!file_exists($save_path . '/thumbs')) {
                mkdir($save_path . '/thumbs', 777, true);
            }
            Image::make($request->file('avatar'))
                ->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(storage_path('app/public/user_avatar/thumbs/' . $image_name));
            $path = Storage::url('user_avatar/' . $image_name);
        }

        if (isset($path)) {
            $input['profile_image_path'] = $path;
        }

        $customer->update($input);
        if ($data['submit'] == 'save') {
            return redirect()->route('admin.customer_manager.edit', $customer->id)->with('success', 'Cập nhật thành công');
        }

        return redirect()->route('admin.customer_manager.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        $customer = User::findOrFail($id)->delete();
        return ['msg' => 'Xóa thành công'];
    }

}
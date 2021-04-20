<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commune;
use App\Models\District;
use App\Models\Province;
use App\Models\Realty;
use App\Models\RealtyPost;
use App\Models\User;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Str;

class RealtyPostController extends Controller
{
    public function index()
    {
        return view('admin.pages.realty_post.index');
    }

    function list() {
        $posts = RealtyPost::with('realty');
        return DataTables::eloquent($posts)
            ->addIndexColumn()
            ->editColumn('title', function ($post) {
                $link = route('customer.realty_post.show', $post->slug ?? 'bat-dong-san');
                return "<a href='{$link}'>{$post->title}</a>";
            })
            ->filterColumn('realty_posts.created_at', function ($query, $keyword) {
                if ($keyword) {
                    $days = explode(' - ', $keyword);
                    if (!empty($days)) {
                        if (count($days) == 1) {
                            if (Carbon::canBeCreatedFromFormat($days[0], 'd/m/Y')) {
                                $start_date = Carbon::createFromFormat('d/m/Y', $days[0]);
                                $query->whereBetween('realty_posts.created_at', [$start_date, '2200-1-1']);
                            }
                        }
                        if (count($days) >= 2) {
                            if (Carbon::canBeCreatedFromFormat($days[0], 'd/m/Y') && Carbon::canBeCreatedFromFormat($days[1], 'd/m/Y')) {
                                $start_date = Carbon::createFromFormat('d/m/Y', $days[0])->format('Y-m-d');
                                $end_date = Carbon::createFromFormat('d/m/Y', $days[1])->format('Y-m-d');
                                $query->whereBetween('realty_posts.created_at', [$start_date, $end_date]);
                            }
                        }
                    }
                }
            })
            ->addColumn('realty_type', function (RealtyPost $post) {
                switch ($post->realty->type ?? 1) {
                    case '1':
                        return 'Chung cư/Căn hộ';
                    case '2':
                        return 'Nhà riêng';
                    case '3':
                        return 'Đất nền';
                    default:
                        return 'Nhà riêng';
                };
            })
            ->editColumn('created_at', function ($post) {
                return Carbon::parse($post->created_at)->format('d/m/Y');
            })
            ->editColumn('type', function ($post) {
                switch ($post->type) {
                    case '1':
                        return 'Bán';
                    case '2':
                        return 'Cho thuê';
                    default:
                        return 'Bán';
                }
            })
            ->addColumn('thumb', function ($post) {
                return '<img width="100%" src="' . \htmlspecialchars($post->thumb) . '" alt="">';
            })
            ->editColumn('status', function ($post) {
                switch ($post->status) {
                    case 2:
                        return '<span class="badge badge-info">Đã kiểm định</span>';
                    case 3:
                        return '<span class="badge badge-success">Đã đăng</span>';
                    case 4:
                        return '<span class="badge badge-danger">Tin rác</span>';
                    default:
                        return '<span class="badge badge-warning">Chưa duyệt</span>';
                }

            })
            ->addColumn('action', function ($post) {
                return '
                <a target="_blank" data-toggle-for="tooltip" title="Xem trang" href="' . route('customer.realty_post.show', $post->slug) . '"class="btn text-success customer-edit"><i class="fas fa-eye" data-toggle="modal" data-target="#customer-model"></i></a>
                <a data-toggle-for="tooltip" title="Sửa thông tin" href="' . route('admin.realty_post.edit', $post->id) . '"class="btn text-info customer-edit"><i class="fas fa-edit" data-toggle="modal" data-target="#customer-model"></i></a>
                <a data-toggle-for="tooltip" title="Xóa" href="' . route('admin.realty_post.destroy', $post->id) . '"class="btn text-danger realty-post-destroy"><i class="fas fa-trash" data-toggle="modal" data-target="#customer-model"></i></a>
                ';
            })
            ->rawColumns(['action', 'thumb', 'status', 'title'])
            ->make(true);
    }

    public function create()
    {
        if (!empty(config('constant.provinces'))) {
            $provinces = Province::whereIn('code', config('constant.provinces'))->get();
        } else {
            $provinces = Province::orderBy('slug')->get();
        }
        return view('admin.pages.realty_post.create', compact('provinces'));
    }

    public function store(Request $request)
    {
        $commune = Commune::where('code', $request->commune)->first();
        $new_realty = Realty::create([
            'type' => $request->realty_type,
            'province_code' => $request->province,
            'district_code' => $request->district,
            'commune_code' => $request->commune,
            'street' => $request->street,
            'direction' => $request->direction,
            'apartment_number' => $request->apartment_number,
            'number_of_bed_rooms' => $request->number_of_bed_rooms,
            'number_of_bath_rooms' => $request->number_of_bath_rooms,
            'number_of_floors' => $request->number_of_floors,
            'area' => $request->area,
            'description' => $request->description,
            'house_image' => $request->house_image,
            'house_design_image' => $request->house_design_image,
            'full_address' => 'Số nhà' . $request->apartment_number . ", " . $request->street . ", " . $commune->path_with_type,
            'google_map_lat' => $request->google_map_lat,
            'google_map_lng' => $request->google_map_lng,
        ]);
        // store realty post
        $new_realty_post = RealtyPost::create([
            'title' => $request->title,
            'type' => $request->realty_post_type,
            'price' => $request->price,
            'description' => $request->description,
            'realty_id' => $new_realty->id,
            'slug' => $request->slug,

            'contact_name' => $request->contact_name,
            'contact_phone_number' => $request->contact_phone_number,
            'contact_email' => $request->contact_email,
            'contact_address' => $request->contact_address,
            'rank' => $request->rank,
            'open_at' => Carbon::createFromFormat('d/m/Y', $request->open_at)->format('Y-m-d H:i:s'),
            'close_at' => Carbon::createFromFormat('d/m/Y', $request->close_at)->format('Y-m-d H:i:s'),
        ]);

        $new_realty_post->status = $request->status;
        $new_realty_post->save();

        if ($request->submit == 'save') {
            return redirect()->route('admin.realty_post.edit', $realty_post->id)->with('success', 'Cập nhật thành công tin rao');
        }
        return redirect()->route('admin.realty_post.index')->with('success', 'Cập nhật thành công tin rao');
    }

    public function edit($id)
    {
        $realty_post = RealtyPost::with('realty', 'realty.district', 'realty.province', 'realty.commune')->findOrFail($id);
        $realty = $realty_post->realty;
        $house_image = explode(',', $realty_post->realty->house_image);
        $house_design_image = explode(',', $realty_post->realty->house_design_image);

        if (!empty(config('constant.provinces'))) {
            $provinces = Province::whereIn('code', config('constant.provinces'))->get();
        } else {
            $provinces = Province::orderBy('slug')->get();
        }
        $districts = District::where('parent_code', $realty->district->parent_code ?? 0)->get();
        $communes = Commune::where('parent_code', $realty->commune->parent_code ?? 0)->get();

        $house_image = array_map(function ($item) {
            if ($item == '') {
                return;
            }
            return [
                'path' => $item,
                'storage_path' => Str::replaceFirst('/storage/', '', $item),
                'thumb' => Str::replaceLast('/', '/thumbs/', $item),
            ];
        }, $house_image);

        $house_design_image = array_map(function ($item) {
            if ($item == '') {
                return;
            }
            return [
                'path' => $item,
                'storage_path' => Str::replaceFirst('/storage/', '', $item),
                'thumb' => Str::replaceLast('/', '/thumbs/', $item),
            ];
        }, $house_design_image);
        return view('admin.pages.realty_post.edit', compact(
            'realty_post',
            'house_image',
            'house_design_image',
            'districts',
            'provinces',
            'communes',
            'realty'
        ));
    }

    public function update($id, Request $request)
    {
        $commune = Commune::where('code', $request->commune)->first();
        $realty_post = RealtyPost::findOrFail($id);
        $realty = $realty_post->realty;
        $realty->update([
            'type' => $request->realty_type,
            'province_code' => $request->province,
            'district_code' => $request->district,
            'commune_code' => $request->commune,
            'street' => $request->street,
            'direction' => $request->direction,
            'number_of_bed_rooms' => $request->number_of_bed_rooms,
            'number_of_bath_rooms' => $request->number_of_bath_rooms,
            'number_of_floors' => $request->number_of_floors,
            'area' => $request->area,
            'description' => $request->description,
            'apartment_number' => $request->apartment_number,
            'direction' => $request->direction,
            'house_image' => $request->house_image,
            'house_design_image' => $request->house_design_image,
            'full_address' => 'Số nhà' . $request->apartment_number . ", " . $request->street . ", " . $commune->path_with_type,
            'google_map_lat' => $request->google_map_lat,
            'google_map_lng' => $request->google_map_lng,
            'funiture' => $request->furniture,
        ]);
        // store realty post
        $realty_post->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'type' => $request->realty_post_type,
            'price' => $request->price,
            'description' => $request->description,

            'contact_name' => $request->contact_name,
            'contact_phone_number' => $request->contact_phone_number,
            'contact_email' => $request->contact_email,
            'contact_address' => $request->contact_address,
            'rank' => $request->rank,
            'open_at' => Carbon::createFromFormat('d/m/Y', $request->open_at)->format('Y-m-d H:i:s'),
            'close_at' => Carbon::createFromFormat('d/m/Y', $request->close_at)->format('Y-m-d H:i:s'),
        ]);
        $realty_post->status = $request->status;
        $realty_post->save();

        $author = User::find($realty_post->created_by);

        if ($request->submit == 'save') {
            return redirect()->route('admin.realty_post.edit', $realty_post->id)->with('success', 'Cập nhật thành công tin rao');
        }
        return redirect()->route('admin.realty_post.index')->with('success', 'Cập nhật thành công tin rao');
    }

    public function destroy($id)
    {
        $post = RealtyPost::with('realty')->findOrFail($id);
        $realty = $post->realty;
        $post->delete();
        $realty->delete();
        return ['msg' => 'Xóa thành công'];
    }
}

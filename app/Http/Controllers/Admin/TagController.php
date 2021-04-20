<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;

class TagController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.pages.tags.index');
    }

    function list(Request $request) {
        $type = null;
        if ($request->type == 'realty') {
            $type = "App\Models\RealtyPost";
        }
        if ($request->type == 'post') {
            $type = "App\Models\Post";
        }
        $tags = Tag::query();

        if ($type) {
            $tags = $tags->where('taggable_type', $type);
        }
        return DataTables::eloquent($tags)
            ->editColumn('name', function ($tag) {
                return $tag->name ?? '';
            })
            ->addColumn('link', function ($tag) {
                switch ($tag->type) {
                    case 'realty':
                        $link = route('customer.realty_tag.get_all', $tag->slug);
                        return "<a href='{$link}'>{$tag->name}</a>";
                    case 'post':
                        $link = route('customer.post_tag.get_all', $tag->slug);
                        return "<a href='{$link}'>{$tag->name}</a>";
                    default:
                        $link = route('customer.post_tag.get_all', $tag->slug);
                        return "<a href='{$link}'>{$tag->name}</a>";
                }
            })
            ->addColumn('action', function ($tag) {
                return '
            <a data-toggle-for="tooltip" title="Sửa thông tin" href="' . route('admin.tag.edit', $tag->id) . '"class="btn text-info tag-edit"><i class="fas fa-edit" data-toggle="modal" data-target="#tag-model"></i></a>
            <a data-toggle-for="tooltip" title="Xóa" href="' . route('admin.tag.destroy', $tag->id) . '"class="btn text-danger tag-destroy"><i class="fas fa-trash" data-toggle="modal" data-target="#tag-model"></i></a>
            ';
            })
            ->rawColumns(['action', 'link'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.pages.tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $tag = Tag::findOrCreateFromString($request->name);
        $tag->type = $request->type;
        $tag->save();
        if ($request->submit == 'save') {
            return redirect()->route('admin.tag.edit', $tag->id)->with('success', 'Cập nhật thành công dự án');
        }
        return redirect()->route('admin.tag.index')->with('success', 'Cập nhật thành công dự án');
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        return view('admin.pages.tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $tag = Tag::findOrFail($id);
        $tag->name = $request->name;
        $tag->type = $request->type;
        $tag->save();
        if ($request->submit == 'save') {
            return redirect()->route('admin.tag.edit', $tag->id)->with('success', 'Cập nhật thành công dự án');
        }
        return redirect()->route('admin.tag.index')->with('success', 'Cập nhật thành công dự án');
    }

    public function destroy($id)
    {
        Tag::findOrFail($id)->delete();
        return ['msg' => 'Xóa thành công tag!'];
    }
}
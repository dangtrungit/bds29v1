<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCategoryRequest;
use App\Models\PostCategory;

class PostCategoryController extends Controller
{
    public function index()
    {
        $post_categories = PostCategory::all()->sortByDesc('id');
        return view('admin.pages.post_categories.index', compact('post_categories'));
    }

    public function create()
    {
        $post_categories = PostCategory::all()->sortByDesc('id');
        return view('admin.pages.post_categories.create', compact('post_categories'));
    }

    public function store(PostCategoryRequest $request)
    {
        $data = $request->all();
        if (isset($data['is_featured'])) {
            $data['is_featured'] = 1;
        } else {
            $data['is_featured'] = 0;
        };
        $new_cat = PostCategory::create($data);

        if ($data['submit'] == 'save') {
            return redirect()->route('admin.post_category.edit', $new_cat->id)->with('success', 'Tạo mới thành công danh mục');
        }
        return redirect()->route('admin.post_category.index')->with('success', 'Tạo mới thành công danh mục');
    }

    public function edit($id)
    {
        $category = PostCategory::findOrFail($id);
        $post_categories = PostCategory::all()->sortByDesc('id');
        return view('admin.pages.post_categories.edit', compact('category', 'post_categories'));
    }

    public function update($id, PostCategoryRequest $request)
    {
        $data = $request->all();
        $category = PostCategory::findOrFail($id);
        if (isset($data['is_featured'])) {
            $data['is_featured'] = 1;
        } else {
            $data['is_featured'] = 0;
        };
        $category->update($data);
        if ($data['submit'] == 'save') {
            return redirect()->route('admin.post_category.edit', $category->id)->with('success', 'Tạo mới thành công danh mục');
        }
        return redirect()->route('admin.post_category.index')->with('success', 'Tạo mới thành công danh mục');
    }

    public function destroy($id)
    {
        PostCategory::findOrFail($id)->delete();
        return redirect()->back()->with(['success' => 'Xóa thành công']);
    }

}
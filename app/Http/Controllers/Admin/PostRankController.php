<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostRank;
use Illuminate\Http\Request;

class PostRankController extends Controller
{
    public function index()
    {
        $post_ranks = PostRank::all()->sortByDesc('id');
        return view('admin.pages.post_ranks.index', compact('post_ranks'));
    }

    public function create()
    {
        return view('admin.pages.post_ranks.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $new_rank = PostRank::create($data);

        if ($data['submit'] == 'save') {
            return redirect()->route('admin.post_rank.edit', $new_rank->id)->with('success', 'Tạo mới thành công loai tin');
        }
        return redirect()->route('admin.post_rank.index')->with('success', 'Tạo mới thành công loai tin');
    }

    public function edit($id)
    {
        $post_rank = PostRank::findOrFail($id);
        $post_ranks = PostRank::all()->sortByDesc('id');
        return view('admin.pages.post_ranks.edit', compact('post_rank', 'post_ranks'));
    }

    public function update($id, Request $request)
    {
        $data = $request->all();
        $post_rank = PostRank::findOrFail($id);

        $post_rank->update($data);
        if ($data['submit'] == 'save') {
            return redirect()->route('admin.post_rank.edit', $post_rank->id)->with('success', 'Tạo mới thành công loai tin');
        }
        return redirect()->route('admin.post_rank.index')->with('success', 'Tạo mới thành công loai tin');
    }

    public function destroy($id)
    {
        PostRank::findOrFail($id)->delete();
        return redirect()->back()->with(['success' => 'Xóa thành công']);
    }
}
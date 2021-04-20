<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogPostRequest;
use App\Models\Post;
use App\Models\PostCategory;
use Auth;
use DataTables;
use DB;
use Illuminate\Support\Carbon;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.pages.posts.index');
    }

    public function create()
    {
        $categories = PostCategory::all()->sortByDesc('id');
        return view('admin.pages.posts.create', compact('categories'));
    }

    public function store(BlogPostRequest $request)
    {
        $data = $request->all();
        if (isset($data['is_featured'])) {
            $data['is_featured'] = 1;
        } else {
            $data['is_featured'] = 0;
        };
        $data['created_by'] = Auth::user()->id;
        $new_post = Post::create($data);

        if ($request->has('tags_string') && $request->tags_string != '') {
            $tag_list = explode('|', $request->tags_string);
            $new_post->attachTags($tag_list);
        }

        //update category
        if (!isset($data['categories'])) {
            $data['categories'] = [];
        }
        $this->updateCategory($new_post->id, $data['categories']);
        return redirect()->route('admin.post.index')->with('success', 'Tạo mới thành công tin đăng');
    }

    public function edit($id)
    {
        $post = Post::with('categories')->findOrFail($id);
        $categories = PostCategory::all()->sortByDesc('id');
        return view('admin.pages.posts.edit', compact('post', 'categories'));
    }

    public function update($id, BlogPostRequest $request)
    {
        $post = Post::findOrFail($id);
        $data = $request->all();
        if (isset($data['is_featured'])) {
            $data['is_featured'] = 1;
        } else {
            $data['is_featured'] = 0;
        };
        $post->update($data);

        if ($request->has('tags_string') && $request->tags_string != '') {
            $tag_list = explode('|', $request->tags_string);
            $post->syncTags($tag_list);
        }

        //update category
        if (!isset($data['categories'])) {
            $data['categories'] = [];
        }
        $this->updateCategory($post->id, $data['categories']);
        return redirect()->route('admin.post.index')->with('success', 'Cập nhật thành công khóa học');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }

    function list() {
        $posts = Post::with(['author', 'categories']);

        return DataTables::eloquent($posts)
            ->addIndexColumn()
            ->editColumn('name', function ($post) {
                $url = route('customer.post.show', ['cat_slug' => $post->categories->first()->slug ?? 'danh-muc', 'post_slug' => $post->slug]);
                return "<a target='_blank' href='{$url}'>{$post->name} </a>";
            })
            ->addColumn('category', function ($post) {
                $cats = '';
                foreach ($post->categories as $cat) {
                    $cats .= "<span class='badge badge-success'>{$cat->name}</span>";
                }
                return $cats;
            })
            ->filterColumn('posts.created_at', function ($query, $keyword) {
                if ($keyword) {
                    $days = explode(' - ', $keyword);
                    if (!empty($days)) {
                        if (count($days) == 1) {
                            if (Carbon::canBeCreatedFromFormat($days[0], 'd/m/Y')) {
                                $start_date = Carbon::createFromFormat('d/m/Y', $days[0]);
                                $query->whereBetween('posts.created_at', [$start_date, '2200-1-1']);
                            }
                        }
                        if (count($days) >= 2) {
                            if (Carbon::canBeCreatedFromFormat($days[0], 'd/m/Y') && Carbon::canBeCreatedFromFormat($days[1], 'd/m/Y')) {
                                $start_date = Carbon::createFromFormat('d/m/Y', $days[0])->format('Y-m-d');
                                $end_date = Carbon::createFromFormat('d/m/Y', $days[1])->format('Y-m-d');
                                $query->whereBetween('posts.created_at', [$start_date, $end_date]);
                            }
                        }
                    }
                }
            })
            ->editColumn('created_at', function ($post) {
                return Carbon::parse($post->created_at)->format('d/m/Y');
            })
            ->editColumn('avatar', function ($post) {
                return '<img width="100%" src="' . \htmlspecialchars($post->thumb) . '" alt="">';
            })
            ->editColumn('status', function ($post) {
                switch ($post->status) {
                    case 1:
                        return '<span class="badge badge-success">Đang hoạt động</span>';
                    default:
                        return '<span class="badge badge-danger">Dừng hoạt động</span>';
                }

            })
            ->addColumn('action', function ($post) {
                return '
                <a data-toggle-for="tooltip" title="Sửa thông tin" href="' . route('admin.post.edit', $post->id) . '"class="btn text-info customer-edit"><i class="fas fa-edit" data-toggle="modal" data-target="#customer-model"></i></a>
                <a data-toggle-for="tooltip" title="Xóa" href="' . route('admin.post.destroy', $post->id) . '"class="btn text-danger customer-edit"><i class="fas fa-trash" data-toggle="modal" data-target="#customer-model"></i></a>
                ';
            })
            ->rawColumns(['action', 'avatar', 'status', 'name', 'category'])
            ->make(true);
    }

    private function updateCategory($post_id, $categories)
    {

        DB::table('post_to_category')->where('post_id', $post_id)->delete();
        foreach ($categories as $category) {
            DB::table('post_to_category')->insert([
                'post_id' => $post_id,
                'category_id' => $category,
            ]);
        }
    }

}
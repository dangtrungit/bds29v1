<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Project;
use App\Models\Province;
use App\Models\RealtyPost;
use Illuminate\Http\Request;
use Str;

class SlugController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'string' => 'required',
        ]);

        switch ($request->type) {
            case 'post_category':
                return $this->getSlug(PostCategory::class, $request->string);
            case 'post':
                return $this->getSlug(Post::class, $request->string);
            case 'realty_post':
                return $this->getSlug(RealtyPost::class, $request->string);
            case 'project':
                return $this->getSlug(Project::class, $request->string);
            case 'partner':
                return $this->getSlug(Partner::class, $request->string);
            case 'province':
                return $this->getSlug(Province::class, $request->string);
            default:
                # code...
                break;
        }
        return $request->all();
    }

    private function getSlug($model, $string)
    {
        $is_exsist = true;
        $i = 1;
        $base_slug = Str::slug($string);
        $slug = $base_slug;
        while ($is_exsist == true) {
            $instance = $model::where('slug', $slug)->first();
            if (!$instance) {
                break;
            }
            $i++;
            if ($i >= 1) {
                $slug = $base_slug . '-' . $i;
            }
        }
        return $slug;
    }
}
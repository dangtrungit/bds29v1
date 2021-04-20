<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function increaseVisit(Request $request)
    {
        if ($request->has('post') && $request->type == 'post') {
            $post = Post::findOrFail($request->id);
            visits($post)->increment();
        }
        return 'hello';
    }
}
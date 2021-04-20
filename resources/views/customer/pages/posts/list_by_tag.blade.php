@extends('customer.layouts.main')

@section('title')
Tin tức bất động sản
@endsection

@section('css')
@parent
<style>

    .category-post-title{
        line-height: 22px;
    }
    .category-post-title:before{
        content: '';
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #eb5155;
        display: inline-block;
        float: left;
        margin-top: 7px;
        margin-right: 8px;
        flex: 0 0 6px;
    }

    .province{
        line-height: 30px;
    }
</style>
@endsection

@section('content')
<div class="blog-wrapper blog-post hrm-bg-secondary">
	<div class="container pt-4">
        <div class="breadcrumbs">
            <a class="secondary-text" href="/">Trang chủ</a>
            / <a class="secondary-text" href="/tin-tuc">Tin tức</a>
            / <a class="main-text" href="#">Tin tức {{$tag->name}}</a>
        </div>
		<div class="entry-head pt-2">
			<h1 class="font-20 home-title">Tin tức {{$tag->name}}</h1>
        </div>

		<div class="row mb-5">
			<div class="col-md-8">
				<div class="featured-blog p-md-4 rounded-1 bg-white">
                    @foreach ($posts as $post)
                    <div class="category-blog p-4 rounded-1 bg-white">
                        <div class="top-post row">
                            <div class="col-sm-5">
                                <a class="d-block rounded-1 img-wraper" href="{{route('customer.post.show',['cat_slug' => $post->categories->first()->slug ?? 'danh-muc', 'post_slug' => $post->slug] )}}">
                                    <img style="max-height: 200px" class="rounded" src="{{$post->thumb ?? ''}}" alt="{{$post->name ?? ''}}">
                                </a>
                            </div>
                            <div class="post-link col-sm-7 pl-sm-0">
                                <a style="font-weight: 500" class="font-13 text-dark post-title" href="{{route('customer.post.show',['cat_slug' => $post->categories->first()->slug ?? 'danh-muc', 'post_slug' => $post->slug] )}}">{{$post->name}}</a>
                                <div class="mt-2">
                                    <span class="font-10 post-description ">
                                        {{$post->short_description}}
                                    </span>
                                </div>
                                <div class="cl-main-text mt-3 text-muted">
                                    {{App\Helpers\TimeHelper::getDateDiffFromNow($post->created_at)['string'] ?? ''}} trước
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>

                {{$posts->links()}}
			</div>
			@include('customer.pages.posts.sidebar')
		</div>
	</div>
</div>
@endsection

@section('script')
    @parent
    <script>
        $('.post-title').each(function(){
            maxText($(this), 60);
        })

        $('.post-description').each(function(){
            maxText($(this), 180);
        })
        maxText($('.blog_excerpt'), 90);
    </script>
@endsection

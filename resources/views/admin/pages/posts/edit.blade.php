@extends('admin.main_layout')
@section('title')
    Sửa bài viết
@endsection


@section('content')
@include('admin.partials.content_header', ['title' => 'Cập nhật bài viết'])
<section class="content" >
    <div class="container-fluid ">
        <form action="{{route('admin.post.update', $post->id)}}" method="post" class="row">
            @csrf
            @include('admin.pages.posts.form', ['post' => $post])
        </form>

    </div>
</section>
@endsection

@section('script')
<script src="{{asset('/template/ckeditor/ckeditor.js')}}"></script>
@endsection
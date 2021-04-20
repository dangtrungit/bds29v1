@extends('admin.main_layout')
@section('title')
    Sửa lớp học
@endsection


@section('content')
@include('admin.partials.content_header', ['title' => 'Quản lý bài giảng'])
<section class="content" >
    <div class="container-fluid ">
        <form action="{{route('admin.class.update', $class->id)}}" method="post" class="row">
            @csrf
            @include('admin.pages.classes.form', ['class' => $class])
        </form>
    </div>
</section>
@endsection

@section('script')
<script src="{{asset('/template/ckeditor/ckeditor.js')}}"></script>

@endsection
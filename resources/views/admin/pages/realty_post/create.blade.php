@extends('admin.main_layout')
@section('title')
    Trang chủ
@endsection
@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
@include('admin.partials.content_header', ['title' => 'Thêm mới tin rao vặt'])
<section class="content" >
    <div class="container-fluid ">
        <form action="{{route('admin.realty_post.store')}}" method="post" class="row">
            @csrf
            @include('admin.pages.realty_post.form')
        </form>
    </div>
</section>
@endsection

@section('script')
<script src="{{asset('/template/ckeditor/ckeditor.js')}}"></script>
<script>
</script>

@endsection
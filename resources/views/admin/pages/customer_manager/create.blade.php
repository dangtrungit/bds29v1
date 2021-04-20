@extends('admin.main_layout')
@section('title')
    Tạo mới user
@endsection
@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
@include('admin.partials.content_header', ['title' => 'Tạo mới user'])
<section class="content" >
    <div class="container-fluid ">
        <form action="{{route('admin.customer_manager.store')}}" method="post" class="row">
            @csrf
            @include('admin.pages.customer_manager.form')
        </form>
    </div>
</section>
@endsection

@section('script')
<script src="{{asset('/template/ckeditor/ckeditor.js')}}"></script>
<script>
</script>

@endsection

@extends('admin.main_layout')
@section('title')
    Sửa xã phường
@endsection
@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
@include('admin.partials.content_header', ['title' => 'Sửa xã phường'])
<section class="content" >
    <div class="container-fluid ">
        <form action="{{route('admin.commune.update', $commune->id)}}" method="post" class="row">
            @csrf
            @include('admin.pages.communes.form')
        </form>
    </div>
</section>
@endsection

@section('script')
@parent
<script src="{{asset('/template/ckeditor/ckeditor.js')}}"></script>
@endsection

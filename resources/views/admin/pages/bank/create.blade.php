@extends('admin.main_layout')
@section('title')
    Loại tin đăng
@endsection
@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
@include('admin.partials.content_header', ['title' => 'Loại tin đăng'])
<section class="content" >
    <div class="container-fluid ">
        <form action="{{route('admin.bank.store')}}" method="post" class="row">
            @csrf
            @include('admin.pages.bank.form')
        </form>
    </div>
</section>
@endsection


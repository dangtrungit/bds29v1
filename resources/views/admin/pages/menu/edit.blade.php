@extends('admin.main_layout')
@section('title')
    Trang chủ
@endsection



@section('content')

@include('admin.partials.content_header', ['title' => 'Quản lý menu'])

@include('admin.pages.menu.menu_editor', [
    'category' => $category,
    'menu_list' => $menu_list,
])


@endsection
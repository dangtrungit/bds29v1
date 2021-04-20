@extends('admin.main_layout')
@section('title')
    Trang chủ
@endsection

@section('content')

@include('admin.partials.content_header', ['title' => 'Quản lý hình ảnh'])

<iframe src="/admin/laravel-filemanager?type=image" style="width: 100%; height: 800px; overflow: hidden; border: none;"></iframe>

@endsection

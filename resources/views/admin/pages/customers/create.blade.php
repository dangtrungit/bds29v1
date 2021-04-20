@extends('admin.main_layout')
@section('title')
    Thêm học viên
@endsection
@section('content')
@include('admin.partials.content_header', ['title' => 'Cập nhật thông tin học viên'])
<section class="content" >
    <div class="container-fluid ">
        <form action="{{route('admin.customer.store')}}" method="post" class="row">
            @csrf
            @include('admin.pages.customers.form')
        </form>

    </div>
</section>
@endsection

@section('script')
<script src="{{asset('/template/ckeditor/ckeditor.js')}}"></script>
@endsection
@extends('admin.main_layout')
@section('title')
    Chi tiết học viên
@endsection


@section('content')
@include('admin.partials.content_header', ['title' => 'Cập nhật thông tin học viên'])
<section class="content" >
    <div class="container-fluid ">
        <form action="{{route('admin.customer.update', $customer->id)}}" method="post" class="row">
            @csrf
            @include('admin.pages.customers.form', ['customer' => $customer])
        </form>

    </div>
</section>
@endsection

@section('script')
<script src="{{asset('/template/ckeditor/ckeditor.js')}}"></script>
@endsection
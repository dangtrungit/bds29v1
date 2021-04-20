@extends('admin.main_layout')
@section('title')
    Yêu cầu hỗ trợ
@endsection

@section('content')
@include('admin.partials.content_header', ['title' => 'Yêu cầu hỗ trợ'])
<section class="content" >
    <div class="container-fluid ">
        <form action="{{route('admin.contacts.update', $contact->id)}}" method="post" class="row">
            @csrf
            @include('admin.pages.contacts.form')
        </form>
    </div>
</section>
@endsection

@section('script')
<script src="{{asset('/template/ckeditor/ckeditor.js')}}"></script>
@endsection

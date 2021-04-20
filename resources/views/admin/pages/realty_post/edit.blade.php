@extends('admin.main_layout')
@section('title')
    Sửa tin rao
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
        <form action="{{route('admin.realty_post.update', $realty_post->id)}}" method="post" class="row">
            @csrf
            @include('admin.pages.realty_post.form', [
                'house_image' => $house_image,
                'house_design_image' => $house_design_image,
            ])
        </form>
    </div>
</section>
@endsection

@section('script')
<script src="{{asset('/template/ckeditor/ckeditor.js')}}"></script>
<script>
</script>

@endsection
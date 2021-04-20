@extends('admin.main_layout')
@section('title')
    Cài đặt website
@endsection
@section('content')

@section('script')
    @parent
    <script>
        function storeData(data){
            $.ajax({
                url: "{{route('admin.web_config.store')}}",
                data: data,
                type: 'post',
                success: function(data){
                    console.log(data),
                    swalToast('Cập nhật thành công!');
                },
                error: function(data){

                }
            });
        }
    </script>

    @include('admin.pages.web_config.script')
@endsection


@include('admin.partials.content_header', ['title' => 'Web Config'])
<div class="row px-4">
    <div class="col-5 col-sm-3">
        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Cấu hình Email</a>
            <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Cấu hình API Key</a>
            {{-- <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Ngân hàng</a>
            <a class="nav-link" id="vert-tabs-contact-tab" data-toggle="pill" href="#vert-tabs-contact" role="tab" aria-controls="vert-tabs-contact" aria-selected="false">Liên hệ</a> --}}
        </div>
    </div>
    <div class="col-7 col-sm-9">
    <div class="tab-content" id="vert-tabs-tabContent">
        <form id="formEdit"  action="{{route('admin.web_config.store')}}" method="post">
            <div class="tab-content" id="vert-tabs-tabContent">
                <div class="tab-pane text-left show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                    @include('admin.pages.web_config.form.general')
                </div>
                <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                    @include('admin.pages.web_config.form.logo')
                </div>
                <div class="tab-pane fade" id="vert-tabs-contact" role="tabpanel" aria-labelledby="vert-tabs-contact-tab">
                    @include('admin.pages.web_config.form.contact')
                </div>
            </div>
        </form>
    </div>
    </div>
</div>
@endsection



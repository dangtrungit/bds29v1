@extends('admin.main_layout')
@section('title')
    Trang chủ
@endsection
@section('content')

@include('admin.partials.content_header', ['title' => 'Theme Options'])
<div class="row px-4">
    <div class="col-5 col-sm-3">
        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Cấu hình chung</a>
            <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Logo</a>
            <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Mạng xã hội</a>
            <a class="nav-link" id="vert-tabs-contact-tab" data-toggle="pill" href="#vert-tabs-contact" role="tab" aria-controls="vert-tabs-contact" aria-selected="false">Liên hệ</a>
            <a class="nav-link" id="vert-tabs-images-tab" data-toggle="pill" href="#vert-tabs-images" role="tab" aria-controls="vert-tabs-images" aria-selected="false">Hình ảnh</a>

        </div>
    </div>
    <div class="col-7 col-sm-9">
    <div class="tab-content" id="vert-tabs-tabContent">
        <form id="formEdit"  action="{{route('admin.theme_option.store')}}" method="post">
            <div class="tab-content" id="vert-tabs-tabContent">
                <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                    @include('admin.pages.theme_options.form.general')
                </div>
                <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                    @include('admin.pages.theme_options.form.logo')
                </div>
                <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                    @include('admin.pages.theme_options.form.social')
                </div>

                <div class="tab-pane fade" id="vert-tabs-contact" role="tabpanel" aria-labelledby="vert-tabs-contact-tab">
                    @include('admin.pages.theme_options.form.contact')
                </div>

                <div class="tab-pane fade" id="vert-tabs-images" role="tabpanel" aria-labelledby="vert-tabs-images-tab">
                    @include('admin.pages.theme_options.form.images')
                </div>
            </div>
        </form>
    </div>
    </div>
</div>
@endsection

@section('css')

@endsection

@section('script')
    @parent
    <script src="{{asset('/template/ckeditor/ckeditor.js')}}"></script>
    <script>
    </script>
    <script>
        var formData = {};
        function loadEditField(key, value){
            formData[key] = value;
        }

        function storeData(data){
            $.ajax({
                url: "{{route('admin.theme_option.store')}}",
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

        $('.form-field').on('change', function(){
            loadEditField($(this).attr('name'), $(this).val());
        });

        CKEDITOR.on('instanceReady', function(event) {
            var editor = event.editor;

            editor.on('change', function(event) {
                var name = this.name;
                var content = this.getData();
                loadEditField(name, content);
            });
        });

        $('.btnSave').on('click', function(){
            console.log(formData);
            storeData(formData);
            formData = {};
        })
    </script>
@endsection

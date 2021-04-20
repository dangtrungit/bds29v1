@extends('customer.layouts.main')

@section('title')
Trang chủ
@endsection
@section('content')
<section class="bl-content hrm-bg-secondary pt-4">
    <div class="my-account-page">
        <div class="container">
            <div class="bl-my-account pb-5">
                <div class="row">
                    <aside style="z-index: 1" class="main-sidebar mb-3 mx-3 mx-md-0 col-sm-3 h-100 sidebar-light-primary elevation-4">
                        <!-- Sidebar -->
                        <div class="sidebar">
                            <!-- Sidebar user panel (optional) -->
                            <div class="user-panel mt-3 pb-3 mb-3">
                                <div class="bl-avatar text-center" style="position:relative">
                                    <a href="javascript:;" class="change-image-acount">
                                        <div class="avatar-holder mx-auto  rounded-circle shadow-10"
                                            style="background-size: cover; height: 150px; width: 150px; background-image: url('{{auth()->user()->profile_image_path ?? '/images/empty-avatar.jpg'}}');background-position: center;">
                                            <span class="span-camera"></span>
                                        </div>
                                    </a>
                                </div>
                                <p class="text-center text-secondary font-13 mt-2"> <b>{{auth()->user()->name ?? ''}}</b> </p>
                            </div>
                            <nav class="">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                    <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->

                                    <li class="nav-item has-treeview">
                                        <a href="#" class=" nav-link position-realtive d-block">
                                            <i class="fas fa-user nav-icon"></i>
                                            <p class="">Thông tin cá nhân</p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="/tai-khoan" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Thông tin cá nhân</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="nav-item has-treeview">
                                        <a href="#" class=" nav-link position-realtive d-block">
                                            <i class="fas fa-newspaper  nav-icon"></i>
                                            <p class="">Quản lý tin rao</p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="/quan-ly-tin-dang" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Quản lý tin đăng</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="/dang-tin" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Đăng tin</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="nav-item has-treeview">
                                        <a href="#" class=" nav-link position-realtive d-block">
                                            <i class="fas fa-money-bill-wave  nav-icon"></i>
                                            <p class="">Quản lý tài chính</p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="/tai-khoan/so-du" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Thông tin số dư</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="/tai-khoan/nap-tien" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Nạp tiền</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </aside>

                    <div class="col-sm-9 col-right">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div>
                                <div class="bl-account">
                                    <div class="bg-white w-100">
                                        @yield('form')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
@parent
<script src="{{asset('template/AdminLTE/dist/js/adminlte.min.js')}}"></script>

<script>

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.avatar-holder').css('background-image', 'url(' + e.target.result + ')');
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#imgInp").change(function() {
        readURL(this);
    });

    $('.avatar-holder, .avatar-change').on('click', function(){
        $("#imgInp").trigger('click');
    })

</script>
@endsection

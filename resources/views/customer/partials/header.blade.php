@php
	$logos = explode(',', $theme_options['logo'] ?? '');
	$logo = '';
	foreach ($logos as $temp) {
		if ($temp != '') {
			$logo = $temp;
		}
	}
@endphp
@section('css')
    <style>
        .menu-open{
            margin: 0;
            padding: 0;
            top:0;
        }
    </style>
@endsection
{{-- <div class="menu-responsive-overlay"></div> --}}
<div class="navigation sticky-top bg-white">
    <div class="header-container p-md-3 border-bottom">
        <header class="" id="top" role="banner">
            <section class="menu-desktop d-none d-md-flex align-items-center">
                <div class="navbar-header">
                    <div class="" id="brand">
                        <a href="/"><img class="lazy" style="max-height: 75px" data-src="{{$logo}}" alt="brand"></a>
                    </div>
                </div>
                <nav class="d-flex align-items-center desktop-menu">
                    @foreach ($main_menu as $item)
                    <div class="menu-item p-3 @if(isset($item->childs) && $item->childs != []) has-child @endif"><a class="font-weight-bold main-text font-9" href="{{$item->href ?? '#'}}"> {{$item->title}}</a>
                        @isset($item->childs)
                            @if ($item->childs->isNotEmpty())
                                <ul class="child-navigation submenu-1 border px-3 bg-white rounded shadow-10">
                                    @foreach ($item->childs as $child)
                                    <li class="py-2"><a class="main-text" href="{{$child->href}}">{{$child->title}}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        @endisset
                    </div>
                    @endforeach
                </nav>
                <div class="ml-auto d-block pr-3">
                    <a style="position: relative; width: auto; top:0; z-index:2"  href="#" class="pl-3 d-xl-none menu-open font-15 text-secondary" ><i class="far fa-bars"></i></a>
                </div>
                <div class="header-right ml-auto d-none d-xl-flex align-items-center">
                    @if (Auth::check())
                    @php
                        $featured_posts = Auth::user()->featured_realties;
                    @endphp
                    <div class="login-logout d-flex align-items-center">
                        <div class="dropdown featured-top">
                            <button class="btn rounded-circle text-dark px-2 py-1 list-featured-btn bg-white font-14" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                <i class="far fa-heart"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-center mt-3 shadow-10 border-0 " style="width:400px; z-index: 100" aria-labelledby="dropdownMenuButton1">
                                <div class="text-center border-bottom py-2 font-11"><strong>Tin đăng đã lưu</strong></div>
                                @if ($featured_posts->isNotEmpty())
                                <div class=" featured-body">
                                    @if ($featured_posts->isNotEmpty())
                                        @foreach ($featured_posts->take(6) as $item)
                                        <div class="border-bottom featured-item-wraper py-2 px-3">
                                            <a href="{{$item->link}}" class="d-flex featured-item align-items-center">
                                                <div class="img-wraper flex-fixed-20" style="height:50px">
                                                    <img src="{{$item->thumb}}" class="rounded" alt="" srcset="">
                                                </div>
                                                <div class="px-2 position-relative">
                                                    <div class="main-text text-truncate font-9 font-weight-500" style="max-width: 280px;">{{$item->title}}</div>
                                                    <div class="mt-2 secondary-text font-8">Đăng {{App\Helpers\TimeHelper::getDateDiffFromNow($item->created_at)['string']}} trước</div>
                                                    <button type="button" data-featured-id="{{$item->id}}" class="btn bg-white remove-featured-btn position-absolute"><i class="fal fa-times"></i></button>
                                                </div>
                                            </a>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="text-center py-2 featured-show-all" style="display:block">
                                    <a href="/tin-da-luu">Xem tất cả</a>
                                </div>
                                @else
                                <div class="featured-body">
                                    <div class="text-center">
                                        <img src="/images/icons/empty-state.svg" class="my-5 mx-auto" style="width: 70%" alt="">
                                        <p class="font-11 spacing-1">Bấm <i class="mx-1 font-13 far fa-heart"></i> để lưu tin <br>Và xem lại tin ở đây</p>
                                    </div>
                                </div>
                                <div class="text-center featured-show-all py-2" style="display:none">
                                    <a href="/tin-da-luu">Xem tất cả</a>
                                </div>
                                @endif

                            </div>
                        </div>
                        <a class="text-dark font-9" href="/tai-khoan">
                            <strong class="px-2">{{auth()->user()->name}}</strong>
                            <img data-src="{{auth()->user()->profile_image_path ?? '/images/empty-avatar.jpg'}}" style="width: 40px; height:40px" class="lazy rounded-circle" alt="">
                        </a>
                        <a class="text-dark font-14 ml-2" href="/logout"><i class="h-100 px-2 far fa-sign-out-alt"></i></a>
                        <a href="/dang-tin" class="ml-2 font-9 hrm-btn-info p-2"><strong>Đăng tin</strong></a>
                    </div>
                    @else
                    <div class="login-logout">
                        <a href="#" class="text-dark px-2 font-9 " data-toggle="modal" data-target="#register">Đăng ký</a>
                        <a href="#" class="text-dark font-9" data-toggle="modal" data-target="#popup-login"><span class="border-left px-2">Đăng nhập</span></a>
                        <span href="/dang-tin" class="ml-2 btn font-9 btn-outline-info" data-toggle="modal" data-target="#popup-login"><strong>Đăng tin</strong></span>
                    </div>
                    @endif
                </div>
            </section>
        </header>
    </div>
    <section class="header-mobile px-3 pt-2 pb-2 d-md-none" style="background: #024073">
        <div class="d-flex justify-content-between align-items-center">
            <div class="nav-search-btn-scroll  w-100" style="display: none">
                <a class="nav-search-open text-dark d-md-none rounded p-2 d-block bg-white" data-toggle="modal" data-target="#nav-search">
                    <i class="far fa-search font-10"></i> <span class="font-9" style="font-weight: 500">Tìm kiếm bất động sản</span>
                </a>
            </div>

            @if (Auth::check())
                @php
                    $featured_posts = Auth::user()->featured_realties;
                @endphp
                <div class="dropdown featured-top">
                    <button class="btn px-2 py-1 list-featured-btn font-15 text-white" style="background: transparent" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                        <i class="far fa-heart"></i>
                    </button>
                    <div class="dropdown-menu mt-3 shadow-10 border-0 " style="width:95vw; z-index: 100" aria-labelledby="dropdownMenuButton1">
                        <div class="text-center border-bottom py-2 font-11"><strong>Tin đăng đã lưu</strong></div>
                        @if ($featured_posts->isNotEmpty())
                        <div class=" featured-body">
                            @if ($featured_posts->isNotEmpty())
                                @foreach ($featured_posts->take(6) as $item)
                                <div class="border-bottom featured-item-wraper py-2 px-3">
                                    <a href="{{$item->link}}" class="d-flex featured-item align-items-center">
                                        <div class="img-wraper flex-fixed-20" style="height:50px">
                                            <img src="{{$item->thumb}}" class="rounded" alt="" srcset="">
                                        </div>
                                        <div class="px-2 position-relative">
                                            <div class="main-text text-truncate font-9 font-weight-500" style="max-width: 280px;">{{$item->title}}</div>
                                            <div class="mt-2 secondary-text font-8">Đăng {{App\Helpers\TimeHelper::getDateDiffFromNow($item->created_at)['string']}} trước</div>
                                            <button type="button" data-featured-id="{{$item->id}}" class="btn bg-white remove-featured-btn position-absolute"><i class="fal fa-times"></i></button>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="text-center py-2 featured-show-all" style="display:block">
                            <a href="/tin-da-luu">Xem tất cả</a>
                        </div>
                        @else
                        <div class="featured-body">
                            <div class="text-center">
                                <img src="/images/icons/empty-state.svg" class="my-5 mx-auto" style="width: 70%" alt="">
                                <p class="font-11 spacing-1">Bấm <i class="mx-1 font-13 far fa-heart"></i> để lưu tin <br>Và xem lại tin ở đây</p>
                            </div>
                        </div>
                        <div class="text-center featured-show-all py-2" style="display:none">
                            <a href="/tin-da-luu">Xem tất cả</a>
                        </div>
                        @endif

                    </div>
                </div>
            @else
                <button class="btn px-2 py-1 list-featured-btn-unauth font-15 text-white" style="background: transparent" type="button" >
                    <i class="far fa-heart"></i>
                </button>
            @endif

            <a  href="/" class="logo-mobile my-2" style="width: 30%"><img class="img-fluid lazy"  data-src="{{$logo}}" alt="brand"></a>
            <a style="position: relative; width: auto; top:0; z-index:2"  href="#" class="pl-3 menu-open font-15 text-white d-md-none" ><i class="far fa-bars"></i></a>
        </div>
        <div class="nav-search-btn">
            <a class="nav-search-open text-dark d-md-none rounded p-2  d-block bg-white w-100" data-toggle="modal" data-target="#nav-search">
                <i class="far fa-search font-10"></i> <span class="font-9" style="font-weight: 500">Tìm kiếm bất động sản</span>
            </a>
        </div>
</section>
</div>

@if (Agent::isMobile())
@include('customer.components.search.nav_search')
@endif

@section('script')
@parent
    <script>
        $(window).on('scroll', function(){
            var top = $(window).scrollTop();
            if (top > 100) {
                $('.nav-search-btn').hide();
                $('.nav-search-btn-scroll').show();
                $('.logo-mobile').hide();
            }else if(top == 0){
                $('.nav-search-btn').show();
                $('.nav-search-btn-scroll').hide();
                $('.logo-mobile').show();
            }
        })
        $(document).on('click', '.header-right .dropdown-menu', function (e) {
            e.stopPropagation();
        });
        $('.list-featured-btn-unauth').click(function(){
            swalAlert('Bạn vui lòng đăng nhập để thực hiện lưu và xem lại tin', 'error')
        })
    </script>
@endsection

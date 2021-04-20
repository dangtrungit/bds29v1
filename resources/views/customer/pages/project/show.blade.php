@extends('customer.layouts.main')

@section('title')
{{$project->name}}
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('plugins/lightgallery/dist/css/lightgallery.min.css')}}">

@endsection
@section('content')
<div class="page-details project-detail pt-3 hrm-bg-secondary">
	<div class="container">
        <div class="row bg-white py-2 mb-3 ">
            <div class="col-12 mb-2">
                <div class=" pl-0">
                    <div class="breadcrumbs">
                        <a class="secondary-text" href="/">Trang chủ</a>
                        / <a class="secondary-text" href="/du-an-bat-dong-san">Dự án</a>
                        / <a class="main-text" href="#">{{$project->name}}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="feature">
                    <div class="thumnail">
                        <div id="big" class="lightgallery thumnail-big owl-carousel owl-theme">
                            @foreach ($project->overview_image_array ?? [] as $img)
                            <div data-src="{{$img}}" class="rounded item embed-responsive embed-responsive-16by9 position-relative">
                                <div class="blur-bg position-absolute w-100 h-100" style="top: 0;  background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{$img}}');"></div>
                                <img class="embed-responsive-item rounded" src="{{$img}}" style="object-fit: contain" alt="">
                            </div>
                            @endforeach
                        </div>
                        <div id="thumbs" class="thumnail-thumbs owl-carousel owl-theme mt-2">
                            @foreach ($project->overview_image_array ?? [] as $img)
                            <div class="item embed-responsive embed-responsive-16by9">
                                <img class="embed-responsive-item rounded" src="{{$img}}" alt="">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex flex-column justify-content-center h-100">
                <div>
                    <h5 class="font-weight-600">Tổng quan dự án</h5>
                    <hr class="my-3">
                    <div class="my-3">
                        <span class="text-secondary mr-2">Loại hình dự án: </span> <span>{{config('constant.project_type.'. $project->project_type)['name'] ?? '---'}}</span>
                    </div>
                    <div class="my-3">
                        <span class="text-secondary mr-2">Số tòa: </span> <span>{{$project->number_of_buildings . 'tòa' ?? '---'}}</span>
                    </div>
                    <div class="my-3">
                        <span class="text-secondary mr-2">Số căn: </span> <span>{{$project->number_of_apartments . 'căn' ?? '---'}}</span>
                    </div>
                    <div class="my-3">
                        <span class="text-secondary mr-2">Số tầng: </span> <span>{{$project->number_of_buildings . 'tầng' ?? '---'}}</span>
                    </div>
                    <div class="my-3">
                        <span class="text-secondary mr-2">Tổng diện tích: </span> <span>{!!$project->site_area . ' m<sup>2</sup>' ?? '---'!!}</span>
                    </div>
                    <div class="my-3">
                        <span class="text-secondary mr-2">Diện tích xây dựng: </span> <span>{!!$project->construction_area . ' m<sup>2</sup>' ?? '---'!!}</span>
                    </div>
                    <div class="my-3">
                        <span class="text-secondary mr-2">Trạng thái: </span> <span class="btn btn-info py-1">{{config('constant.project_status.' . $project->status)['name'] ?? '---'}}</span>
                    </div>
                </div>
                <div class="mt-3">
                    <h5 class="mt-4">Tải tài liệu chi tiết dự án</h5>
                    <hr class="my-3">
                    <a class="btn btn-outline-info w-100 pt-2" href="/">Tên tài liệu</a>
                </div>
            </div>
        </div>
		<div class="row mt-2 bg-white">
            <div id="menu-project" class="col-12 menucontent menu-project py-2 border-bottom d-flex">
                <a class="font-10 secondary-text pr-3 py-2" href="#info">Thông tin</a>
                <a class="font-10 secondary-text px-3 py-2 " href="#gallery">Hình ảnh</a>
                <a class="font-10 secondary-text px-3 py-2 " href="#rental">Bất động sản thuê ({{$project->rent_realty->count()}})</a>
                <a class="font-10 secondary-text px-3 py-2 " href="#vendor">Bất động sản bán ({{$project->sell_realty->count()}})</a>
                <span class="group-btn share-group ml-auto">
                    @include('customer.components.share_button')
                </span>

            </div>
			<div class="col-md-8 pb-3 mb-5">
				<div class="content-detail mt-4">
                    <h1 class="text-dark font-15 entry-title">{{$project->name ?? 'Đang cập nhật'}}</h1>
                    <div class=" pb-4 mb-4 font-9">
                        <div class="pb-2"><i class="pr-2 fal fa-map-marker-alt"></i> {{$project->full_address}}</div>
                        <span class="mr-3">
                            Trạng thái: <strong class="main-blue">{{config('constant.project_status.'. $project->status)['name'] ?? 'Đang cập nhật'}}</strong>
                        </span>
                        <span class="">
                            Khoảng giá:
                            <strong>
                                @if ($project->min_price && $project->max_price)
                                {{beautyPrice($project->min_price)}} - {{beautyPrice($project->max_price)}}
                                @else
                                    Đang cập nhật
                                @endif
                            </strong>
                        </span>
                        <div class="d-flex mt-3">
                            <div class="pr-3">
                                <p class="mb-1" >Mức giá</p>
                                <strong class="font-9">
                                    @if ($project->min_price && $project->max_price)
                                    {{beautyPrice($project->min_price)}} - {{beautyPrice($project->max_price)}}
                                    @else
                                        Đang cập nhật
                                    @endif
                                </strong>
                            </div>
                            <div class="pl-3">
                                <p class="mb-1" >Bàn giao</p>
                                <strong class="font-9">
                                    {{\Carbon\Carbon::parse($project->launch_time)->format('d/m/Y') ?? 'Đang cập nhật'}}
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="d-block pr-5 py-0">Thông tin dự án</h4>
                        <hr class="w-100 d-block" style="flex: 1">
                    </div>
                    <div>
                        <a  data-toggle="collapse" href="#project-overview" role="button" aria-expanded="false" aria-controls="project-overview" class="text-info d-flex justify-content-between align-itens-center">
                            <h5 class="font-11 py-2">Giới thiệu</h5> <i class="far fa-chevron-down"></i>
                        </a>
                        <div id="project-overview">
                            {!! $project->description !!}
                        </div>
                    </div>

                    <div>
                        <a  data-toggle="collapse" href="#project-position" role="button" aria-expanded="false" aria-controls="project-position" class="text-info d-flex justify-content-between align-itens-center">
                            <h5 class="font-11 py-2">Vị trí dự án</h5> <i class="far fa-chevron-down"></i>
                        </a>
                        <div id="project-position">
                            {!! $project->location_description !!}
                        </div>
                    </div>

                </div>

                <div>
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="d-block pr-5 py-0">Sơ đồ dự án</h4>
                        <hr class="w-100 d-block" style="flex: 1">
                    </div>
                    <div>
                        <a  data-toggle="collapse" href="#project-images" role="button" aria-expanded="false" aria-controls="project-images" class="text-info d-flex justify-content-between align-itens-center">
                            <h5 class="font-11 py-2">Giới thiệu</h5> <i class="far fa-chevron-down"></i>
                        </a>
                        <div id="project-images">
                            <ul class="nav nav-tabs menucontent">
                                <li class="py-2 pr-3"><a data-toggle="tab" href="#ground_total" class="active">Sơ đồ tổng thế</a></li>
                                @foreach ($project->grounds as $item)
                                <li class="py-2 px-3"><a data-toggle="tab" href="#ground{{$item->id}}">{{$item->name}}</a></li>
                                @endforeach
                            </ul>
                            <div class="tab-content mt-3">
                                <div id="ground_total" class="active tab-pane over-all-diagram">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div href="{{$project->over_all_diagram_array[0] ?? ''}}" class="img-wraper item">
                                                <img src="{{$project->over_all_diagram_array[0] ?? ''}}" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @foreach ($project->grounds as $item)
                                <div id="ground{{$item->id}}" class="tab-pane fade">
                                    <div class="row">
                                        @foreach ($item->image_array as $item)
                                            <div class="col-md-3">
                                                <div class="item">
                                                    <div href="{{$item}}" class="img-wraper item" >
                                                        <img src="{{$item}}" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                </div>

                <div>
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="d-block pr-5 py-0">Tiến độ dự án</h4>
                        <hr class="w-100 d-block" style="flex: 1">
                    </div>
                    <div>
                        <a  data-toggle="collapse" href="#project-progress" role="button" aria-expanded="false" aria-controls="project-progress" class="text-info d-flex justify-content-between align-itens-center">
                            <h5 class="font-11 py-2">Thông tin tiến độ</h5> <i class="far fa-chevron-down"></i>
                        </a>
                        <div id="project-progress">
                            {!! $project->project_progress_desc !!}
                        </div>
                    </div>
                </div>

                @if ($project->rent_realty->isNotEmpty())
                    <div id="rental" class="rental page-section">
                        <div class="entry-head text-center pb-2 d-flex  justify-content-between align-items-center">
                            <h2 class="font-14 home-title">Bất động sản nổi cho thuê</h2>
                            <a href="/{{config('constant.realty_post_type.2.slug')}}-{{$project->slug}}" class="text-dark">Xem tất cả <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                        <div class="list-project">
                            <div class="list-rental owl-carousel">
                                @foreach ($project->rent_realty as $item)
                                    <div class="item p-2">
                                        @include('customer.components.realty_post.realty_block', ['item' => $item])
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                @if ($project->sell_realty->isNotEmpty())
                    <div id="vendor" class="vendor page-section pt-3">
                        <div class="entry-head text-center pb-2 d-flex  justify-content-between align-items-center">
                            <h2 class="font-14 home-title">Bất động sản bán</h2>
                            <a href="/{{config('constant.realty_post_type.1.slug')}}-{{$project->slug}}" class="text-dark">Xem tất cả <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                        <div class="list-project">
                            <div class="list-vendor owl-carousel">
                                @foreach ($project->sell_realty as $item)
                                    <div class="item p-2">
                                        @include('customer.components.realty_post.realty_block', ['item' => $item])
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-4">
                <div class="p-3 rounded border mt-4">
                    <div class="d-flex">
                        <div>
                            <img src="{{$project->partner->logo ?? ''}}" class="pr-2 rounded-circle" style="width:60px; height:60px" alt="">
                        </div>
                        <div class="font-9">
                            <span style="line-height: 1em" class="text-info font-weight-500 font-10">{{$project->partner->name ?? ''}}</span> <br>
                            <span class="mt-2 d-block">Chủ đầu tư</span>
                        </div>
                    </div>
                    <div class="font-9 mt-2">
                        {!! $project->partner->description ?? '' !!}
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection

@section('script')
    @parent
    <script src="{{asset('plugins/lightgallery/dist/js/lightgallery.min.js')}}"></script>
    <script>

        lightGallery(document.querySelector('.lightgallery'), {
            selector: '.item'
        });

        lightGallery(document.querySelector('.over-all-diagram'), {
            selector: '.item'
        });

        @foreach ($project->grounds as $item)
        lightGallery(document.getElementById("ground{{$item->id}}"), {
            selector: '.item'
        });
        @endforeach

        $('.list-rental, .list-vendor').owlCarousel({
            items: 3,
            loop: true,
            margin: 0,
            dots: false,
            nav: false,
            autoplay: false,
            autoplayTimeout: 3000,
            autoplaySpeed: 1200,
            smartSpeed: 1200,
        });
    </script>
@endsection

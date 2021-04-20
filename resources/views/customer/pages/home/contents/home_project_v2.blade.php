<section class="home-post pt-5 pb-2 section bg-white">
	<div class="container">
        <div class="row p-0">
            <div class="col-md-9">
                <div class="d-flex">
                    <h3 class="font-18 font-weight-600 home-title color-dark">Dự án nổi bật</h3>
                    <div class="ml-auto d-flex align-items-center">
                        <a href="/du-an-bat-dong-san" class="text-dark">Xem tất cả <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
                <div class="project-container owl-carousel">
                    @foreach ($home_projects as $chunk)
                        <div class="item ">
                            @foreach ($chunk as $project)
                                <div class=" mb-4 row p-0 border bg-white mx-0">
                                    <div class="col-md-3 col-5 p-0">
                                        <a href="{{route('customer.project.show', $project->slug)}}" class="img-wraper h-100" >
                                            <img class="lazy" data-src="{{$project->avatar}}" alt="{{$project->avatar}}" srcset="">
                                        </a>
                                    </div>
                                    <div class="col-md-9 col-7 px-3 py-2">
                                        <div class="d-md-flex mb-2">
                                            <a href="{{route('customer.project.show', $project->slug)}}" class="text-danger font-md-12 font-10">{{Agent::isMobile() ? Str::limit($project->name, 30, '...') : Str::limit($project->name, 40, '...')}}</a>
                                            <span class="d-md-block d-none ml-auto text-secondary">
                                                <i class="fas fa-dollar-sign"></i>
                                                <span class="text-dark font-md-12 font-9">
                                                    @if ($project->min_price && $project->max_price)
                                                    {{beautyPrice($project->min_price)}} - {{beautyPrice($project->max_price)}}
                                                    @else
                                                        Đang cập nhật
                                                    @endif
                                                </span>
                                            </span>
                                        </div>
                                        <div class="mb-1 pb-2 border-bottom font-10 d-none d-md-block">
                                            {{$project->full_address}}
                                        </div>
                                        <div class="row text-secondary font-9">
                                            <div class="mb-2 col-md-8 d-none d-md-block">
                                                <i class="fas fa-user-tie pr-2"></i> <strong>{{$project->investor}}</strong>
                                            </div>
                                            <div class="mb-2 col-md-4 d-none d-md-block">
                                                <i class="fas fa-expand pr-2"></i> {{$project->site_area . ' m2' ?? 'Đang cập nhật'}}
                                            </div>
                                            <div class="mb-2 col-md-8 d-none d-md-block">
                                                <i class="far fa-clock pr-2"></i> Bàn giao: {{\Carbon\Carbon::parse($project->launch_time)->format('d/m/Y') ?? 'Đang cập nhật'}}
                                            </div>
                                            <div class="mb-md-2 col-md-4">
                                                <i class="fas fa-wrench pr-2"></i> {{config('constant.project_status.'. $project->status)['name'] ?? 'Đang cập nhật'}}
                                            </div>
                                        </div>
                                        <div class="d-none d-md-block">
                                            @if(!empty($project->list_realty_type))
                                                @foreach ($project->list_realty_type as $item)
                                                <a href="{{config('constant.realty_type.'. $item)['slug']}}" class="badge hrm-btn-info-solid p-1">{{config('constant.realty_type.'. $item)['name']}}</a>
                                                @endforeach
                                            @else
                                                <a href="#" class="badge hrm-btn-info-solid p-1">Đang cập nhật</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                @isset($vertical_advertisments)
                    @include('customer.components.advertisments.vertical', ['items' => $vertical_advertisments, 'items_mobile' => $mobile_vertical_advertisments])
                @endisset
            </div>
        </div>
	</div>
</section>

@section('script')
@parent
<script>
    $('.project-container').owlCarousel({
        loop:true,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true,
        margin: 20,
        dots:false,
        nav:false,
        autoplayTimeout:3000,
        autoplaySpeed:1200,
        smartSpeed:1200,
        responsive:{
            0:{
                items:1,
            },
        }
    });
</script>
@endsection

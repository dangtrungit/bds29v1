@extends('customer.layouts.main')




@section('title'){{$seo->title ?? 'Tin đã lưu'}}@endsection

@section('content')
@include('customer.components.search_top')
<div class="page-content hrm-bg-secondary">
	<div class="container">
        <div class="pt-3">

        </div>
		<div class="row">
			<div class="col-md-9">
				<div class="entry-head-3 mt-2">
					<div class="ht mb-3">
                        <h1 class="font-15">Tin đăng Đã lưu"</h1>
					</div>
				</div>
				<div id="view-as-grid">
					<div class="row bds-hot-district mt-3">
                        @foreach ($realties as $index => $item)
                        <div class="col-md-4 mb-3">
                            <div class="block realty">
                                <div class="realty-container shadow-6 flex-wrap rounded d-flex d-md-block">
                                    <div class="overflow-hidden col-5 px-0 col-md-12 order-2 bg-white">
                                        <a href="{{$item->link}}"class="d-block ml-2 ml-md-0 img-wraper height-md-180 height-120">
                                            <img class="lazy" data-src="{{$item->thumb}}" alt="" srcset="">
                                        </a>
                                        @if ($item->rank == 4)
                                            <div class="ribbon-wrapper ribbon">
                                                <div class="ribbon bg-danger font-6 text-white">
                                                Nổi bật
                                                </div>
                                            </div>
                                        @endif
                                        @if ($item->rank == 3)
                                            <div class="ribbon-wrapper ribbon">
                                                <div class="ribbon bg-info font-6 text-white">
                                                Vip
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="order-1 col-12 bg-white px-2 pt-2 pb-2 pb-md-0">
                                        <a href="{{$item->link}}" class="d-block font-9 main-text w-100 hrm-truncate
                                            @if ($item->rank == 4)
                                            text-danger
                                            @endif
                                            @if ($item->rank == 3)
                                            text-info
                                            @endif
                                            " style="font-weight: 500; height: 2.6em; line-height: 1.3em"
                                            >{{$item->title}}
                                        </a>
                                    </div>
                                    <div class="realty-body col-7 col-md-12  bg-white order-3 px-2 pb-2">
                                        <div class="font-9 pt-2">
                                            {{$item->realty->district->name_with_type ?? ''}}, {{$item->realty->province->name ?? ''}}
                                        </div>

                                        <div class="d-flex justify-content-between text-dark py-1 font-9 ">
                                            <span class="font-weight-500">
                                                <i class="fas fa-dollar-sign"></i>
                                                @if ($item->price_type !== 0)
                                                {{ beautyPrice($item->price)}}
                                                @endif
                                                {{config('constant.price_type.'. $item->price_type)['front_view']}}
                                            </span>
                                            <span class="font-weight-500"><i class="fas fa-expand"></i> {{$item->realty->area ?? ''}}m²</span>
                                        </div>
                                        {{-- <div class="font-9 d-flex justify-content-between">
                                            <span class="text-muted">
                                                {{\App\Helpers\TimeHelper::getDateDiffFromNow($item->created_at ?? '')['string']}} truớc
                                            </span>
                                            <div data-post-id="{{$item->realty_post_id ?? 1}}" class="btnlike like-heart checked">
                                                <i class="fas fa-heart text-info font-12"></i>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>

                        </div>
						@endforeach
					</div>
				</div>
				{{$realties->links()}}
				{{-- @include('customer.pages.pagination') --}}
            </div>
            <div class="col-md-3 mt-4">

                @include('customer.pages.realty_post.sidebar')
            </div>
		</div>
	</div>
</div>
@endsection



@extends('customer.layouts.main')

@section('title')
Mua bán bất động sản
@endsection

@section('content')
@include('customer.components.search_top')
<div class="page-content hrm-bg-secondary">
	<div class="container">
        <div class="pt-3">{{\App\Helpers\Breadcrumbs\RealtyBreadcrumbHelper::render() }} </div>
		<div class="row">
			<div class="col-md-9">

				<div class="entry-head-3 mt-2">
					<div class="ht">
						<span class="font-14"><strong>#{{$tag->name}}</strong></span>
						<div class="address font-13">Hiện có  <strong class="hot">{{$realties->total()}} bất động sản</strong>
                        </div>
					</div>
					<div class="group-header d-flex align-items-center mt-3">
                        <div class="item mr-auto  border">
							<select class="select2-hide-search sort">
								<option val="">Sắp xếp</option>
								<option value="price">Giá từ thấp đến cao</option>
								<option value="-price">Giá từ cao xuống thấp</option>
								<option value="area">Diện tích từ nhỏ đến lớn</option>
								<option value="-area">Diện tích từ lớn đến nhỏ</option>
							</select>
						</div>
						<a href="#" class="px-2 text-secondary font-12 item view-grid type-view active"><i class="fa fa-th-large"></i></a>
                        <a href="#" class="px-2 text-secondary font-12 item view-list type-view"><i class="fa fa-bars"></i></a>
					</div>
				</div>
				<div id="view-as-grid">
					<div class="row bds-hot-district">
						@foreach ($realties as $realty_post)
						@php
                            $realty = $realty_post->realty;
                            if($realty_post->price >= 1000000000){
                                $string_price = round($realty_post->price / 1000000000, 2) . ' tỉ';
                            }elseif($realty_post->price > 0){
                                $string_price = round($realty_post->price / 1000000, 2) . ' triệu';
                            }else{
                                $string_price = $realty_post->price;
                            }
						@endphp
                        <div class="item col-md-4 my-2">
                            <div class="realty-container shadow-6 rounded">
                                <div class="overflow-hidden">
                                    <a href="{{route('customer.realty_post.show', $realty_post->slug)}}"class="d-block img-wraper">
                                        <img src="{{$realty_post->thumb}}" class="img-fluid" style="height:180px" alt="" srcset="">
                                    </a>
                                </div>
                                <div class="realty-body p-2 bg-white">
                                    <a href="{{route('customer.realty_post.show', $realty_post->slug)}}" class="d-block">
                                        <span class="font-10 text-dark" style="font-weight: 500">{{Str::limit($realty_post->title, 55, '...')}}</span>
                                    </a>
                                    <div class="font-9 pt-2">
                                        {{$realty_post->realty->district->name_with_type}}, {{$realty_post->realty->province->name}}
                                    </div>
                                    <div class="d-flex justify-content-between text-info my-2 ">
                                        <strong><i class="fas fa-dollar-sign"></i> {{$string_price}}</strong>
                                        <strong><i class="fas fa-expand"></i> {{$realty->area}}m²</strong>
                                    </div>
                                    <div class="realty-footer d-flex justify-content-between pt-2 px-2 border-top ">
                                        <div>
                                            <a href="tel:+"><i class="text-muted far fa-phone-alt font-14"></i></a>
                                        </div>
                                        <div>
                                            <a href=""><i class="far fa-comment font-14 text-muted"></i></a>
                                        </div>
                                        <div data-post-id="1" class="btnlike like-heart unchecked">
                                            <i class="far fa-heart font-14 text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						@endforeach
					</div>
				</div>
				<div id="view-as-list" style="display: none" class="list-realty">
                    @foreach ($realties as $realty_post)
                    @php
                            $realty = $realty_post->realty;
                            if($realty_post->price >= 1000000000){
                                $string_price = round($realty_post->price / 1000000000, 2) . ' tỉ';
                            }elseif($realty_post->price > 0){
                                $string_price = round($realty_post->price / 1000000, 2) . ' triệu';
                            }else{
                                $string_price = $realty_post->price;
                            }
						@endphp
                    <div class=" my-3 row m-0 p-0 rounded border">
                        <div class="col-md-3 p-0">
                            <a href="" class="img-wraper h-100" >
                                <img src="{{$realty_post->thumb}}" alt="{{$realty_post->title}}" srcset="">
                            </a>
                        </div>
                        <div class="col-md-9 p-3">
                            <div class="d-flex mb-2">
                                <a href="#" class="text-danger font-11">{{$realty_post->title}}</a>
                            </div>
                            <div>
                                <strong>{{$string_price}}</strong> - <strong>{{$realty->area}}m<sup>2</sup></strong> - {{$realty->district->path_with_type}}
                            </div>
                            <div class="text-secondary">
                                <span class="realty-desc">
                                    {{$realty_post->description}}
                                </span>
                            </div>
                            <div class="font-9 mt-2">
                                {{\App\Helpers\TimeHelper::getDateDiffFromNow($realty_post->open_at)['string']}} trước
                            </div>

                        </div>
                    </div>
					@endforeach
				</div>
				{{$realties->onEachSide(5)->links()}}
				{{-- @include('customer.pages.pagination') --}}
            </div>
            <div class="col-md-3 mt-4">

                @include('customer.pages.realty_post.sidebar')
            </div>
		</div>
	</div>
</div>
@endsection

@section('script')
    @parent
    <script>
        $(".realty-price").each(function(item){
            $(this).text( beautyPrice($(this).data('price')));
        })

        $('.realty-desc').each(function(){
            maxText($(this), 150);
        })

        $('.sort').on('change', function(){
            var regex = new RegExp("sort=[-a-z]+", 'g'); ;

            var href = window.location.href;
            if (href.search(regex) !== -1) {
                window.location = href.replace(regex, 'sort=' + $(this).val())
                return;
            } else {
                if (href.indexOf('?') == -1) {
                    window.location = href + '?sort=' + $(this).val();
                    return
                }else{
                    window.location = href + '&sort=' + $(this).val();
                    return
                }
            }
        })
    </script>
@endsection

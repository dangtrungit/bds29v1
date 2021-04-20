@extends('customer.layouts.main')


@section('preset_seo')
    @php
        $custom_keywords = implode(',', $title);
        
        $custom_title = implode(' ', $title) ?? '';
        $custom_description = implode(' ', $title) ?? '';
    @endphp
@endsection

@section('title'){{$seo->title ?? implode(' ', $title)}}@endsection

@section('content')
@include('customer.components.search_top', ['filter_search' => $filter_search, 'search_address' => $search_address])
<div class="page-content hrm-bg-secondary">
	<div class="container">
        <div class="pt-3">{{\App\Helpers\Breadcrumbs\RealtyBreadcrumbHelper::render() }} </div>
        @php
            $links = \App\Helpers\Breadcrumbs\RealtyBreadcrumbHelper::createRealtyBreadcrumb(request()->filter);
        @endphp
		<div class="row">
			<div class="col-md-9">
				<div class="entry-head-3 mt-2">
					<div class="ht mb-3">
                        @if ($user)
                            <h1 class="font-15">Tin đăng bởi "{{$user->name ?? 'user'}}"</h1>
                        @else
                            @if (!empty($links))
                            <h1 class="font-15">Bất động sản {{$links[count($links) - 1]['name'] ?? ''}}</h1>
                            @else
                            <h1 class="font-15">Tất cả bất động sản</h1>
                            @endif
                        @endif

						<div class="address font-10 text-secondary d-flex justify-content-between align-items-center">
                            <span class="hot">Hiện có  {{$realties->total()}} bất động sản</span>

                            <div class="group-header d-flex align-items-center">
                                <div class="item mr-auto">
                                    <select class="select2-hide-search sort border">
                                        <option val="">Sắp xếp</option>
                                        <option value="price">Giá từ thấp đến cao</option>
                                        <option value="-price">Giá từ cao xuống thấp</option>
                                        <option value="area">Diện tích từ nhỏ đến lớn</option>
                                        <option value="-area">Diện tích từ lớn đến nhỏ</option>
                                    </select>
                                </div>
                            </div>
                        </div>

					</div>
				</div>
               
				<div id="view-as-grid">
					<div class="row bds-hot-district mt-3">
                        @foreach ($realties as $index => $realty_post)
                        
                        @if($index>=1 && $realties[$index-1]->created_at == $realties[$index]->created_at)
                        @else
                            <div class="col-md-4 mb-3">
                                @include('customer.components.realty_post.realty_block', ['item' => $realty_post])
                            </div>
                        @endif
						@endforeach
					</div>
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

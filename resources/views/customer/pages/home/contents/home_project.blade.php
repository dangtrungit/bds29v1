<section class="project section">
	<div class="container">
		<div class="entry-head-2">
			<h2 class="title">
				<div class="title-top">Danh sách</div>
				<span>Dự án bất động sản</span>
			</h2>
		</div>
		<div class="row">
            @foreach ($home_projects as $project)
            <div class="col-md-6">
                <div class="list-project px-2">
                    <div class="project-top">
                        <a class="img" href="{{$project->link}}"> <img src="{{$project->avatar}}"> <span class="count">{{count($project->overview_image_array)  ?? 0}} hình</span> </a>
                        <div class="divtext">
                            <h3 class="title"><a href="{{$project->link}}">{{$project->name}}</a></h3>
                            <p class="ward-district">{{$project->full_address}}</p>
                            <div class="imeta-3">
                                <span>Quy mô: <strong>71</strong> block, <strong>10343</strong> căn hộ</span>
                            </div>
                            <div class="imeta-3">
                                <span>Năm xây dựng: <strong>{{Carbon\Carbon::parse($project->start_at)->year}}</strong></span>
                            </div>
                            <div class="imeta-3">
                                <span>Giá từ: <strong class="hot">{{$project->lowest_cost}} triệu/m2</strong></span>
                            </div>
                            <div class="imeta-3">
                                <span> <a href="#"> Bán: <strong class="hot">{{$project->sell_realty}}</strong> </a> - <a href="#"> Thuê: <strong class="hot">{{$project->rent_realty}}</strong> </a> </span>
                            </div>
                            <div class="imeta-3"><span>Tiến độ: <strong>Đã hoàn thành</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="list-item">
                        @for ($i = 1; $i < 3; $i++)
                        <div class="posts-of-project owl-carousel">
                            @foreach ($project->realty_posts->where('type', $i)->take(5) as $realty_post)
                                @php
                                    $realty = $realty_post->realty;
                                    if ($realty->area <= 0) {
                                        $realty->area = 1;
                                    }
                                @endphp
                                <div class="item">
                                    <h3 class="title"><a href="{{route('customer.realty_post.show', $realty_post->slug)}}">{{$realty_post->title}}</a></h3>
                                    <div class="content">
                                        <a href="{{route('customer.realty_post.show', $realty_post->slug)}}" class="img">
                                            <img class=" loaded loaded" src="{{$realty_post->thumb}}">
                                            <span class="count">{{count($realty_post->realty->house_image_array)  ?? 0}} hình</span>
                                        </a>
                                        <div class="divtext">
                                            <div class="imeta-3">
                                                <span><i class="fa fa-compass"></i> <strong>{{config('constant.direction.'. $realty->direction .'.name')}}</strong></span>
                                                <span><i class="fa fa-bed"></i> <strong>{{$realty->number_of_bed_rooms}}</strong></span>
                                                <span><i class="fa fa-bath"></i> <strong>{{$realty->number_of_bath_rooms}}</strong></span>
                                            </div>
                                            <div class="label">
                                                <span>{{config('constant.realty_post_type.'.$realty_post->type.'.name')}}</span>
                                            </div>
                                            <div class="imeta-2">
                                                <span class="beauty-price" data-price="{{$realty_post->price}}"></span> <span>{{$realty->area}} m²</span>

                                                <div class="price2"><span class="beauty-price" data-price="{{$realty_post->price / $realty->area}}"></span>/m²</div>
                                            </div>
                                            <a href="/{{config('constant.realty_post_type.'.$i.'.slug')}}-{{$project->slug}}" class="viewall">Xem tất cả <i class="fa fa-angle-right"></i></a>
                                        </div>
                                        <div class="like">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @endfor

                    </div>
                </div>
            </div>

            @endforeach
        </div>

		<div class="project-filter">
			<div class="inner">
				<div class="row">
					<div class="col-md-4">
						<div class="item">
							<h5 class="title">Tìm thêm các dự án khác</h5>
						</div>
					</div>
					<div class="col-md-4">
						<div class="item">
							<select class="select typescholl project-input" name="typescholl" id="sel-city-search">
								<option value="">Tỉnh/Thành Phố</option>
                                @foreach ($provinces as $item)
                                    <option data-slug="{{$item->slug}}" value="{{$item->code}}">{{$item->name}}</option>
                                @endforeach
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="item">
							<select id="sel-district-search" class="select project-input">
								<option value="" selected="true">Quận / Huyện</option>
							</select>
						</div>
					</div>
				</div>
				<div class="btn-search">
					<a href="" class="btn search-projects">Tìm kiếm</a>
				</div>
			</div>
		</div>
	</div>
</section>

@section('script')
@parent
<script>
    	function getDistricts(province_code){
            url = '/get-district-of-province/' + province_code;
            return $.ajax({
                url: url,
                type: 'get',
            })
        }
        $('#sel-city-search').on('change', function(){
            var province_code = $(this).val();
            console.log('hello');
			var district_inputs = `<option value="">Quận / Huyện</option>`;
            getDistricts(province_code)
            .done(function(data){
                data.forEach(element => {
					district_inputs += `<option value="${element.code}" data-slug="${element.slug}">${element.name_with_type}</option>`
                });
                $('#sel-district-search').html(district_inputs);
            });
        })

        function getSearchSlug(){
            var slug = 'du-an';
            var province = $('#sel-city-search option:selected').data('slug');
            var district = $('#sel-district-search option:selected').data('slug');

            if(district){
                slug += '-' + district;
            }else if(province){
                slug += '-' + province;
            }

            if (slug === 'du-an') {
                return slug + '-bat-dong-san';
            }
            return slug ;

        }

        $(document).on('change', '.project-input', function(){
            var link = getSearchSlug();
            console.log(link);
            $('.search-projects').attr('href', link);
        })

        $(".beauty-price").each(function(item){
            $(this).text( beautyPrice($(this).data('price')));
        })
</script>

@endsection

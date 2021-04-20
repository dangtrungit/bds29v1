@extends('customer.layouts.main')

@section('title')
Danh sách dự án bất động sản
@endsection

@section('css')
<style>
    .price-btn{
        background: white;
        color: #000;
        outline: none;
        border: 1px solid #d2d2d2;
        padding: 6px 15px;
        border-radius: 6px;
        width:100%;
        text-align: left
    }


</style>
@endsection

@section('content')
<div class="search-top row container mx-auto py-3 align-items-center">
    <div class="col-md-2 mb-2">
        <select name="tinh" class="form-control project-input" id="project_province">
            <option value="">Tỉnh</option>
            @foreach ($provinces as $item)
                <option value="{{$item->code}}" data-slug="{{$item->slug}}">{{$item->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 mb-2">
        <select name="huyen" class="form-control project-input" id="district_project">
            <option value="">Quận, huyện</option>
        </select>
    </div>
    <div class="col-md-3 mb-2">
        <select name="loai_du_an" class="form-control project-input" id="project_type">
            <option value="">Loại Bất động sản</option>
            @foreach (config('constant.project_type') as $index =>  $item)
            <option data-slug="{{$item['slug']}}" value="{{$index}}">{{$item['name']}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2 mb-2">
        <div class="dropdown">
            <button class="dropdown-toggle price-btn" type="button" data-toggle="dropdown">Khoảng giá</button>
            <div class="dropdown-menu" style="width: 300px">
                <div class="row px-3 py-2 mb-2 border-bottom">
                    <div class="col-6">Giá thấp nhất</div>
                    <div class="col-6">Giá cao nhất</div>
                </div>
                <div class="row px-3">
                    <div class="col-6">
                        <div class="radio">
                            <label><input type="radio" class="project-input" value="" name="min_price" checked>Tất cả</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" class="project-input" value="300000000" name="min_price">300 triệu</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" class="project-input" value="500000000" name="min_price">500 triệu</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" class="project-input" value="800000000" name="min_price">800 triệu</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" class="project-input" value="1000000000" name="min_price">1 tỉ</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" class="project-input" value="3000000000" name="min_price">3 tỉ</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" class="project-input" value="5000000000" name="min_price">5 tỉ</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" class="project-input" value="7000000000" name="min_price">7 tỉ</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" class="project-input" value="10000000000" name="min_price">10 tỉ</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" class="project-input" value="20000000000" name="min_price">20 tỉ</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" class="project-input" value="30000000000" name="min_price">30 tỉ</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="radio">
                            <label><input type="radio" class="project-input" value="" name="max_price" checked>Tất cả</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" class="project-input" value="500000000" name="max_price">500 triệu</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" class="project-input" value="800000000" name="max_price">800 triệu</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" class="project-input" value="1000000000" name="max_price">1 tỉ</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" class="project-input" value="3000000000" name="max_price">3 tỉ</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" class="project-input" value="5000000000" name="max_price">5 tỉ</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" class="project-input" value="7000000000" name="max_price">7 tỉ</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" class="project-input" value="10000000000" name="max_price">10 tỉ</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" class="project-input" value="20000000000" name="max_price">20 tỉ</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" class="project-input" value="20000000000" name="max_price">30 tỉ</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" class="project-input" value="50000000000" name="max_price">50 tỉ</label>
                        </div>
                    </div>
                </div>
            </div>
          </div>
    </div>
    <div class="col-md-2 mb-2 text-center">
        <a href="" class="btn filter-link btn-info border-0 rounded-0">Lấy kết quả</a>
    </div>
</div>
<div class="page-listing hrm-bg-secondary">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="entry-head-3">
					<h1 class="ht">
						<span class="title font-20">Danh sách dự án</span>
					</h1>
                </div>
            </div>

            <div class="col-md-8">
                <div class="featured-project">
                    @foreach ($projects as $project)
                    <div class=" mb-4 row p-0 rounded bg-white mx-0">
                        <div class="col-md-3 p-0">
                            <a href="{{route('customer.project.show', $project->slug ?? '')}}" class="img-wraper h-100" >
                                <img src="{{$project->avatar}}" alt="{{$project->avatar}}" srcset="">
                            </a>
                        </div>
                        <div class="col-md-9 px-3 py-2">
                            <div class="d-flex mb-2">
                                <a href="{{route('customer.project.show', $project->slug ?? '')}}" class="text-danger font-12">{{Str::limit($project->name, 40, '...')}}</a>
                                <span class="ml-auto text-secondary">
                                    <i class="fas fa-dollar-sign"></i>
                                    <span class="text-dark font-12">
                                        @if ($project->min_price && $project->max_price)
                                        {{beautyPrice($project->min_price)}} - {{beautyPrice($project->max_price)}}
                                        @else
                                            Đang cập nhật
                                        @endif
                                    </span>

                                </span>
                            </div>
                            <div class="mb-1 pb-2 border-bottom font-10">
                                {{$project->full_address}}
                            </div>
                            <div class="row text-secondary font-9">
                                <div class="mb-2 col-md-8">
                                    <i class="fas fa-user-tie pr-2"></i> <strong>{{$project->investor}}</strong>
                                </div>
                                <div class="mb-2 col-md-4">
                                    <i class="fas fa-expand pr-2"></i> {{$project->site_area . ' m2' ?? 'Đang cập nhật'}}
                                </div>
                                <div class="mb-2 col-md-8">
                                    <i class="far fa-clock pr-2"></i> Bàn giao: {{\Carbon\Carbon::parse($project->launch_time)->format('d/m/Y') ?? 'Đang cập nhật'}}
                                </div>
                                <div class="mb-2 col-md-4">
                                    <i class="fas fa-wrench pr-2"></i> {{config('constant.project_status.'. $project->status)['name'] ?? 'Đang cập nhật'}}
                                </div>
                            </div>
                            <div>
                                @foreach ($project->list_realty_type as $item)
                                <a href="{{config('constant.realty_type.'. $item)['slug']}}" class="badge badge-info p-1">{{config('constant.realty_type.'. $item)['name']}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{$projects->links()}}
            </div>
            <div class="col-md-4 sidebar">
                @include('customer.components.sidebars.realty_sidebar')
            </div>
        </div>
	</div>
</div>
@endsection

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
        $('#project_province').on('change', function(){
            var province_code = $(this).val();
			var district_inputs = `<option value="">Quận/Huyện</option>`;
            getDistricts(province_code)
            .done(function(data){
                data.forEach(element => {
					district_inputs += `<option value="${element.code}" data-slug="${element.slug}">${element.name_with_type}</option>`
                });
                $('#district_project').html(district_inputs);
            });
        })

        $(document).on('click', '.dropdown-menu', function (e) {
            e.stopPropagation();
        });

        function getSearchSlug(){
            var slug = 'du-an';
            var province = $('#project_province option:selected').data('slug');
            var district = $('#district_project option:selected').data('slug');
            var type = $('#project_type option:selected').data('slug');
            var min = $('input[name=min_price]:checked').val();
            var max = $('input[name=max_price]:checked').val();

            if(type){
                slug += '-' + type;
            }

            if(district){
                slug += '-' + district;
            }else if(province){
                slug += '-' + province;
            }

            var query = '?';

            if (min) {
                query += 'gia=';
                if (min) {
                    query +=  min;
                }else{
                    query += 0;
                }

                if (max) {
                    query += ',' + max;
                }
            }

            if (slug === 'du-an') {
                return slug + '-bat-dong-san' + query;
            }
            return slug + query;

        }

        $(document).on('change', '.project-input', function(){
            var link = getSearchSlug();
            console.log(link);
            console.log($('.filter-link'));
            $('.filter-link').attr('href', link);
        })
    </script>
@endsection

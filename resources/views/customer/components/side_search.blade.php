<div class="widget widget-filter">
    <h2 class="widget-title">Tìm nhanh</h2>
    <div class="tab-filter">
        <ul class="tab-menu">
            <li class="active search-type" data-value="1"><a data-toggle="tab" href="#search-buy">Mua</a></li>
            <li class="search-type" data-value="2"><a data-toggle="tab" href="#search-rent">Thuê</a></li>
        </ul>
        <div class="tab-content">
            <div id="search-buy" class="search-muaban tab-pane fade in active">
                <form id="form-search-by">
                    <div class="widget-content">
                        <div class="input-group listing-type_sb">
                            <div class="input-group-addon none">Loại hình BĐS</div>
                            <div id="ms-list-2" class="ms-options-wrap">
                                <button type="button"><span>Mua bán</span></button>
                                <div class="ms-options">
                                    <div class="ms-search"><input type="text" value="" placeholder=""></div>
                                    <label class="checkbox select-all ms-selectall global">
                                        <input class="testCheckbox" type="checkbox">
                                        <span class=""></span>Tất cả
                                    </label>
                                    <ul>
                                        <li>
                                            <label class="checkbox">
                                            <input type="checkbox" title="Nhà riêng"  value="11"><span></span>Nhà riêng</label>
                                        </li>
                                        <li>
                                            <label class="checkbox">
                                            <input type="checkbox" title="Đất nền" value="13"><span></span>Đất nền</label>
                                        </li>
                                        <li>
                                            <label class="checkbox"><input type="checkbox" title="Chung cư/Căn hộ" value="8"><span></span>Chung cư/Căn hộ</label>
                                        </li>
                                        <li>
                                            <label class="checkbox"><input type="checkbox" title="Đất nền dự án" value="14"><span></span>Đất nền dự án</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-city_sb">
                            <select class="select" id="province" name="[tinh]" title="Chọn TP">
                                <option value="">Tỉnh/ Thành phố</option>
                                @foreach ($provinces as $item)
                                    <option value="{{$item->code}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-district_sb">
                            <div  class="ms-options-wrap"><button type="button"><span>Quận/Huyện</span></button>
                                <div class="ms-options">
                                    <ul id="district">

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="ward mb-4" >
                            <div class="ms-options-wrap"><button type="button"><span>Xã/Phường</span></button>
                                <div class="ms-options">
                                    <ul id="commune">

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="street_sb">
                            <select class="select" id="select-city_sb" name="street">
                                <option value="">Đường</option>
                            </select>
                        </div>
                        <div class="acordion-search">
                            <div class="tab">
                                <div class="tab-content">
                                    <div class="price_sb">
                                        <select class="select style-0" id="select-price" name="[price_between]" title="Chọn TP">
                                            <option value="">Mức giá</option>
                                            <option value="0,2000000000">Dưới 2 tỷ</option>
                                            <option value="2000000000,3000000000">2 tỷ - 3 tỷ</option>
                                            <option value="3000000000,4000000000">3 tỷ - 4 tỷ</option>
                                        </select>
                                    </div>
                                    {{-- <div class="rented_sb">
                                        <div class="tab-rented">
                                            <div class="title-rented">Tình trạng <i class="fa fa-angle-down"></i></div>
                                            <div class="content-rented">
                                                <label class="checkbox">
                                                    <input type="checkbox" name="" value="5"> <span></span> Đặc biệt
                                                </label>
                                                <label class="checkbox ">
                                                    <input type="checkbox" name="" value="6"> <span></span> Đã thẩm định
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" class="status_listing_sb" name="" value="1"> <span></span>
                                                    <div class="status-rented-saled">Đã bán</div>
                                                </label>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="size_sb">
                                        <select id="select-size" class="select style-0" name="[realty.area_between]">
                                            <option value="">Diện tích</option>
                                            <option value="0,30">Dưới 30 m2</option>
                                            <option value="31,40">31 m2 - 40 m2</option>
                                            <option value="41,50">41 m2 - 50 m2</option>
                                            <option value="51,60">51 m2 - 60 m2</option>
                                        </select>
                                    </div>
                                    {{-- <div class="location_sb">
                                        <select id="select-size" class="select style-0" name="location">
                                            <option value="">Vị trí</option>
                                            <option value="">Mặt tiền</option>
                                            <option value="">Hẻm</option>
                                        </select>
                                    </div> --}}
                                    <div class="direction_sb">
                                        <select class="select style-0" id="select-direction" name="[huong]">
                                            <option value="" selected="">Hướng</option>
                                            <option value="1">Đông</option>
                                            <option value="2">Tây</option>
                                            <option value="3">Nam</option>
                                            <option value="4">Bắc</option>
                                            <option value="5">Đông Bắc</option>
                                            <option value="6">Đông Nam</option>
                                            <option value="7">Tây Bắc</option>
                                            <option value="8">Tây Nam</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="title-nc">
                                    Lọc nâng cao
                                    <span class="triangle"> <i class="icon-plus-2"></i> </span>
                                </div>
                            </div>
                        </div>
                        <div class="btn-search-sidebar">
                            <button id="apply-search_sb" type="button" class="btn full">Tìm ngay!</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


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
        $('#province').on('change', function(){
            var province_code = $(this).val();
			var district_inputs =`<li>
									<label class="checkbox"><input name="[huyen]" type="checkbox" title="Tất cả" value=""><span></span>Tất cả</label>
								</li>`;
            getDistricts(province_code)
            .done(function(data){
                data.forEach(element => {
					district_inputs += `<li>
										<label class="checkbox"><input name="[huyen]" type="checkbox" title="${element.name_with_type}" value="${element.code}"><span></span>${element.name_with_type}</label>
									</li>`
                });
                $('#district').html(district_inputs);
            });
        })

        function getCommunes(district_code){
            url = '/get-commune-of-district/' + district_code;
            return $.ajax({
                url: url,
                type: 'get',
            })
        }

        $(document).on('change', "[name='[huyen]']" , function(){
			$('#commune').html('');
			$("[name='[huyen]']:checked").each(function(){
				var district_code = $(this).val();
				var district_name = $(this).attr('title');
				var wraper = `<li class="optgroup" style="clear: both">`;
				wraper += `<span class="pt-2"><strong>${district_name}</strong> </span>`
				wraper += `<label class="checkbox select-all ms-selectall">
                                <input type="checkbox">
                                <span></span>Tất cả
							</label>
							`;
				var commune_inputs = ``;
				getCommunes(district_code)
				.done(function(data){
					data.forEach(element => {
						commune_inputs += `<li>
											<label class="checkbox"><input name="[xa]" type="checkbox" title="${element.name_with_type}" value="${element.code}"><span></span>${element.name_with_type}</label>
										</li>`;
					});
					wraper += commune_inputs;
					wraper += `</li>`;

					$('#commune').append(wraper);
				});
			});
		})

		function getRealtyPostType(){
			return $('.search-type.active').data('value');
		}

		function getQuery(){
			var data =  $('#form-search-by').serializeArray();
			var result = {};
			data.forEach(function(item){
				if (result[item.name]) {
					result[item.name] += ',' + item.value;
				}else{
					result[item.name] = item.value;
				}
			});
			var query = '/tim-kiem?';
			Object.entries(result).forEach(function(item, index){
				if (index == 0 && item[1] != '') {
					query += 'filter' + item[0] + '=' + item[1];
				};

				if (index !== 0 && item[1] != '') {
					query += '&filter' + item[0] + '=' + item[1];
				};

			})
            var post_type = getRealtyPostType();
            query += '&filter[loai-tin-dang]=' + post_type;
            return query;
		}
		$(document).on('click', '#apply-search_sb', function(){
			window.location = getQuery();
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

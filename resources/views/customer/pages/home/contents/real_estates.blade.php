<section class="real-estate section">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="entry-head-2">
					<h2 class="title">
						<div class="title-top">Danh sách</div>
						<span>Mua bán bất động sản</span>
					</h2>
				</div>
				<div class="tabs">
					<div class="slider-real slider-realty-buy owl-carousel">
                        @foreach ($featured_district as $item)
                        <div class="item-real pb-3">
                            <strong href="/api/get-realty-post?filter[huyen]={{$item->code}}&filter[loai-tin-dang]=1">{{$item->name}}</strong>
						</div>
                        @endforeach
					</div>
					<div class="tab-content">
						<div id="all-real-buy" class="tab-pane fade in active">
							<div class="list-bds">

							</div>
						</div>

						<div class="sec-more"><a class="btn view-all" href="mua">Xem tất cả</a></div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
                <div class="entry-head-2">
					<h2 class="title">
						<div class="title-top">Danh sách</div>
						<span>Cho thuê bất động sản</span>
					</h2>
				</div>
				<div class="tabs">
					<div class="slider-real slider-realty-rent owl-carousel">
                        @foreach ($featured_district as $item)
                        <div class="item-real pb-3">
                            <strong href="/api/get-realty-post?filter[huyen]={{$item->code}}&filter[loai-tin-dang]=2">{{$item->name}}</strong>
						</div>
                        @endforeach
					</div>
					<div class="tab-content">
						<div id="all-realty-rent" class="tab-pane fade in active">
							<div class="list-bds">

							</div>
						</div>
						<div class="sec-more"><a class="btn view-all" href="/cho-thue">Xem tất cả</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@section('script')
@parent
    <script>

    $('.item-real a').each(function(){
        var content = $(this).text();
        $(this).text(shortText(content, 8));
    });
    // List featured Realty
    function renderSellRealtySlider(data){
        $('#all-real-buy .list-bds').html('');
        data = data.slice(0,3);
        data.forEach(item => {
            let is_featured = false;
            if(featured_realties.includes(item.post_id)){
                is_featured = true;
            };
            number_of_images = item.house_image.split(',').length;
            var element = `
            <div class="item">
                <a href="${item.link}" class="title">${item.title}</a>
                <p class="ward-district"> ${item.commune}, ${item.district} </p>
                <div class="content">
                    <a href="${item.link}" class="img"> <img src="${item.thumb}"> <span class="count">${number_of_images} hình</span> </a>
                    <div class="divtext">
                        <div class="imeta-3">
                            <span><i class="fa fa-compass"></i> <strong>${item.direction}</strong></span>
                            <span><i class="fa fa-bed"></i> <strong>${item.number_of_bed_rooms}</strong></span>
                            <span><i class="fa fa-bath"></i> <strong>${item.number_of_bath_rooms}</strong></span>
                        </div>
                        <div class="label">
                            <span>${item.realty_post_type_name}</span>
                        </div>
                        <div class="imeta-2">
                            <span>${beautyPrice(item.price)}</span>
                            <span>${item.area}m²</span>
                        </div>
                    </div>
                    <div class="price2">${(item.price / 1000000 / item.area).toFixed(2)} triệu/m²</div>
                    <div data-post-id="${item.post_id}" class="btnlike like-heart ${is_featured ? "checked" : 'unchecked'}">
                        <i class="fa fa-heart"></i>
                    </div>
                </div>
                <div class="special"> <span>Đặc biệt</span> </div>
            </div>
            `;
            $('#all-real-buy .list-bds').append(element);
        });
    }

    $('.slider-realty-buy .item-real strong').on('click', function(e){
        e.preventDefault();
        var url = $(this).attr('href');
		getRealtyFromApi(url)
        .done(function(data){
            renderSellRealtySlider(data);
        });
    });

    $('.slider-realty-buy .item-real strong:first').trigger('click');


    function renderRentalRealtySlider(data){
        $('#all-realty-rent .list-bds').html('');
        data = data.slice(0,3);
        data.forEach(item => {
            let is_featured = false;
            if(featured_realties.includes(item.post_id)){
                is_featured = true;
            };
            number_of_images = item.house_image.split(',').length;
            var element = `
            <div class="item">
                <a href="${item.link}" class="title">${item.title}</a>
                <p class="ward-district"> ${item.commune}, ${item.district} </p>
                <div class="content">
                    <a href="${item.link}" class="img"> <img src="${item.thumb}"> <span class="count">${number_of_images} hình</span> </a>
                    <div class="divtext">
                        <div class="imeta-3">
                            <span><i class="fa fa-compass"></i> <strong>${item.direction}</strong></span>
                            <span><i class="fa fa-bed"></i> <strong>${item.number_of_bed_rooms}</strong></span>
                            <span><i class="fa fa-bath"></i> <strong>${item.number_of_bath_rooms}</strong></span>
                        </div>
                        <div class="label">
                            <span>${item.realty_post_type_name}</span>
                        </div>
                        <div class="imeta-2">
                            <span>${beautyPrice(item.price)}</span>
                            <span>${item.area}m²</span>
                        </div>
                    </div>
                    <div class="price2">${(item.price / 1000000 / item.area).toFixed(2)} triệu/m²</div>
                    <div data-post-id="${item.post_id}" class="btnlike like-heart ${is_featured ? "checked" : 'unchecked'}">
                        <i class="fa fa-heart"></i>
                    </div>
                </div>
                <div class="special"> <span>Đặc biệt</span> </div>
            </div>
            `;

            $('#all-realty-rent .list-bds').append(element);
        });
    }

    $(document).on('click', '.slider-realty-rent .item-real strong' , function(e){
        e.preventDefault();
        var url = $(this).attr('href');
		getRealtyFromApi(url)
        .done(function(data){
            renderRentalRealtySlider(data);
        });
    });

    $('.slider-realty-rent .item-real strong:first').trigger('click');
    </script>
@endsection

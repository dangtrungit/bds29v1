<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
{{-- <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/> --}}
<section class="bds-noibat py-3 py-lg-5 section hrm-bg-secondary">
    <div class="container">
        <div class="entry-head text-center pb-2 d-flex  justify-content-between align-items-center">
            <h2 class="font-18 font-weight-600 home-title" id="tit">Bất động sản cho thuê</h2>
            <a href="/bat-dong-san" class="text-dark">Xem tất cả <i class="fas fa-long-arrow-alt-right"></i></a>
        </div>

        <div>
            <div class="row" id="desktop-screen">
                @php
                    // dd($show_districts);
                @endphp
                @foreach ($show_districts as $key=>$show_district)
                <div class="col-6 col-md-3">
                    <div class="item-district" style="margin-bottom:30px;">
                        <span class="clickeds" id="span" href="{{$show_district->slug}}" style="position: relative; ">
                            <img class="img-rounded" src="{{asset($show_district->avatar)}}" alt=""
                                style="width: 100%; filter:brightness(50%); line-height: 0; cursor: pointer; object-fit:cover; height: 180px;">
                            <p id="span" class=" clickeds  font-500 font-9 btn " href="{{$show_district->slug}}" style="  position: absolute;
                                    top: 0;
                                    left: 0;
                                    width: 100%;
                                    height: 100%;
                                    font-weight: bold;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    color: rgb(255, 255, 255);"> {{$show_district->name_with_type}}
                            </p>
                        </span>
                    </div>
                </div>
                @endforeach

            </div>
            {{-- <div class="text-center">
                <button type="button" class="btn btn-sm btn-outline-primary previous_caro">Previous</button>
                <button type="button" class="btn btn-sm btn-outline-primary next_caro" >Next</button>
            </div> --}}

            <div class="mt-3">
                <div id="mobile-screen">
                    <div class="bds-hot-district rounded-top">
                        <div class="slider-bds-hot owl-carousel p-2">
                            @foreach ($show_districts as $key=>$show_district_mobile)
                            <div class="item-district">
                                <span class="clickeds" href="{{$show_district_mobile->slug}}">
                                    <img class="img-rounded" src="{{asset($show_district_mobile->avatar)}}" alt=""
                                        style="width: 100%; filter:brightness(50%); line-height: 0; cursor: pointer; object-fit:cover; height: 180px;">
                                    <p id="span" class=" clickeds  font-500 font-9 btn "
                                        href="{{$show_district_mobile->slug}}" style="  position: absolute;
                                            top: 0;
                                            left: 0;
                                            width: 100%;
                                            height:180px;
                                            font-weight: bold;
                                            display: flex;
                                            align-items: center;
                                            justify-content: center;
                                            color: rgb(255, 255, 255);"> {{$show_district_mobile->name_with_type}}
                                    </p>
                                </span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  

@section('script')
@parent
<script>
    $(document).ready(function(){
            // List featured Realty
            function renderFeaturedRealtySlider(data){

                data = data.slice(0,5);
                $('.bds-hot-district').html(`<div class="${isMobile() ? "" :  'slider-bds-hot owl-carousel'} list-realty"></div>`);
                data.forEach((item, index) => {
                    let is_featured = false;
                    if(featured_realties.includes(item.post_id)){
                        is_featured = true;
                    };
                    var ribbon = '';
                    var titleColor = '';

                    switch (item.post_rank) {
                        case "3":
                        titleColor = 'text-info';
                        ribbon = `<div class="ribbon-wrapper ribbon">
                                    <div class="ribbon bg-info font-6 text-white">
                                    Vip
                                    </div>
                                </div>`
                            break;
                        case "4":
                        titleColor = 'text-danger';
                        ribbon =`
                                <div class="ribbon-wrapper ribbon">
                                    <div class="ribbon bg-danger font-6 text-white">
                                    Nổi bật
                                    </div>
                                </div>
                                `
                            break
                        default:
                            break;
                    }
                    var element= `
                    <div class="block realty wow fadeIn ${isMobile() ? 'mt-3' : ''}">
                        <div class="realty-container flex-wrap border rounded d-flex d-md-block">
                            <div class="overflow-hidden col-5 px-0 col-md-12 order-2 bg-white">
                                <a href="${item.link}"class="d-block ml-2 ml-md-0 img-wraper height-md-180 height-120">
                                    <img src="${item.thumb}" alt="" srcset="">
                                </a>
                                ${ribbon}
                            </div>
                            <div class="order-1 col-12 bg-white px-2 pt-2 pb-md-0 pb-2">
                                <a href="${item.link}" class="d-block main-text hrm-truncate" style="height: 2.6em; line-height: 1.2em">
                                    <span class="font-9 ${titleColor}" style="font-weight: 500">${item.title}</span>
                                </a>
                            </div>
                            <div class="realty-body col-7 col-md-12  bg-white order-3 px-2">
                                <div class="font-9 pt-2 " style="height: 2.6em; line-height: 1.2em">
                                    ${item.commune}, ${item.district}
                                </div>
                                <div class="imeta-3 text-muted mt-2 font-9">
                                    <span><i class="fa fa-compass"></i> <span class="border-right pr-1">${item.direction}</span></span>
                                    <span><i class="fa fa-bed"></i> <span class="border-right px-1">${item.number_of_bed_rooms ? item.number_of_bed_rooms: ''}</span></span>
                                    <span class="pl-1"><i class="fa fa-bath"></i> <span>${item.number_of_bath_rooms ? item.number_of_bath_rooms : ''}</span></span>
                                </div>
                                <div class="d-flex justify-content-between text-info py-1 font-9">
                                    <span class="font-weight-500"><i class="fas fa-dollar-sign"></i>${item.string_price}</span>
                                    <span class="font-weight-500"><i class="fas fa-expand"></i> ${item.area} m²</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                    $('.list-realty').append(element);
                });

            }

            $('.slider-bds-hot').owlCarousel({
                loop:true,
                autoplay:false,
                autoplayTimeout:2000,
                autoplayHoverPause:true,
                margin: 20,
                dots:false,
                nav:true,
                autoplayTimeout:3000,
                autoplaySpeed:1200,
                smartSpeed:1200,
                navText:["<div class='owl-nav-btn prev-slide'><i class='fas fa-chevron-left'></i></div>","<div class='owl-nav-btn next-slide'><i class='fas fa-chevron-right'></i></div>"],
                items: 2,
            });

            // displayCarousel: function () {
            //     var isMobile
            // }

            var isMobile_screen = window.matchMedia && window.matchMedia('(max-device-width: 960px),(max-device-width: 767px),(max-device-width: 600px)').matches || screen.width <= 960 || screen.width <= 767 || screen.width <= 600;
            // console.log('abc');
            if (isMobile_screen == true) {
                $('#desktop-screen').css('display','none');
                $('#mobile-screen').css('display','block');
            }
            else {
                $('#mobile-screen').css('display','none');
            }


            $('.item-district span').on('click', function(e){
                // debugger;
                $('.item-district span').removeClass('clickeds');
                $(this).addClass('clickeds');
                 e.preventDefault();
                var url = $(this).attr('href');
                getRealtyFromApi(url)
                .done(function(data){
                    renderFeaturedRealtySlider(data);
                });
                if(document.getElementById('realty-sell').checked) {
                    var option='ban';
                }else if(document.getElementById('realty-rent').checked) {
                    var option='cho-thue';
                }
                window.location = option + '-' + url;
                // console.log('abc');
            })
            $('.item-district > span:fisrt').on('click');

            function changeDistrict() {
                var index = Math.floor(Math.random() * 10);
                $('.item-district > span:fisrt').eq(index).on('click');
            }
            var timeInterval = setInterval( changeDistrict , 10000);

            $('.item-district').on('mousedown', function(){
                clearInterval(timeInterval);
            });

        })
</script>

<script language="javascript">
    document.getElementById('realty-sell').onclick = function () {
                document.getElementById('tit').innerHTML='Bất động sản bán';
            }
            document.getElementById('realty-rent').onclick = function () {
                document.getElementById('tit').innerHTML='Bất động sản cho thuê';
            }
</script>

{{-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript">
         $('.autoplay_bds').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            nextArrow: '.next_caro',
            prevArrow: '.previous_caro'
      });
    </script> --}}

@endsection

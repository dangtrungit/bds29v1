$(document).ready(function(){
    $('.header-main ul>li').click(function(){
        $('.header-main ul>li').removeClass('active');
        $(this).addClass('active');
    });
    $('.click-menu').click(function(){
        $('.menu-responsive, .menu-responsive-overlay').toggleClass('show-mn');
    });
    $('.menu-responsive-overlay').click( function () {
        $('.menu-responsive, .menu-responsive-overlay').toggleClass('show-mn');
    });
	$('.ms-options-wrap').click(function(){
		$(this).toggleClass('ms-active');
	});
	$('.search-type, .item-district, .slider-real .item-real, .slider-bds-lease .item, .page-listing .type-view').click(function(){
		$('.search-type, .item-district, .slider-real .item-real, .slider-bds-lease .item, .page-listing .type-view').removeClass('active');
		$(this).addClass('active');
	});
	$('.btn-advance-search').click(function(){
		$('.advance-search').slideToggle();
	});
	$('.type-listing').owlCarousel({
        loop:true,
        autoWidth:true,
        margin: 10,
        dots:false,
        nav:false,
        autoplay: true,
        autoplayTimeout:3000,
        autoplaySpeed:1200,
        smartSpeed:1200,
        responsive:{
            0:{
                items:2,
            },
            600:{
                items:4
            },
            1000:{

                items:8
            }
        }

    });
    $('.acordion-search .title-nc').click(function(){
        $('.acordion-search .tab').toggleClass('show');
        $('.acordion-search .tab-content').slideToggle();
    });
    $('.rented_sb .title-rented').click(function(){
        $('.rented_sb .content-rented').slideToggle();
    });
    $('.view-grid').click(function(){
        $('#view-as-grid').css("display", "block");
        $('#view-as-list').css("display", "none");
    });

    $('.view-list').click(function(){
        $('#view-as-list').css("display", "block");
        $('#view-as-grid').css("display", "none");
    });

    $('.share .toggle').click(function(){
        $('.share').toggleClass('active');
    });

    $('.slider-district, .slider-bds-lease, .key-word-hot').owlCarousel({
        loop:true,
        margin: 20,
        dots:false,
        nav:true,
        autoplay: false,
        autoplayTimeout:3000,
        autoplaySpeed:1200,
        smartSpeed:1200,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:3
            },
            1000:{

                items:6
            }
        }
    });
    $('.slider-real').owlCarousel({
        loop:true,
        margin: 20,
        dots:false,
        nav:true,
        autoplay: false,
        autoplayTimeout:3000,
        autoplaySpeed:1200,
        smartSpeed:1200,
        responsive:{
            0:{
                items:3,
            },
            600:{
                items:5,
            },
            1000:{

                items:5
            }
        }
    });
    $('.list-rental, .list-vendor').owlCarousel({
        items: 1,
        loop: true,
        margin: 0,
        dots: false,
        nav: false,
        autoplay: false,
        autoplayTimeout: 3000,
        autoplaySpeed: 1200,
        smartSpeed: 1200,
    });
    $('.slider-news').owlCarousel({
        items: 1,
        loop: true,
        margin: 0,
        dots: true,
        nav: false,
        autoplay: false,
        autoplayTimeout: 3000,
        autoplaySpeed: 1200,
        smartSpeed: 1200,
    });
    $('.slider-related').owlCarousel({
        loop:true,
        margin: 30,
        dots:false,
        nav:true,
        autoplay: false,
        autoplayTimeout:3000,
        autoplaySpeed:1200,
        smartSpeed:1200,
        responsive:{
            0:{
                items:2,
            },
            600:{
                items:3
            },
            1000:{

                items:4
            }
        }
    });
    $('.menu-project a').bind('click', function(e) {
        e.preventDefault();
        var target = $(this).attr("href");
        $('html, body').stop().animate({
            scrollTop: $(target).offset().top
        }, 600, function() {
            location.hash = target;
        });
        return false;
    });
    $("#myregister, #myforgot-password").click(function(){
        $("#popup-login").modal('hide');
    });
    $("#mypopup-login").click(function(){
        $("#register").modal('hide');
    });
});

$(document).ready(function() {
    var bigimage = $("#big");
    var thumbs = $("#thumbs");
    var syncedSecondary = true;

    bigimage
    .owlCarousel({
        items: 1,
        slideSpeed: 2000,
        nav: true,
        autoplay: true,
        dots: false,
        loop: true,
        responsiveRefreshRate: 200,
        navText:["<div style='left: 20px' class='owl-nav-btn prev-slide'><i class='fas fa-chevron-left'></i></div>","<div class='owl-nav-btn next-slide' style='right: 20px'><i class='fas fa-chevron-right'></i></div>"],
    })
    .on("changed.owl.carousel", syncPosition);

    thumbs
    .on("initialized.owl.carousel", function() {
        thumbs
        .find(".owl-item")
        .eq(0)
        .addClass("current");
    })
    .owlCarousel({
        items: 6,
        dots: false,
        nav: false,
        margin: 10,
        smartSpeed: 200,
        slideSpeed: 500,
        slideBy: 4,
        responsiveRefreshRate: 100
    })
    .on("changed.owl.carousel", syncPosition2);

    function syncPosition(el) {
    //if loop is set to false, then you have to uncomment the next line
    //var current = el.item.index;

    //to disable loop, comment this block
    var count = el.item.count - 1;
    var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

    if (current < 0) {
    current = count;
    }
    if (current > count) {
    current = 0;
    }
    //to this
    thumbs
    .find(".owl-item")
    .removeClass("current").eq(current).addClass("current");
    var onscreen = thumbs.find(".owl-item.active").length - 1;
    var start = thumbs
    .find(".owl-item.active")
    .first().index();
    var end = thumbs
    .find(".owl-item.active").last().index();

    if (current > end) {
    thumbs.data("owl.carousel").to(current, 100, true);
    }
    if (current < start) {
    thumbs.data("owl.carousel").to(current - onscreen, 100, true);
    }
    }

    function syncPosition2(el) {
        if (syncedSecondary) {
        var number = el.item.index;
        bigimage.data("owl.carousel").to(number, 100, true);
    }
    }
    thumbs.on("click", ".owl-item", function(e) {
        e.preventDefault();
        var number = $(this).index();
        bigimage.data("owl.carousel").to(number, 300, true);
    });

    $('.posts-of-project').owlCarousel({
        loop:true,
        margin: 30,
        dots:false,
        nav:false,
        autoplay: false,
        autoplayTimeout:3000,
        autoplaySpeed:1200,
        smartSpeed:1200,
        responsive:{
            0:{
                items:1,
            },
        }
    });
});



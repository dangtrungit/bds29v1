
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/updatebdsv1.js')}}"></script>
{{-- <script src="{{asset('js/rangesearch.js')}}"></script> --}}
@include('customer.partials.alert')

<script>
    $(document).ready(function(){
        var lazyLoadInstance = new LazyLoad({
        // Your custom settings go here
        });
    })
    const num2Word2 = function () {
        var t = ["không", "một", "hai", "ba", "bốn", "năm", "sáu", "bảy", "tám", "chín"],
            r = function (r, n) {
                var o = "",
                    a = Math.floor(r / 10),
                    e = r % 10;
                return a > 1 ? (o = " " + t[a] + " mươi", 1 == e && (o += " mốt")) : 1 == a ? (o = " mười", 1 == e && (o += " một")) : n && e > 0 && (o = " lẻ"), 5 == e && a >= 1 ? o += " lăm" : 4 == e && a >= 1 ? o += " tư" : (e > 1 || 1 == e && 0 == a) && (o += " " + t[e]), o
            },
            n = function (n, o) {
                var a = "",
                    e = Math.floor(n / 100),
                    n = n % 100;
                return o || e > 0 ? (a = " " + t[e] + " trăm", a += r(n, !0)) : a = r(n, !1), a
            },
            o = function (t, r) {
                var o = "",
                    a = Math.floor(t / 1e6),
                    t = t % 1e6;
                a > 0 && (o = n(a, r) + " triệu", r = !0);
                var e = Math.floor(t / 1e3),
                    t = t % 1e3;
                return e > 0 && (o += n(e, r) + " ngàn", r = !0), t > 0 && (o += n(t, r)), o
            };
        return {
            convert: function (r) {
                if (0 == r) return t[0];
                var n = "",
                    a = "";
                do ty = r % 1e9, r = Math.floor(r / 1e9), n = r > 0 ? o(ty, !0) + a + n : o(ty, !1) + a + n, a = " tỷ"; while (r > 0);
                return n.trim()
            }
        }
    }();
</script>

<script>
    // Check user agent
    function isMobile(){
        // credit to Timothy Huang for this regex test:
        // https://dev.to/timhuang/a-simple-way-to-detect-if-browser-is-on-a-mobile-device-with-javascript-44j3
        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
            return true
       }
       else{
            return false
       }
    }

    var Nav = new hcOffcanvasNav('#menu-responsive',  {
        customToggle: '.menu-open',
        disableAt: false,
        levelSpacing: 40,
        levelTitles: true,
        levelTitleAsBack: true,
        labelClose: false,
    });
    console.log(Nav);
    $('.mobile-logout-btn').on('click', function(){
        Nav.close();
        $('#popup-login').modal('show');
    })
    $('.mobile-login-btn').on('click', function(){
        Nav.close();
        $('#register').modal('show');
    })
</script>

<script>
    @if(auth()->check())
        var featured_realties = @json(auth()->user()->featured_realties->pluck('id')->toArray());
    @else
        var featured_realties = @json([]);
    @endif

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function hideBlockByHeight(element, maxHeight){
        element.css({
            "overflow" : "hidden",
            "height" : maxHeight,
        });
    }

    function showBlockByHeight(element){
        element.css({
            "overflow" : "hidden",
            "height" : "auto",
        });
    }

    function toggleHiddenBlock(element, height){
        if (element.css('height') == height) {
            showBlockByHeight(element);
        }
        else{
            hideBlockByHeight(element, height)
        }
    }

    function maxText(elem, max){
        var text = elem.text();

        if (text.length > max) {
            var newText = text.slice(0, max) + '...';
            elem.text(newText);
        }
    };

    function beautyPrice(price, type = 1){
        var billion = (price / 1000000000);
        var million = (price % 1000000000 / 1000000).toFixed(0);

        if (type == 1) {
            if (billion >= 1) {
                return billion.toFixed(2) + ' tỷ';
            }
            else{
                return million + 'triệu';
            }
        }

        if (type == 2) {
            if (billion >= 1) {
                return billion.toFixed(0) + ' tỷ ' + milion + ' triệu';
            }
            else{
                return million + 'triệu';
            }
        }
    }

    $('.beauty-price').each(function(){
        $(this).text(beautyPrice($(this).data('price')));
    })

    function shortText(string, max){
        var arr = string.split(' ');
        output = string;
        for (let i = 0; i < arr.length; i++) {
            if (output.length > max) {
                arr[i] = arr[i].slice(0, 1);
                output = arr.join(' ');
            }else{
                return output;
            }
        }
    }

    function showPreloader(){
        $('body').removeClass('loaded');
    }

    function hidePreloader(){
        $('body').addClass('loaded');
    }

    function getRealtyFromApi(url){
        var url = url;
        // showPreloader();
        return $.ajax({
            type: "GET",
            url: url,
        });

    }

    $(document).ready(function () {
        hidePreloader()
    });

    $('.select2').select2({ dropdownAutoWidth : true});
    $('.select2-hide-search').select2(
        {
            dropdownAutoWidth : true,
            minimumResultsForSearch: -1
        }
    );

    var wow = new WOW(
        {
            boxClass:     'wow',      // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset:       0,          // distance to the element when triggering the animation (default is 0)
            mobile:       false,       // trigger animations on mobile devices (default is true)
            live:         true,       // act on asynchronously loaded content (default is true)
            callback:     function(box) {
            // the callback is fired every time an animation is started
            // the argument that is passed in is the DOM node being animated
            },
            scrollContainer: null,    // optional scroll container selector, otherwise use window,
            resetAnimation: true,     // reset animation on end (default is true)
        }
    );
    wow.init();

</script>
@include('customer.partials.featured_script')
{{-- {!! $theme_options['Script'] ?? '' !!} --}}
@yield('script')

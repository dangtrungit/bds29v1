<div class="why-choose-us">
    <div class="text-center mb-5">
        <h2 class="mb-3">{{$home_why_choose->title ?? ''}}</h2>
        <span><em>{!! nl2br($home_why_choose->slogan ?? '') !!}</em></span>
    </div>
    <div class="row container mx-auto mb-5 pb-4">
        @isset($home_why_choose->item)
            @foreach ($home_why_choose->item as $section)
                <div class="col-md-4 text-center">
                    <div class="text-center">
                        <div class="font-20"><i class="{{$section->icon ?? ''}}"></i></div>
                    </div>
                    <h3 class="font-weight-500 font-11 pt-2">{{$section->title ?? ''}}</h3>
                    <hr style="width: 60px">
                    <div class="font-9">{!! nl2br($section->content ?? '') !!}</div>
                </div>
            @endforeach
        @endisset
    </div>
    <div class="row container mx-auto mt-5">
        <div class="col-md-4 text-center">
            <h3 class="font-weight-500 font-16">Giao dịch</h3>
            <div style="font-size: 96px; line-height: 1em" class="font-weight-300">1000<sup>+</sup></div>
        </div>
        <div class="col-md-4 text-center">
            <h3 class="font-weight-500 font-16">Yêu thích</h3>
            <div style="font-size: 96px; line-height: 1em" class="font-weight-300">450<sup>+</sup></div>
        </div>
        <div class="col-md-4 text-center">
            <h3 class="font-weight-500 font-16">Tương tác</h3>
            <div style="font-size: 96px; line-height: 1em" class="font-weight-300">150<sup>+</sup></div>
        </div>
    </div>
</div>

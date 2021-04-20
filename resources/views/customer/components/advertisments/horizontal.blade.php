<section class="horizon-advertisment container owl-carousel">
    @if (!Agent::isMobile())
        @foreach ($items as $ad)
            <div class="item">{!!$ad->content ?? ''!!}</div>
        @endforeach
    @else
        @foreach ($items_mobile as $ad)
            <div class="item">{!!$ad->content ?? ''!!}</div>
        @endforeach
    @endif
</section>

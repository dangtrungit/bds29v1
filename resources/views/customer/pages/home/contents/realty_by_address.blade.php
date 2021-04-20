<div class="realty-by-address">
    <h2 class="text-center py-5">Bất Động Sản Theo Địa Điểm</h2>
    <div class="row mx-2">
        @foreach ($featured_district->take(9)->chunk(3) as $index => $chunk)
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-6 px-2">
                    @php
                        $top_district = $chunk->first();
                    @endphp
                    <a class="d-block h-100 rounded-10" href="/{{$top_district->slug ?? ''}}"
                        style="background: url({{$top_district->details->avatar ?? ''}}); background-size:cover"
                    >
                        <div class="d-flex flex-column justify-content-between h-100 p-2">
                            <div class="text-white">
                                <p class="font-13 text-white mb-0">{{$top_district->name}}</p>
                                <p>{{$top_district->realty_posts_count ?? ''}} tin đăng</p>
                            </div>
                            <div class="text-right text-white">
                                Chi tiết
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 px-2">
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($chunk->skip(1) as $item)
                    <a href="/{{$item->slug}}"
                        class="d-block embed-responsive embed-responsive-4by3 rounded-10 @if($i==1) mb-3 @endif "
                        style="background: url({{$item->details->avatar ?? ''}}) ; background-size:cover"
                    >
                        <div class="d-flex flex-column justify-content-between embed-responsive-item p-2">
                            <div>
                                <p class="font-13 text-white mb-0">{{$item->name}}</p>
                                <p class="text-white">{{$item->realty_posts_count ?? ''}} tin đăng</p>
                            </div>
                            <div class="text-right text-white">
                                Chi tiết
                            </div>
                        </div>
                    </a>
                    @php
                        $i = 2;
                    @endphp
                    @endforeach
                </div>
            </div>
        </div>

        {{-- <div class="col-12 col-md-6">
            <div class="row no-gutters
            @if ($index >= 2)
            flex-row-reverse
            @endif
            ">
                <div class="col-12 col-md-6">
                    <div class="embed-responsive embed-responsive-1by1 w-100">
                        <img class="embed-responsive-item" src="{{$district->details->avatar ?? ''}}" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6 p-5 d-flex align-items-center justify-content-center flex-column text-center">
                    <a href="/{{$district->slug}}"><h3 class="font-weight-600">{{$district->name}}</h3></a>
                    <p class="py-2 font-weight-300 font-9">{{$district->details->short_description ?? 'Rio de Janeiro được chia thành các quận với mỗi quận có một số khu vực lân cận. Có một số khu vực lân cận rất nổi tiếng với người dân địa phương cũng như khách du lịch.'}}</p>
                    <span class="font-14 font-weight-400">{{$district->realty_posts_count ?? ''}} tin đăng</span>
                </div>
            </div>
        </div> --}}
        @endforeach
    </div>
</div>

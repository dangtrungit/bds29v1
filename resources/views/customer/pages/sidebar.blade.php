<div class="col-md-3 sidebar mt-4">
    {{-- @include('customer.components.side_search') --}}
    @isset($side_lists)
        @foreach ($side_lists as $list)
        <div class="">
            <h2 class="font-11">{{$list['title']}}</h2>
            <div class="widget-content">
                @isset($list['items'])
                <ul class="p-0">
                    @foreach ($list['items'] as $item)
                    <li>
                     <a href="{{$item['link']}}"> <span class="text"> {{$item['name']}} </span> <span class="count">({{$item['count']}})</span> </a>

                    </li>
                    @endforeach
                </ul>
                @endisset
            </div>
        </div>
        @endforeach
    @endisset
</div>

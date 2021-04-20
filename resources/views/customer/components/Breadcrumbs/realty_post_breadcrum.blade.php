<div class="breadcrumbs">
    <a class="text-secondary" href="/">Trang chủ</a>
    @if (!empty($links))
        /
    @endif
    @foreach ($links as $index =>  $item)
    @if ($index !== 0)
     /
    @endif
    <a class="text-secondary" href="{{$item['link']}}">{{$item['name']}}</a>
    @endforeach
</div>



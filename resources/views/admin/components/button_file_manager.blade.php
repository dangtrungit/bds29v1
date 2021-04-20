<div class="input-group file-btn-wraper">
    <input type="hidden" name="{{$input_name}}" value="{{$current_input}}" class="form-field stand-alone-input">
    <div class="image-holder">
        @php
            $current_input = explode(",",$current_input);
        @endphp

        @foreach ($current_input as $item)
            @php
                $thumb_url = null;
                if ($item !== '') {
                    $last = strrpos($item, '/');
                    $thumb_url = substr_replace($item, '/thumbs', $last, 0);
                }
            @endphp
            @if ($thumb_url)
                <div class="d-inline-block image-wraper text-center p-2 mr-1 mb--2" style="border: 1px dashed gray;">
                    <div class="img" style="object-fit: contain; height:8rem; width:8rem">
                        <img style="width: 100%" src="{{$thumb_url}}">
                    </div>
                    <button style="cursor-pointer"
                    type="button"
                    class="stand-alone-image-delete p-1 d-block btn btn-link text-red mx-auto"
                    data-image="{{$item}}">Xóa hình ảnh</button>
                </div>
            @endif
        @endforeach
    </div>
    <span class="input-group-btn">
        <a id="{{$id}}"
        data-input="thumbnail"
        data-preview="holder"
        class="d-block"
        style=" border: 1px dashed gray;">
            <img style="height:8rem; width:8rem; cursor: pointer;" src="{{asset('/images/placeholder.png')}}">
            <button type="button" class="p-1 d-block btn btn-link text-red mx-auto">Thêm mới</button>
        </a>
    </span>
</div>

@section('script')
@parent
<script>
    lfm("{{$id}}", 'image', { prefix: '/admin/laravel-filemanager' });
</script>
@endsection

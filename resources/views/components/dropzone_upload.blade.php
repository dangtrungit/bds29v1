{{--tham số đầu vào
    action store
    action delete
    @param input_name
--}}

<div  id="{{$input_name}}" action="/image/store" class="dropzone" >
    <div class="fallback">
      <input name="file" type="file" multiple />
    </div>
    <input
    @isset($mock_file)
        @php
            $file_list = [];
            foreach ($mock_file as $item) {
                if ($item) {
                    $file_list[] = $item['path'];
                }
            }
            $file_list_string = implode(',', $file_list);
        @endphp
        value="{{$file_list_string}}"
    @endisset
    type="hidden" name="{{$input_name}}" >
</div>

@section('script')

@parent
<script>
    $(document).ready(function () {
        let {{Str::camel($input_name)}} = new Dropzone("div#{{$input_name}}", {
            dictDefaultMessage: "Click hoặc kéo ảnh vào đây",
            url: "/image/store",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            addRemoveLinks: true,
            init: function () {
                @isset($mock_file)
                    var mock_file = @json($mock_file);
                    mock_file.forEach(element => {
                        if(element){
                            // this.displayExistingFile(element, element.path);

                            this.emit("addedfile", element);
                            this.emit("thumbnail", element, element.path);
                            this.emit("success", element);
                            this.emit("complete", element);
                            element['link'] = element.path;
                            $(element.previewTemplate).append(
                                `<a class="dz-remove-link" href="javascript:undefined;" data-remove-link="${element.storage_path}"></a>`
                            );
                            this.files.push(element);
                        }
                    });
                @endisset

                let getStorageLinks = () => {
                    var file_list = this.files.map(function (item) {
                        return item.link;
                    });
                    file_list = file_list.join(',');
                    return file_list;
                }

                this.on("addedfile", function (file) {
                    if (this.files.length) {
                        var _i, _len;
                        for (_i = 0, _len = this.files.length; _i < _len - 1; _i++) // -1 to exclude current file
                        {
                            if (this.files[_i].name === file.name && this.files[_i].size === file.size && this.files[_i].lastModifiedDate.toString() === file.lastModifiedDate.toString()) {
                                alert('File đã tồn tại!');
                                this.removeFile(file);
                            }
                        }
                    }
                    if(this.files.length > 10){
                        alert('Bạn chỉ được upload tối đa 10 ảnh mỗi bài!');
                        this.removeFile(file);
                    }
                    maxSize = 2;
                    if(file.size > maxSize * 1024 * 1024){
                        console.log(file.size);
                        alert('Kích thước ảnh quá lớn, tối đa '+ maxSize +'Mb!');
                        this.removeFile(file);
                    }
                });

                this.on("success", function (file, response) {
                    var imageStoragePath = response.storage_path;
                    $(file.previewTemplate).append(
                        `<a class="dz-remove-link" href="javascript:undefined;" data-remove-link="${imageStoragePath}"></a>`
                    );
                    file['link'] = response.path;
                    let file_list = getStorageLinks();
                    $('input[name="{{$input_name}}"]').val(file_list);
                });

                this.on("thumbnail", function(file, dataUrl) {
                    console.log('hello');
                    $('.dz-image').last().find('img').attr({width: '100%', height: '100%', objectFit: "contain"});
                });

                this.on("removedfile", function (file) {
                    var filePath = $(file.previewTemplate).children('.dz-remove-link').data('remove-link');
                    $.ajax({
                        type: 'POST',
                        url: "{{route('image.destroy')}}",
                        data: {
                            storage_path: filePath,
                        }
                    });
                    let file_list = getStorageLinks();
                    $('input[name="{{$input_name}}"]').val(file_list);
                });
            }
        });
    });
</script>
@endsection

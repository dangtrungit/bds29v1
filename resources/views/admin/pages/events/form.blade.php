<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thông tin bài viết</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group">
                <label for="event_name">Tên sự kiện (<span class="text-red">*</span>)</label>
                <input 
                name="name" 
                type="text" 
                class="form-control @error('name') is-invalid @enderror" 
                id="event_name" 
                placeholder="Nhập tên sự kiện"
                value="{{$event->name ?? old('name')}}"
                >
                @error('name')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="slug">Slug (<span class="text-red">*</span>)</label>
                <input 
                name="slug" 
                type="text" 
                class="form-control @error('slug') is-invalid @enderror" 
                id="slug" 
                placeholder="Nhập slug"
                value="{{$event->slug ?? old('slug')}}"
                >
                @error('slug')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="place">Địa điểm (<span class="text-red">*</span>)</label>
                <input 
                name="place" 
                type="text" 
                class="form-control @error('place') is-invalid @enderror" 
                id="place" 
                placeholder="Nhập địa điểm"
                value="{{$event->place ?? old('place')}}"
                >
                @error('place')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Mô tả ngắn</label>
                <textarea name="short_description" 
                    class="form-control @error('short_description') is-invalid @enderror" 
                    rows="3"
                    placeholder="Nhập mô tả ...">{{$event->short_description ?? old('short_description')}}</textarea>
                @error('short_description')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group ">
                <label class="control-label">Chi tiết sự kiện</label>
                @include('admin.components.ckeditor', ['id' => 'content',
                'name' => 'content',
                'current_input' => $event->content ?? old('content') ?? ''
                ])
                @error('content')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>
        </div>
    </div>

</div>
<div class="col-md-3">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thao tác</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="btn-set">
                <button type="submit" name="submit" value="save" class="btn btn-info">
                    <i class="fa fa-save"></i> Lưu
                </button>
                &nbsp;
                <button type="submit" name="submit" value="apply" class="btn btn-success">
                    <i class="fa fa-check-circle"></i> Lưu &amp; Thoát
                </button>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-form-label mr-2 d-block" name="is_featured" for="">Khóa học nổi bật</label>
        <input class="" 
        name="is_featured" 
        type="checkbox" 
        @isset($event->is_featured)
            @if ($event->is_featured == 1 )
                checked
            @endif
        @endisset
        data-bootstrap-switch
        data-off-color="danger" 
        data-on-color="success">
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thời gian</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="staticEmail" class="col-form-label">Từ &nbsp; :</label>
                <div class="col-8">
                    <input  
                    id="date-picker" 
                    class="date-picker form-control" 
                    type="text" 
                    name="start_at"
                    @isset($event->start_at)
                    value="{{Carbon\Carbon::parse($event->start_at)->format('H:i d/m/Y') ?? ''}}"
                    @else
                    value=""
                    @endisset
                    >
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-form-label">Đến:</label>
                <div class="col-8">
                    <input  
                    id="date-picker" 
                    class="date-picker form-control" 
                    type="text" 
                    name="end_at"
                    @isset($event->end_at)
                    value="{{Carbon\Carbon::parse($event->end_at)->format('H:i d/m/Y') ?? '01/01/2000 10:00'}}"
                    @else
                    value=""
                    @endisset
                    >
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Ảnh đại diện</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group ">
                @include('admin.components.button_file_manager', ['id' => 'avatar',
                'input_name' => 'avatar',
                'current_input' => $event->avatar ?? old('avatar')
                ])
            </div>
        </div>
    </div>

    @isset($event)
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">SEO manager</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group ">
                @php
                    $link = \str_replace(url('/'), '', route('customer.event.show_front', $event->slug));
                @endphp
                @include('seo_manager.admin_component', ['link' => $link])
            </div>
        </div>
    </div>
    @endisset
    
</div>



@section('script')
@parent
<script>
    @isset($course)
    function reloadCourseTree() {
        $.ajax({
            type: 'get',
            url: "{{route('admin.course.tree',$event->id)}}",
            success: function (data) {
                renderCourseTerm(data)
            }
        })
    };
    @endisset
    //render list  course and lecture
    function renderCourseTerm(html) {
        $('.course-term-list').html(html);
    }
    // get slug
    $('#event_name').on('blur', function () {
        getSlug('event', $(this).val(), $('#slug'));
    });
</script>
@endsection
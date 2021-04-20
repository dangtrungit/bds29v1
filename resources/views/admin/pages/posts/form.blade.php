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
                <label for="post_name">Tên bài viết (<span class="text-red">*</span>)</label>
                <input
                name="name"
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="post_name"
                placeholder="Nhập tên bài viết"
                value="{{$post->name ?? old('name')}}"
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
                value="{{$post->slug ?? old('slug')}}"
                >
                @error('slug')
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
                    placeholder="Nhập mô tả ...">{{$post->short_description ?? old('short_description')}}</textarea>
                @error('short_description')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group ">
                <label class="control-label">Chi tiết bài viết</label>
                @include('admin.components.ckeditor', ['id' => 'content',
                'name' => 'content',
                'current_input' => $post->content ?? old('content') ?? ''
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

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Trạng thái </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Trạng thái</label>
                <select class="form-control select2 select2-info" value="" name="status" data-dropdown-css-class="select2-info"
                    style="width: 100%;">
                    <option @if(isset($post->status) && $post->status == 1) selected @endif value="1">Đang hoạt động</option>
                    <option @if(isset($post->status) && $post->status == 2) selected @endif value="2">Dừng hoạt động</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-form-label mr-2 d-block" name="is_featured" for="">Bài viết nổi bật</label>
                <input class=""
                name="is_featured"
                type="checkbox"
                @isset($post->is_featured)
                    @if ($post->is_featured == 1 )
                        checked
                    @endif
                @endisset
                data-bootstrap-switch
                data-off-color="danger"
                data-on-color="success">
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh mục </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <select name="categories[]" multiple="multiple" class="form-control select2 select2-info"
                    data-dropdown-css-class="select2-info" style="width: 100%;">
                    @php
                        if(isset($post->categories)){
                            $category_list = $post->categories->pluck('id')->toArray();
                        }else{
                            $category_list = [];
                        }
                    @endphp
                    @foreach ($categories as $item)
                    <option
                    value="{{$item->id}}"
                    @if (in_array($item->id, $category_list))
                        selected
                    @endif
                    >
                        {{$item->name}}
                    </option>
                    @endforeach
                </select>
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
                'current_input' => $post->avatar ?? old('avatar')
                ])
            </div>
        </div>
    </div>

    @isset($post)
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
                    $link = \str_replace(url('/'), '', route('customer.post.show',['cat_slug' => $post->categories->first()->slug ?? 'danh-muc', 'post_slug' => $post->slug] ));
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
            url: "{{route('admin.course.tree',$post->id)}}",
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
    $('#post_name').on('blur', function () {
        getSlug('post', $(this).val(), $('#slug'));
    });
</script>
@endsection

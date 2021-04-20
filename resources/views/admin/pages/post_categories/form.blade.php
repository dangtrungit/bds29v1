<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thông tin danh mục</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group">
                <label for="category_name">Tên danh mục (<span class="text-red">*</span>)</label>
                <input
                name="name"
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="category_name"
                placeholder="Nhập tên danh mục"
                value="{{$category->name ?? old('name')}}"
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
                value="{{$category->slug ?? old('slug')}}"
                >
                @error('slug')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Mô tả ngắn</label>
                <textarea
                    name="short_description"
                    class="form-control @error('short_description') is-invalid @enderror"
                    rows="3"
                    placeholder="Nhập mô tả ..."
                >{{$category->short_description ?? old('short_description')}}</textarea>
                @error('short_description')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>
        </div>
        <!-- /.card-body -->
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
                    <option @if(isset($category->status) && $category->status == 1) selected @endif value="1">Đang hoạt động</option>
                    <option @if(isset($category->status) && $category->status == 2) selected @endif value="2">Dừng hoạt động</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-form-label mr-2 d-block" name="is_featured" for="">Danh mục nổi bật</label>
                <input class=""
                name="is_featured"
                type="checkbox"
                @isset($category->is_featured)
                    @if ($category->is_featured == 1 )
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
            <h3 class="card-title">Danh mục cha </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <select name="parent_id" class="form-control select2 select2-info"
                    data-dropdown-css-class="select2-info" style="width: 100%;">
                    <option @if (isset($category) && $category->parent_id == 0) selected @endif  value="0">Không có danh mục cha</option>
                    @foreach ($post_categories as $item)
                        <option @if (isset($category) && $item->id == $category->parent_id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

        </div>
    </div>

    @isset($category)
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
                    $link = \str_replace(url('/'), '', route('customer.post.show_by_category', $category->slug));
                @endphp
                @include('seo_manager.admin_component', ['link' => $link])
            </div>
        </div>
    </div>
    @endisset
</div>

@section('script')
    <script>
        // get slug
        $('#category_name').on('blur', function () {
        getSlug('post_category', $(this).val(), $('#slug'));
        });
    </script>
@endsection

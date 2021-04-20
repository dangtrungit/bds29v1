<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thông tin tag</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group">
                <label for="tag_name">Tên tag (<span class="text-red">*</span>)</label>
                <input
                name="name"
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="tag_name"
                placeholder="Nhập tên tag"
                value="{{$tag->name ?? old('name')}}"
                >
                @error('name')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="col-md-6 form-group">
                <label for="type">Loại tag (<span class="text-red">*</span>)</label>
                <select class="form-control" name="type" id="type">
                    <option value="post" @if (isset($tag) && $tag->type == 'post') selected @endif >Bài viết</option>
                    <option value="realty" @if (isset($tag) && $tag->type == "realty") selected @endif >Bài rao bất động sản</option>
                </select>
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

</div>

@section('script')
    @parent
    <script>
        // get slug
        $('#tag_name').on('blur', function () {
        getSlug('post_tag', $(this).val(), $('#slug'));
        });
    </script>
@endsection

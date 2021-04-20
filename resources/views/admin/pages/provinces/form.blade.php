<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thông tin cơ bản</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group">
                <label for="post_name">Tên tỉnh (<span class="text-red">*</span>)</label>
                <input
                name="name"
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="post_name"
                placeholder="Nhập tên tỉnh"
                value="{{$province->name ?? old('name')}}"
                >
                @error('name')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="post_name">Tên đầy đủ (<span class="text-red">*</span>)</label>
                <input
                name="name_with_type"
                type="text"
                class="form-control @error('name_with_type') is-invalid @enderror"
                id="post_name"
                placeholder="Nhập tên đầy đủ. Ví dụ: Tỉnh thanh hóa"
                value="{{$province->name_with_type ?? old('name_with_type')}}"
                >
                @error('name_with_type')
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
                value="{{$province->slug ?? old('slug')}}"
                >
                @error('slug')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thông tin chi tiết</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group">
                <label for="area">Diện tích (<span class="text-red">*</span>)</label>
                <input
                name="area"
                type="number"
                class="form-control @error('area') is-invalid @enderror"
                id="area"
                placeholder="Nhập diện tích"
                value="{{$province->details->area ?? old('area')}}"
                >
                @error('area')
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
                    placeholder="Nhập mô tả ...">{{$province->details->short_description ?? old('short_description')}}</textarea>
                @error('short_description')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group ">
                <label class="control-label">Chi tiết tỉnh</label>
                @include('admin.components.ckeditor', ['id' => 'full_description',
                'name' => 'full_description',
                'current_input' => $province->details->full_description ?? old('full_description') ?? ''
                ])
                @error('full_description')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group ">
                <label for="images">Album Ảnh</label>
                @include('admin.components.button_file_manager', ['id' => 'images',
                'input_name' => 'images',
                'current_input' => $province->details->images ?? old('images')
                ])
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
            <h3 class="card-title">Phân loại</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <select class="form-control select2 select2-info" value="" name="type" data-dropdown-css-class="select2-info"
                    style="width: 100%;">
                    @foreach (config('constant.province_type') as $key => $value)
                        <option @if(isset($province) && $key == $province->type) selected @endif value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="code">Mã tỉnh (<span class="text-red">*</span>)</label>
                <input
                name="code"
                type="number"
                class="form-control @error('code') is-invalid @enderror"
                id="code"
                placeholder="Nhập diện tích"
                value="{{$province->code ?? old('code')}}"
                >
                @error('code')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
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
                'current_input' => $province->details->avatar ?? old('avatar')
                ])
            </div>
        </div>
    </div>
</div>

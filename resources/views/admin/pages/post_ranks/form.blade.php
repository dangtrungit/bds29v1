<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thông tin loại tin đăng</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group">
                <label for="post_rank_name">Tên loại tin đăng (<span class="text-red">*</span>)</label>
                <input
                name="name"
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="name"
                placeholder="Nhập tên loại tin đăng"
                value="{{$post_rank->name ?? old('name')}}"
                >
                @error('name')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="post_rank_name">Đơn giá (<span class="text-red">*</span>)</label>
                <input
                name="price"
                type="number"
                class="form-control @error('price') is-invalid @enderror"
                id="price"
                placeholder="Nhập đơn giá"
                value="{{$post_rank->price ?? old('price')}}"
                >
                @error('price')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="rank_code">Mã số (từ 1 - 10) (<span class="text-red">*</span>)</label>
                <input
                name="rank_code"
                type="text"
                class="form-control @error('rank_code') is-invalid @enderror"
                id="rank_code"
                placeholder="Nhập tên loại tin đăng"
                value="{{$post_rank->rank_code ?? old('rank_code')}}"
                >
                @error('rank_code')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group ">
                <label class="control-label">Mô tả</label>
                @include('admin.components.ckeditor', ['id' => 'description',
                'name' => 'description',
                'current_input' => $post_rank->description ?? old('description') ?? ''
                ])
                @error('description')
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
</div>

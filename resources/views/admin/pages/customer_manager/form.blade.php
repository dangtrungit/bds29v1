<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thông tin người dùng</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên người dùng (<span class="text-red">*</span>)</label>
                <input
                name="name"
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="name"
                placeholder="Nhập Tên người dùng"
                value="{{$customer->name ?? old('name')}}"
                >
                @error('name')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input
                name="email"
                type="text"
                class="form-control  @error('email') is-invalid @enderror"
                id="email"
                placeholder="Nhập địa chỉ email"
                value="{{$customer->email ?? old('email')}}"
                >
                @error('email')
                <div id="" class="error invalid-feedback d-block">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone_number">Số điện thoại</label>
                <input
                name="phone_number"
                type="text"
                class="form-control @error('phone_number') is-invalid @enderror"
                id="phone_number"
                placeholder="Nhập số điện thoại"
                value="{{$customer->phone_number ?? old('phone_number')}}"
                >
                @error('phone_number')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input
                name="address"
                type="text"
                class="form-control @error('address') is-invalid @enderror"
                id="address"
                placeholder="Nhập địa chỉ"
                value="{{$customer->address ?? old('address')}}"
                >
                @error('address')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            @if (!isset($customer))
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input
                name="password"
                type="text"
                class="form-control @error('password') is-invalid @enderror"
                id="password"
                placeholder="Nhập mật khẩu"
                value="{{old('password')}}"
                >
                @error('password')
                <div id="" class="error invalid-feedback d-block">
                    {{$message}}
                </div>
                @enderror
            </div>
            @endif
        </div>
        <!-- /.card-body -->
    </div>
    @isset($customer)
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thay đổi mật khẩu</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="old_password">Mật khẩu cũ</label>
                <input
                name="old_password"
                type="text"
                class="form-control @error('old_password') is-invalid @enderror"
                id="old_password"
                placeholder="Nhập mật khẩu cũ"
                value="{{old('old_password')}}"
                >
                @error('old_password')
                <div id="" class="error invalid-feedback d-block">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone_number">Mật khẩu mới</label>
                <input
                name="password"
                type="text"
                class="form-control @error('password') is-invalid @enderror"
                id="password"
                placeholder="Nhập mật khẩu mới"
                value="{{old('password')}}"
                >
                @error('password')
                <div id="" class="error invalid-feedback d-block">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
    </div>
    @endisset
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

    @isset($customer)
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
                <div class="input-group">
                    <div class="custom-file">
                      <input name="avatar" type="file" class="custom-file-input" >
                      <label class="custom-file-label" for="">Chọn file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text" id="">Upload</span>
                    </div>
                </div>
                <img style="margin-top:30px" src="{{$customer->profile_image_path}}" alt="" width="150px" height="150px">
                @error('avatar')
                <div id="" class="error invalid-feedback d-block">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
    </div>
    @endisset

</div>

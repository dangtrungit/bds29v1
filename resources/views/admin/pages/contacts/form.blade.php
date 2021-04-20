<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thông tin khách hàng</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group">
                <label for="fullname">Tên người yêu cầu (<span class="text-red">*</span>)</label>
                <input
                name="fullname"
                type="text"
                class="form-control"
                id="fullname"
                placeholder="Nhập Tên khách hàng"
                value="{{$contact->fullname ?? old('fullname')}}"
                >
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input
                name="email"
                type="text"
                class="form-control"
                id="email"
                placeholder="Nhập địa chỉ"
                value="{{$contact->email ?? old('email')}}"
                >
            </div>

            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input
                name="address"
                type="text"
                class="form-control"
                id="address"
                readonly
                placeholder="Trống"
                value="{{$contact->province->name_with_type ?? old('address')}}"
                >
            </div>

            <div class="form-group">
                <label for="phone_number">Số điện thoại</label>
                <input
                name="phone_number"
                type="text"
                class="form-control"
                id="phone_number"
                placeholder="Nhập địa chỉ"
                value="{{$contact->phone_number ?? old('phone_number')}}"
                >
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
            <h3 class="card-title">Trạng thái</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <select class="form-control select2 select2-info" value="" name="status" data-dropdown-css-class="select2-info"
                    style="width: 100%;">
                    <option @if(isset($contact->status) && $contact->status == 0) selected @endif value="0">Chưa tư vấn</option>
                    <option @if(isset($contact->status) && $contact->status == 1) selected @endif value="1">Đã tư vấn</option>
                </select>
            </div>
        </div>
    </div>
</div>

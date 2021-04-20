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
                <label for="slug">Mã nạp tiền (<span class="text-red">*</span>)</label>
                <input
                name=""
                disabled
                type="text"
                class="form-control @error('bill_code') is-invalid @enderror"
                id="bill_code"
                placeholder="Nhập bill_code"
                value="{{$bill->bill_code ?? old('bill_code')}}"
                >
                @error('bill_code')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="slug">Tên khách hàng (<span class="text-red">*</span>)</label>
                <input
                name=""
                type="text"
                class="form-control @error('owner_name') is-invalid @enderror"
                id="owner_name"
                placeholder="Nhập owner_name"
                value="{{$bill->owner_name ?? old('owner_name')}}"
                >
                @error('owner_name')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="slug">Tên khách hàng (<span class="text-red">*</span>)</label>
                <input
                name="owner_phone"
                type="text"
                class="form-control @error('owner_phone') is-invalid @enderror"
                id="owner_phone"
                placeholder="Nhập số điện thoại"
                value="{{$bill->owner_phone ?? old('owner_phone')}}"
                >
                @error('owner_phone')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="slug">Email (<span class="text-red">*</span>)</label>
                <input
                name="owner_email"
                type="text"
                class="form-control @error('owner_email') is-invalid @enderror"
                id="owner_email"
                placeholder="Nhập email"
                value="{{$bill->owner_email ?? old('owner_email')}}"
                >
                @error('owner_email')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="slug">Số tiền nạp (<span class="text-red">*</span>)</label>
                <input
                name="amount_of_money"
                type="text"
                class="form-control @error('amount_of_money') is-invalid @enderror"
                id="amount_of_money"
                placeholder="Nhập số tiền"
                value="{{$bill->amount_of_money ?? old('amount_of_money')}}"
                >
                @error('amount_of_money')
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
                    @foreach (config('constant.bill_status') as $index => $item)
                    <option
                        @if(isset($bill->status) && $bill->status == $index) selected @endif
                        value="{{$index}}"
                    >
                        {{$item['name']}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>




<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Nội dung quảng cáo</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên đối tác (<span class="text-red">*</span>)</label>
                <input
                name="name"
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="name"
                placeholder="Nhập tên quảng cáo"
                value="{{$partner->name ?? old('name')}}"
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
                value="{{$partner->slug ?? old('slug')}}"
                >
                @error('slug')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Địa chỉ (<span class="text-red">*</span>)</label>
                <input
                name="address"
                type="text"
                class="form-control @error('address') is-invalid @enderror"
                id="address"
                placeholder="Nhập địa chỉ"
                value="{{$partner->address ?? old('address')}}"
                >
                @error('address')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Số điện thoại (<span class="text-red">*</span>)</label>
                <input
                name="phone"
                type="text"
                class="form-control @error('phone') is-invalid @enderror"
                id="phone"
                placeholder="Nhập số điện thoại"
                value="{{$partner->phone ?? old('phone')}}"
                >
                @error('phone')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email (<span class="text-red">*</span>)</label>
                <input
                name="email"
                type="text"
                class="form-control @error('email') is-invalid @enderror"
                id="email"
                placeholder="Nhập Email"
                value="{{$partner->email ?? old('email')}}"
                >
                @error('email')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>


            <div class="form-group ">
                <label class="control-label">Chi tiết đối tác</label>
                @include('admin.components.ckeditor', ['id' => 'description',
                'name' => 'description',
                'current_input' => $partner->description ?? old('description') ?? ''
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
                <label>Lĩnh vực kinh doanh</label>
                <select class="form-control select2 select2-info" value="" name="areas_of_expertise" data-dropdown-css-class="select2-info"
                    style="width: 100%;">
                    @foreach (config('constant.partner.areas_of_expertise') as $index => $item)
                    <option @if(isset($partner->areas_of_expertise) && $partner->areas_of_expertise == $index) selected @endif value="{{$index}}">{{$item['name'] ?? ''}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Phân loại đối tác</label>
                <select class="form-control select2 select2-info" value="" name="rank" data-dropdown-css-class="select2-info"
                    style="width: 100%;">
                    @foreach (config('constant.partner.rank') as $index => $item)
                    <option @if(isset($partner->rank) && $partner->rank == $index) selected @endif value="{{$index}}">{{$item['name'] ?? ''}}</option>
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
                @include('admin.components.button_file_manager', ['id' => 'logo',
                'input_name' => 'logo',
                'current_input' => $partner->logo ?? old('logo')
                ])
            </div>
            @error('logo')
                <div id="" class="error invalid-feedback d-block">
                    {{$message}}
                </div>
            @enderror
        </div>


    </div>
</div>

@section('script')
    @parent
    <script src="{{asset('/template/ckeditor/ckeditor.js')}}"></script>
    <script>
         // get slug
        $('#name').on('blur', function () {
            getSlug('partner', $(this).val(), $('#slug'));
        });
    </script>
@endsection

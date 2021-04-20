
<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thông tin lớp học</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group">
                <label for="class_name">Tên lớp học (<span class="text-red">*</span>)</label>
                <input 
                name="name" 
                type="text" 
                class="form-control @error('name') is-invalid @enderror" 
                id="class_name" 
                placeholder="Nhập tên lớp học"
                value="{{$class->name ?? old('name')}}"
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
                value="{{$class->slug ?? old('slug')}}"
                >
                @error('slug')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Học phí gốc(<span class="text-red">*</span>)</label>
                <input 
                name="sub_price" 
                type="number" 
                class="form-control @error('sub_price') is-invalid @enderror" 
                id="sub_price" 
                placeholder="Nhập học phí"
                value="{{$class->sub_price ?? old('sub_price')}}"
                >
                @error('sub_price')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Học phí ưu đãi(<span class="text-red">*</span>)</label>
                <input 
                name="price" 
                type="number" 
                class="form-control @error('price') is-invalid @enderror" 
                id="price" 
                placeholder="Nhập học phí"
                value="{{$class->price ?? old('price')}}"
                >
                @error('price')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Địa điểm (<span class="text-red">*</span>)</label>
                <input 
                name="address" 
                type="text" 
                class="form-control @error('address') is-invalid @enderror" 
                id="address" 
                placeholder="Nhập địa điểm học"
                value="{{$class->address ?? old('address')}}"
                >
                @error('address')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="date-picker">Ngày khai giảng: </label>
                <input style="border:none; outline: none" 
                id="date-picker" 
                class="date-picker @error('start_at') is-invalid @enderror" 
                type="text" 
                name="start_at" 
                value="@isset($class)
                {{Carbon\Carbon::parse( $class->start_at)->format('H:i d/m/Y')}}
                @endisset"
                >
                @error('start_at')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="duration">Thời lượng (<span class="text-red">*</span>)</label>
                <input 
                name="duration" 
                type="text" 
                class="form-control @error('duration') is-invalid @enderror" 
                id="duration" 
                placeholder="Nhập thời lượng học (Chuỗi ký tự)"
                value="{{$class->duration ?? old('duration')}}"
                >
                @error('duration')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Mục tiêu lớp học <span class="font-weight-normal text-info font-italic">( ngăn cách bởi dấu "|" )</span></label>
                <textarea name="class_purposes" class="form-control @error('class_purposes') is-invalid @enderror" rows="3"
                    placeholder="Nhập mục tiêu">{{$class->class_purposes ?? old('class_purposes')}}</textarea>
                @error('class_purposes')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Mô tả ngắn</label>
                <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="3"
                    placeholder="Nhập mô tả ...">{{$class->short_description ?? old('short_description')}}</textarea>
                @error('short_description')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group ">
                <label class="control-label">Chi tiết lớp học</label>
                @include('admin.components.ckeditor', ['id' => 'full_description',
                'name' => 'full_description',
                'current_input' => $class->full_description ?? old('full_description') ?? ''
                ])
                @error('full_description')
                <div id="" class="error invalid-feedback d-block">
                        {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group ">
                <label class="control-label">Mô tả block đặt hàng</label>
                @include('admin.components.ckeditor', ['id' => 'block_buy_desc',
                'name' => 'block_buy_desc',
                'current_input' => $class->block_buy_desc ?? old('block_buy_desc') ?? ''
                ])
                @error('block_buy_desc')
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
            <h3 class="card-title">Chọn khóa học</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <select name="courses[]" multiple="multiple" class="form-control select2 select2-info"
                    data-dropdown-css-class="select2-info" style="width: 100%;">
                    @php
                        if (isset($class)) {
                            $course_list = $class->courses->pluck('id')->toArray();
                        }
                        else{
                            $course_list = [];
                        }
                    @endphp
                    @foreach ($courses as $item)
                    <option @if(in_array($item->id, $course_list)) selected @endif value="{{$item->id}}">
                        {{$item->name}}
                    </option>
                    @endforeach
                </select>
            </div>

        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Đa phương tiện</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group ">
                <label for="images">Hình ảnh lớp học</label>
                @include('admin.components.button_file_manager', ['id' => 'images',
                'input_name' => 'images',
                'current_input' => $images ?? old('images')
                ])
            </div>

            <div class="form-group ">
                <label class="control-label">Link video giới thiệu</label>
                @include('admin.components.button_link_manager', ['id' => 'intro_video', 
                    'input_name' => 'intro_video',
                    'current_input' => $class->intro_video ?? ''
                ])
                @error('intro_video')
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
                    <option @if(isset($class->status) && $class->status == 1) selected @endif value="1">Chưa mở</option>
                    <option @if(isset($class->status) && $class->status == 2) selected @endif value="2">Đang tuyển học viên</option>
                    <option @if(isset($class->status) && $class->status == 3) selected @endif value="3">Đang học</option>
                    <option @if(isset($class->status) && $class->status == 4) selected @endif value="4">Đã kết thúc</option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-form-label mr-2 d-block" name="is_featured" for="">lớp học nổi bật</label>
                <input class="" 
                name="is_featured" 
                type="checkbox" 
                @isset($class->is_featured)
                    @if ($class->is_featured == 1 )
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
                        if(isset($class->categories)){
                            $category_list = $class->categories->pluck('id')->toArray();
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
            <h3 class="card-title">Giảng viên</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <select name="teachers[]" multiple="multiple" class="form-control select2 select2-info"
                    data-dropdown-css-class="select2-info" style="width: 100%;">
                    @php
                        if(isset($class->teachers)){
                            $teacher_list = $class->teachers->pluck('id')->toArray();
                        }else{
                            $teacher_list = [];
                        }
                    @endphp
                    @foreach ($teachers as $item)
                    <option 
                    value="{{$item->id}}"
                    @if (in_array($item->id, $teacher_list))
                        selected
                    @endif
                    >
                        {{$item->fullname}}
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
                'current_input' => $class->avatar ?? old('avatar')
                ])
            </div>
        </div>
    </div>

    @isset($class)
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
                    $link = \str_replace(url('/'), '', route('customer.class.show', $class->slug));
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
        $('#class_name').on('blur', function () {
        getSlug('online_class', $(this).val(), $('#slug'));
        });
    </script>
@endsection
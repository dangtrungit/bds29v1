<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header d-flex  align-items-center">
        <h5 class="d-block">Thông tin cơ bản</h5>
        <button type="button" class="btnSave ml-auto btn btn-info float-right p-1">Lưu thông tin</button>
    </div>
    <div class="card-body">
        <div class="form-group ">
            <label class="control-label">Tem ảnh</label>
            @include('admin.components.button_file_manager', ['id' => 'watermark_logo',
                'input_name' => 'watermark_logo',
                'current_input' => $theme_options['watermark_logo'] ?? ''
            ])
        </div>

        <div class="form-group ">
            <label for="watermark_size" class="control-label">Kích thước watermark</label><small
                class="float-md-right charcounter">Đơn vị % chiều rộng mặc định 20%</small>
            <input
            class="form-field form-control"
            placeholder="Nhập kích thước"
            data-counter="255"
            name="watermark_size"
            value="{{$theme_options['watermark_size'] ?? ''}}"
            type="number"
            id="watermark_size"
            >
        </div>

        <div class="form-group ">
            <label for="watermark_opacity" class="control-label">Độ mờ</label><small
                class="float-md-right charcounter">Mặc định 70%</small>
            <input
            class="form-field form-control"
            placeholder="Site title"
            data-counter="255"
            name="watermark_opacity"
            value="{{$theme_options['watermark_opacity'] ?? ''}}"
            type="number"
            id="watermark_opacity"
            >
        </div>

        <div class="form-group ">
            <label for="watermark_opacity" class="control-label" value="top-right">Vị trí watermark</label><small
                class="float-md-right charcounter">Mặc định center</small>
            @php
                $list_positions = [
                    'center' => 'center',
                    'top-right' => 'top-right',
                    'top-left' => 'top-left',
                    'bottom-right' => 'bottom-right',
                    'bottom-left' => 'bottom-left'
                ]
            @endphp
            <select name="watermark_position" class="form-control form-field" id="">
                @foreach ($list_positions as $index => $name)
                <option
                @isset ($theme_options['watermark_position'])
                    @if ($theme_options['watermark_position'] == $index)
                    selected
                    @endif
                @endisset value="{{$index}}">{{$name}}</option>
                @endforeach
            </select>
        </div>

        </div>
    <!-- /.card -->
  </div>

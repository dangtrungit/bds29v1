<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header d-flex  align-items-center">
        <h5 class="d-block">Logo</h5>
        <button type="button" class="btnSave ml-auto btn btn-info float-right p-1">Lưu thông tin</button>
    </div>
    <div class="card-body">
        <div class="form-group ">
            <label class="control-label">Favicon</label>
            @include('admin.components.button_file_manager', ['id' => 'favicon',
                'input_name' => 'favicon',
                'current_input' => $theme_options['favicon'] ?? ''
            ])
        </div>

        <div class="form-group ">
            <label class="control-label">Logo công ty</label>
            @include('admin.components.button_file_manager', ['id' => 'logo',
                'input_name' => 'logo',
                'current_input' => $theme_options['logo'] ?? ''
            ])
        </div>
    </div>
</div>

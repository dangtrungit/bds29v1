<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header d-flex  align-items-center">
        <h5 class="d-block">Liên hệ</h5>
        <button type="button" class="btnSave ml-auto btn btn-info float-right p-1">Lưu thông tin</button>
    </div>
    <div class="card-body">
        <div class="form-group ">
            <label class="control-label">Chi tiết trang liên hệ</label>
            @include('admin.components.ckeditor', ['id' => 'contact_page',
            'name' => 'contact_page',
            'current_input' => $theme_options['contact_page'] ?? ''
            ])
        </div>
    </div>
    <!-- /.card -->
</div>

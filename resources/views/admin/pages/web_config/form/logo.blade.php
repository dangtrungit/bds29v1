<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header d-flex  align-items-center">
        <h5 class="d-block">API Key</h5>
        <button type="button" class="btnSave ml-auto btn btn-info float-right p-1">Lưu thông tin</button>
    </div>
    <div class="card-body">
        <div class="form-group ">
            <label for="google_map_frontend" class="control-label">Google Map FrontEnd</label>
            <input
            class="form-field form-control"
            placeholder="Google Map FrontEnd"
            data-counter="255"
            name="google_map_frontend"
            type="text"
            value="{{$web_config['google_map_frontend'] ?? ''}}"
            id="google_map_frontend">
        </div>

        <div class="form-group ">
            <label for="google_map_backend" class="control-label">Google Map Backend</label>
            <input
            class="form-field form-control"
            placeholder="Google Map Backend"
            data-counter="255"
            name="google_map_backend"
            type="text"
            value="{{$web_config['google_map_backend'] ?? ''}}"
            id="google_map_backend">
        </div>

        <hr class="my-5">



        <div class="form-group ">
            <label for="google_recapcha_client" class="control-label">Google reCAPCHA Client</label>
            <input
            class="form-field form-control"
            placeholder="Google reCAPCHA Client"
            data-counter="255"
            name="google_recapcha_client"
            type="text"
            value="{{$web_config['google_recapcha_client'] ?? ''}}"
            id="google_recapcha_client">
        </div>

        <div class="form-group ">
            <label for="google_recapcha_secret_key" class="control-label">Google reCAPCHA secret key</label>
            <input
            class="form-field form-control"
            placeholder="Google reCAPCHA secret key"
            data-counter="255"
            name="google_recapcha_secret_key"
            type="text"
            value="{{$web_config['google_recapcha_secret_key'] ?? ''}}"
            id="google_recapcha_secret_key">
        </div>

        <small>Chỉ hỗ trợ google reCAPCHA v3</small>
    <!-- /.card -->
    </div>
</div>

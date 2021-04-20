<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header d-flex  align-items-center">
        <h5 class="d-block">Mạng xã hội</h5>
        <button type="button" class="btnSave ml-auto btn btn-info float-right p-1">Lưu thông tin</button>
    </div>
    <div class="card-body">
            <div class="form-group ">
              <label for="Tên công ty" class="control-label">Facebook</label><small
                  class="float-md-right charcounter">Tối đa 256 ký tự</small>
              <input
              class="form-field form-control"
              placeholder="Nhập địa chỉ facebook"
              data-counter="255"
                name="facebook"
              value="{{$theme_options['facebook'] ?? ''}}"
              type="text"
              value=""
              id="facebook"
              >
            </div>

            <div class="form-group ">
              <label for="Tên công ty" class="control-label">Twitter</label>
              <input
              class="form-field form-control"
              placeholder="Nhập địa chỉ twitter"
              data-counter="255"
              name="twitter"
              type="text"
              value="{{$theme_options['twitter'] ?? ''}}"
              id="twitter">
            </div>

            <div class="form-group ">
              <label for="Web site" class="control-label">Youtube</label>
              <input
              class="form-field form-control"
              placeholder="Nhập link youtube"
              data-counter="255"
              name="youtube"
              type="text"
              value="{{$theme_options['youtube'] ?? ''}}"
              id="youtube"
              >
			</div>

			<div class="form-group ">
				<label for="Web site" class="control-label">Instagram</label>
				<input
				class="form-field form-control"
				placeholder="Nhập link instagram"
				data-counter="255"
				name="instagram"
				type="text"
				value="{{$theme_options['instagram'] ?? ''}}"
				id="instagram"
				>
			</div>
        </div>
    <!-- /.card -->
</div>

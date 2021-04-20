<div class="card card-primary card-outline card-outline-tabs">
  <div class="card-header d-flex  align-items-center">
      <h5 class="d-block">Thông tin cơ bản</h5>
      <button type="button" class="btnSave ml-auto btn btn-info float-right p-1">Lưu thông tin</button>
  </div>
  <div class="card-body">
      	<div class="form-group ">
			<label for="Tên công ty" class="control-label">Tên công ty</label><small
				class="float-md-right charcounter">Tối đa 256 ký tự</small>
			<input
			class="form-field form-control"
			placeholder="Site title"
			data-counter="255"
          	name="Tên công ty"
			value="{{$theme_options['Tên_công_ty'] ?? ''}}"
			type="text"
			value="Botble Technologies"
			id="Tên công ty"
			>
      	</div>

      	<div class="form-group ">
			<label for="Tên công ty" class="control-label">Trụ sở</label>
			<input
			class="form-field form-control"
			placeholder="Site title"
			data-counter="255"
			name="Trụ sở"
			type="text"
			value="{{$theme_options['Trụ_sở'] ?? ''}}"
			id="Tên công ty">
      	</div>
      	<div class="form-group ">
			<label for="Web site" class="control-label">Website</label>
			<input
			class="form-field form-control"
			placeholder="Site title"
			data-counter="255"
			name="Website"
			type="text"
			value="{{$theme_options['Website'] ?? ''}}"
			id="Website"
			>
		</div>

		<div class="form-group ">
			<label for="Web site" class="control-label">Email công ty</label>
			<input
			class="form-field form-control"
			placeholder="Site title"
			data-counter="255"
			name="Email_công_ty"
			type="text"
			value="{{$theme_options['Email_công_ty'] ?? ''}}"
			id="Email_công_ty">
		</div>

		<div class="form-group ">
			<label for="Web site" class="control-label">Số điện thoại</label>
			<input
			class="form-field form-control"
			placeholder="Site title"
			data-counter="255"
			name="Số_điện_thoại"
			type="text"
			value="{{$theme_options['Số_điện_thoại'] ?? ''}}"
			id="Số_điện_thoại">
		</div>

      	<div class="form-group ">
			<label for="Web site" class="control-label">Copyright</label><small class="float-md-right charcounter">Tối
				đa 256 ký tự</small>
			<input
			class="form-field form-control"
			placeholder="Site title"
			data-counter="255"
			name="Copyright"
			type="text"
			value="{{$theme_options['Copyright'] ?? ''}}"
			id="Website">
	 	 </div>

		<div class="form-group ">
			<label class="control-label">Banner</label>
			@include('admin.components.button_file_manager', ['id' => 'banner',
				'input_name' => 'Banner',
				'current_input' => $theme_options['Banner'] ?? ''
			])
		</div>

		<div class="form-group ">
			<label class="control-label">Banner Mobile</label>
			@include('admin.components.button_file_manager', ['id' => 'banner_mobile',
				'input_name' => 'Banner_mobile',
				'current_input' => $theme_options['Banner_mobile'] ?? ''
			])
		</div>

		<div class="form-group ">
			<label class="control-label">Ảnh công ty</label>
			@include('admin.components.button_file_manager', ['id' => 'company_image',
				'input_name' => 'Ảnh công ty',
				'current_input' => $theme_options['Ảnh_công_ty'] ?? ''
			])
		</div>

		<div class="form-group ">
			<label class="control-label">Header</label>
			@include('admin.components.ckeditor', ['id' => 'header',
				'name' => 'Header',
				'current_input' => $theme_options['Header'] ?? ''
			])
        </div>

        <div class="form-group ">
			<label class="control-label">Iframe Google map</label>
			@include('admin.components.ckeditor', ['id' => 'footer_map_iframe',
				'name' => 'footer_map_iframe',
				'current_input' => $theme_options['footer_map_iframe'] ?? ''
			])
        </div>
        <div class="form-group ">
			<label class="control-label">Iframe facebook</label>
			@include('admin.components.ckeditor', ['id' => 'footer_fb_iframe',
				'name' => 'footer_fb_iframe',
				'current_input' => $theme_options['footer_fb_iframe'] ?? ''
			])
		</div>
  	</div>
  <!-- /.card -->
</div>

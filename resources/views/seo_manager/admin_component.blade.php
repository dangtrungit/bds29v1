<!-- Large modal -->
<button type="button" id="btn-seo-manager" class="btn btn-primary" data-toggle="modal" data-target=".seo-manager-modal">SEO Manager</button>
@section('script')
@parent
<form id="seo_form" action="{{route('admin.seo.store')}}">
	<input type="hidden" name="link" value="{{$link}}" >
	<div class="modal fade seo-manager-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title">Quản lý SEO</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">×</span>
				</button>
			  </div>
			  <div class="modal-body p-0">
				<div class="card card-primary m-0 card-outline card-outline-tabs">
					<div class="card-header p-0 border-bottom-0">
					  <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
						<li class="nav-item">
						  <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="false">Meta</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="true">OpenGraph</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">TwitterCard</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">JsonLd</a>
						</li>
					  </ul>
					</div>
					<div class="card-body">
					  <div class="tab-content" id="custom-tabs-four-tabContent">
						<div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
							<div class="form-group">
								<label for="seo_title">Title</label>
								<input 
								name="title" 
								type="text" 
								class="form-control" 
								id="seo_title" 
								placeholder="Nhập tiêu đề META"
								value=""
								>
							</div>
	  
							<div class="form-group">
								<label>Description</label>
								<textarea name="description" class="form-control " rows="3"
									placeholder="Nhập mô tả ..."></textarea>
							</div>
	  
							<div class="form-group">
								<label for="seo_canonical">Canonical</label>
								<input 
								name="canonical" 
								type="text" 
								class="form-control" 
								id="seo_canonical" 
								placeholder="Nhập mô tả"
								value=""
								>
							</div>
	  
							<div class="form-group">
								<label for="seo_url">URL</label>
								<input 
								name="url" 
								type="text" 
								class="form-control" 
								id="seo_url" 
								placeholder="Nhập URL"
								value=""
								>
							</div>
	  
							<div class="form-group">
								<label for="seo_keyword">Keywords</label>
								<textarea name="keywords" class="form-control " rows="3"
									placeholder="Nhập keyword ..."></textarea>
							</div>
						</div>
						<div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
							<div class="form-group">
								<label for="seo_og_title">Title</label>
								<input 
								name="og_title" 
								type="text" 
								class="form-control" 
								id="seo_og_title" 
								placeholder="Nhập tiêu đề OpenGraph"
								value=""
								>
							</div>
	  
							<div class="form-group">
								<label>Description</label>
								<textarea name="og_description" class="form-control " rows="3"
									placeholder="Nhập mô tả ..."></textarea>
							</div>
	  
							<div class="form-group">
								<label>Type</label>
								<textarea name="og_type" class="form-control " rows="3"
									placeholder="Nhập type"></textarea>
							</div>
	  
							<div class="form-group">
								<label for="seo_og_image">OG image</label>
								<input 
								name="og_image" 
								type="text" 
								class="form-control" 
								id="seo_og_image" 
								placeholder="Nhập OG Image"
								value=""
								>
							</div>
	  
							<div class="form-group">
								<label for="seo_og_site_name">OG site name</label>
								<input 
								name="og_site_name" 
								type="text" 
								class="form-control" 
								id="seo_og_site_name" 
								placeholder="Nhập OG Sitename"
								value=""
								>
							</div>
	  
							<div class="form-group">
								<label for="seo_og_url">OG URL</label>
								<input 
								name="og_url" 
								type="text" 
								class="form-control" 
								id="seo_og_url" 
								placeholder="Nhập OG URL"
								value=""
								>
							</div>
						</div>

						<div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
							
							<div class="form-group">
								<label for="seo_tw_card">Twitter card</label>
								<input 
								name="tw_card" 
								type="text" 
								class="form-control" 
								id="seo_tw_card" 
								placeholder="Nhập TwitterCard"
								value=""
								>
							</div>

							<div class="form-group">
								<label for="seo_tw_title">Title</label>
								<input 
								name="tw_title" 
								type="text" 
								class="form-control" 
								id="seo_tw_title" 
								placeholder="Nhập tiêu đề"
								value=""
								>
							</div>
	  
							<div class="form-group">
								<label>Description</label>
								<textarea name="tw_description" class="form-control " rows="3"
									placeholder="Nhập mô tả ..."></textarea>
							</div>
	  
							<div class="form-group">
								<label for="seo_tw_image">TW image</label>
								<input 
								name="tw_image" 
								type="text" 
								class="form-control" 
								id="seo_tw_image" 
								placeholder="Nhập TW Image"
								value=""
								>
							</div>
	  
							<div class="form-group">
								<label for="seo_tw_site_name">TW site name</label>
								<input 
								name="tw_site_name" 
								type="text" 
								class="form-control" 
								id="seo_tw_site_name" 
								placeholder="Nhập OG Sitename"
								value=""
								>
							</div>
	  
							<div class="form-group">
								<label for="seo_tw_url">TW URL</label>
								<input 
								name="tw_url" 
								type="text" 
								class="form-control" 
								id="seo_tw_url" 
								placeholder="Nhập TW URL"
								value=""
								>
							</div>
						</div>
						<div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
							<div class="form-group">
								<label>Nhập văn bản JSON</label>
								<textarea name="ld_json" class="form-control " rows="3"
									placeholder="Nhập JSON ..."></textarea>
							</div>
						</div>
					  </div>
					</div>
					<!-- /.card -->
				  </div>
			  </div>
			  <div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				<button type="button" id="save_seo_btn" class="btn btn-primary">Lưu thay đổi</button>
			  </div>
			</div>
			<!-- /.modal-content -->
		  </div>
	  </div>
</form>
<script>
	function storeSeoAjax(data){
		$.ajax({
			url: "{{route('admin.seo.store')}}",
			data: data,
			type:'post',
			success: function(data){
				if(data.msg){
					swalToast(data.msg);
				}
				if(data.error){
					swalToast(data.error);
				}
			},
			error: function(){
				swalToast('Lỗi phát sinh trong quá trình lưu', 'error');
			}
		});
	}

	function getSeoDetails(link){
		$.ajax({
			url: "{{route('admin.seo.get_detail')}}",
			data: {
				link: link
			},
			type:'get',
			success: function(data){
				$(`[name="title"]`).val(data.title);
				$(`[name="description"]`).val(data.description);
				$(`[name="keywords"]`).val(data.keywords);
				$(`[name="ld_json"]`).val(data.ld_json);
				$(`[name="og_description"]`).val(data.og_description);
				$(`[name="og_image"]`).val(data.og_image);
				$(`[name="og_type"]`).val(data.og_type);
				$(`[name="og_site_name"]`).val(data.og_site_name);
				$(`[name="og_title"]`).val(data.og_title);
				$(`[name="og_url"]`).val(data.og_url);
				$(`[name="tw_description"]`).val(data.tw_description);
				$(`[name="tw_image"]`).val(data.tw_image);
				$(`[name="tw_site_name"]`).val(data.tw_site_name);
				$(`[name="tw_title"]`).val(data.tw_title);
				$(`[name="tw_card"]`).val(data.tw_card);
				$(`[name="tw_url"]`).val(data.tw_url);
				$(`[name="canonical"]`).val(data.canonical);
				$(`[name="url"]`).val(data.url);
			},
			error: function(){
				swalToast('Không tìm thấy cấu hình SEO', 'error');
			}
		});
	}
	
	$('#btn-seo-manager').on('click', function(){
		getSeoDetails("{{$link}}");
	})

	$('#save_seo_btn').on('click', function(e){
		e.preventDefault();
		var data = $('#seo_form').serializeArray();
		let input = {};
		data.forEach(element => {
			input[element.name] = element.value
		});
		storeSeoAjax(input);
	})
</script>
@endsection


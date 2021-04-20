@extends('admin.main_layout')
@section('title')
    Danh sách tỉnh thành
@endsection
@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
@include('admin.partials.content_header', ['title' => 'Quản lý tỉnh thành'])
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách tỉnh thành</h3>
              <a href="{{route('admin.district.create')}}" class="btn btn-info p-1 float-right">Thêm mới</a>
            </div>
            <div class="card-body">
              <table id="districts-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>Mã huyện</th>
                        <th>Tên</th>
                        <th>Số xã</th>
                        <th>Trực thuộc</th>
                        <th>Thao tác</th>
                    </tr>
                  </thead>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <img src="" alt="">
</section>
@endsection

    @section('script')
    <script src="{{asset('template/AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('template/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('template/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
        $(function () {
            $("#districts-table").dataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                autoWidth:false,
                ajax: "/admin/district/list",
                columns: [
                    { "data": "code","name": 'code', 'width': '10px'},
                    { "data": "name" , 'name': 'name'},
                    { "data": "communes_count", "searchable": false , "orderable": false},
                    { "data": "province", 'name': 'province.name' },
                    { "data": "action", 'width': '90px'},
                ],
            })
        });

         function destroyDistrict(url){
            $.ajax({
                url: url,
                type: 'post',
                success: function(data){
                    if(data.msg){
                        swalToast(data.msg);
                    };
                    if(data.error){
                        swalToast(data.error, 'error');
                    }
                },
                error: function(){
                    swalToast('Lỗi không xác định trong quá trình xóa!', 'error');
                }
            })
        }

        $(document).on('click', '.district-destroy', function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            swalConfirm('Xóa huyện này!').then((result) => {
                if (result.value) {
                    destroyProvince(url);
					setTimeout(() => {
						$('#districts-table').DataTable().ajax.reload();
					}, 1000);
                }
            });
        })
    </script>
@endsection

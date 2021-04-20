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
              <a href="{{route('admin.province.create')}}" class="btn btn-info p-1 float-right">Thêm mới</a>
            </div>
            <div class="card-body">
              <table id="provinces-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>Mã tỉnh</th>
                        <th>Tên</th>
                        <th>Số huyện</th>
                        <th>Tên đầy đủ</th>
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
            $("#provinces-table").dataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                autoWidth:false,
                ajax: "/admin/province/list",
                columns: [
                    { "data": "code","name": 'code', 'width': '10px'},
                    { "data": "name" , 'name': 'type'},
                    { "data": "districts_count", "searchable": false , "orderable": false},
                    { "data": "name_with_type", 'name': 'name_with_type' },
                    { "data": "action", 'width': '90px'},
                ],
            })
        });

         function destroyProvince(url){
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

        $(document).on('click', '.province-destroy', function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            swalConfirm('Xóa tỉnh này!').then((result) => {
                if (result.value) {
                    destroyProvince(url);
					setTimeout(() => {
						$('#provinces-table').DataTable().ajax.reload();
					}, 1000);
                }
            });
        })
    </script>
@endsection

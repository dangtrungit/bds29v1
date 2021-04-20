@extends('admin.main_layout')
@section('title')
    Danh sách xã phường
@endsection
@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
@include('admin.partials.content_header', ['title' => 'Quản lý xã phường'])
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách xã phường</h3>
              <a href="{{route('admin.commune.create')}}" class="btn btn-info p-1 float-right">Thêm mới</a>
            </div>
            <div class="card-body">
              <table id="communes-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>Mã xã</th>
                        <th>Tên</th>
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
            $("#communes-table").dataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                autoWidth:false,
                ajax: "/admin/commune/list",
                columns: [
                    { "data": "code","name": 'code', 'width': '10px'},
                    { "data": "name_with_type" , 'name': 'name_with_type'},
                    { "data": "district", 'name': 'district.path_with_type' },
                    { "data": "action", 'width': '90px'},
                ],
            })
        });

         function destroyCommune(url){
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

        $(document).on('click', '.commune-destroy', function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            swalConfirm('Xóa xã này!').then((result) => {
                if (result.value) {
                    destroyCommune(url);
					setTimeout(() => {
						$('#communes-table').DataTable().ajax.reload();
					}, 1000);
                }
            });
        })
    </script>
@endsection

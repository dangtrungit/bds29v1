@extends('admin.main_layout')
@section('title')
    Danh sách lớp học
@endsection
@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
@include('admin.partials.content_header', ['title' => 'Quản lý đơn hàng'])
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách đơn hàng</h3>
              {{-- <a href="{{route('admin.class.create')}}" class="btn btn-info p-1 float-right">Thêm mới</a> --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="order-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Ngày đặt hàng</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                  </thead>
                  
                </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
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
            $("#order-table").dataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                autoWidth:false,
                ajax: "{{route('admin.order.list')}}",
                columns: [
                    { "data": "DT_RowIndex","name": 'DT_Row_Index' , "orderable": false, "searchable": false, 'width': '10px'},
                    { "data": "order_code", 'width': '150px'},
                    { "data": "fullname", 'width': '150px' },
                    { "data": "address"},
                    { "data": "email",   'width': '150px'},
                    { "data": "phone_number", 'width': '120' },
                    { "data": "created_at", 'width': '120px' },
                    { "data": "status","searchable": false, 'width': '90px' },
                    { "data": "action", 'width': '80px' },
                ],
            })
        });

        function destroyOrder(url){
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

        $(document).on('click', '.order-destroy', function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            swalConfirm('Xóa đơn hàng này!').then((result) => {
                if (result.value) {
                    destroyOrder(url);
                    $('#order-table').DataTable().ajax.reload();
                }
            });
        })
    </script>
@endsection
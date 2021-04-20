@extends('admin.main_layout')
@section('title')
    Yêu cầu hỗ trợ
@endsection
@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
@include('admin.partials.content_header', ['title' => 'Quản lý các yêu cầu'])
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách yêu cầu</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="online-class-request-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Nội dung</th>
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
            $("#online-class-request-table").dataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                autoWidth:false,
                ajax: "{{route('admin.contacts.list')}}",
                columns: [
                    { "data": "DT_RowIndex","name": 'DT_Row_Index' , "orderable": false, "searchable": false, 'width': '10px'},
                    { "data": "fullname"},
                    { "data": "email"},
                    { "data": "phone_number"},
                    { "data": "messages"},
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

        $(document).on('click', '.class-request-delete', function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            swalConfirm('Xóa yêu cầu này!').then((result) => {
                if (result.value) {
                    destroyOrder(url);
                    $('#online-class-request-table').DataTable().ajax.reload();
                }
            });
        })
    </script>

@endsection

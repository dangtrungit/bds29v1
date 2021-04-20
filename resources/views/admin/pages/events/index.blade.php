@extends('admin.main_layout')
@section('title')
    Quản lý sự kiện
@endsection
@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
@include('admin.partials.content_header', ['title' => 'Quản lý sự kiện'])
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách sự kiện</h3>
              <a href="{{route('admin.event.create')}}" class="btn btn-info p-1 float-right">Thêm mới</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="event-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Ảnh đại diện</th>
                        <th>Ngày diễn ra</th>
                        <th>Địa điểm</th>
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
</section>
@endsection
@section('script')
    <script src="{{asset('template/AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('template/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('template/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

    <script>
        $(function () {
            $("#event-table").dataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                autoWidth:false,
                ajax: "{{route('admin.event.list')}}",
                columns: [
                    { "data": "DT_RowIndex","name": 'DT_Row_Index' , "orderable": false, "searchable": false, 'width': '10px'},
                    { "data": "name",  },
                    { "data": "avatar", 'width': '80px' },
                    { "data": "start_at",  'width': '150px'},
                    { "data": "place"},
                    { "data": "action", 'width': '80px' },
                ],
            })
		});
		function destroyEvent(url){
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

        $(document).on('click', '.event-delete', function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            swalConfirm('Xóa sự kiện này!').then((result) => {
                if (result.value) {
                    destroyEvent(url);
                    $('#event-table').DataTable().ajax.reload();
                }
            });
        })
    </script>
@endsection
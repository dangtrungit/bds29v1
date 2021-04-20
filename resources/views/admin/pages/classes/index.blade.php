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
@include('admin.partials.content_header', ['title' => 'Quản lý lớp học'])
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách lớp học</h3>
              <a href="{{route('admin.class.create')}}" class="btn btn-info p-1 float-right">Thêm mới</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="courses-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Ảnh</th>
                        <th>Danh mục</th>
                        <th>Người tạo</th>
                        <th>Ngày tạo</th>
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
            $("#courses-table").dataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                autoWidth:false,
                ajax: "{{route('admin.class.list')}}",
                columns: [
                    { "data": "DT_RowIndex","name": 'DT_Row_Index' , "orderable": false, "searchable": false, 'width': '10px'},
                    { "data": "name",  },
                    { "data": "avatar", 'width': '80px' },
                    { "data": "categories", "orderable": false, "searchable": false,  'width': '150px'},
                    { "data": "created_by", 'name': 'author.username', 'width': '120' },
                    { "data": "created_at", 'width': '120px' },
                    { "data": "status","searchable": false, 'width': '90px' },
                    { "data": "action", 'width': '80px' },
                ],
            })
        });

         function destroyClass(url){
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

        $(document).on('click', '.class-destroy', function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            swalConfirm('Xóa lớp học này!').then((result) => {
                if (result.value) {
                    destroyClass(url);
					setTimeout(() => {
						$('#courses-table').DataTable().ajax.reload();
					}, 1000);
                }
            });
        })
    </script>
@endsection
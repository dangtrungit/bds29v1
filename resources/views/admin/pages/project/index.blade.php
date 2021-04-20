@extends('admin.main_layout')
@section('title')
    Danh sách dự án
@endsection


@section('content')
@include('admin.partials.content_header', ['title' => 'Quản lý dự án'])
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách dự án</h3>
              <a href="{{route('admin.project.create')}}" class="btn btn-info p-1 float-right">Thêm mới</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="project-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ảnh</th>
                        <th>Tên dự án</th>
                        <th>Loại dự án</th>
                        <th>Chủ dự án</th>
                        <th>Địa chỉ</th>
                        <th>Thao tác</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th><input class="w-100 form-control" type="text" placeholder="Search" /></th>
                        <th>
                            <select class="form-control">
                                @foreach (config('constant.project_type') as $index => $item)
                                    <option value="{{$index}}">{{$item['name'] ?? ''}}</option>
                                @endforeach
                            </select>
                        </th>
                        <th><input class="w-100 form-control" type="text" placeholder="Search" /></th>
                        <th><input class="w-100 form-control" type="text" placeholder="Search" /></th>
                        <th></th>
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
@include('admin.components.datatable_resource')
@section('script')
    <script>
        $(document).ready(function(){
            // Setup - add a text input to each footer cell
            $('#project-table thead tr:eq(1) th').each( function (i) {
                var title = $(this).text();
                $( 'input, select', this ).on('keyup change', function () {
                    clearTimeout(drawTable);
                    var drawTable = setTimeout(() => {
                        if ( table.column(i).search() !== this.value ) {
                            table
                                .column(i)
                                .search( this.value )
                                .draw();
                        }
                    }, 1000);

                });
            });

            var table = $("#project-table").DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                autoWidth:false,
                ajax: "{{route('admin.project.list')}}",
                orderCellsTop: true,
                order: [[0, "desc"]],
                columns: [
                    { "data": "id","name": 'id', 'width': '10px'},
                    { "data": "thumb",  'width':'40px' },
                    { "data": "name", 'name' : 'name', 'width': '150px'},
                    { "data": "project_type", 'name' : 'project_type', 'width': '150px'},
                    { "data": "investor", 'name' : 'investor', 'width': '150px'},
                    { "data": "full_address", 'name': 'full_address' },
                    { "data": "action", 'width': '90px',  },
                ],
            })

        })

        function destroyProject(url){
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

        $(document).on('click', '.project-destroy', function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            swalConfirm('Xóa dự án này!').then((result) => {
                if (result.value) {
                    destroyProject(url);
					setTimeout(() => {
						$('#project-table').DataTable().ajax.reload();
					}, 1000);
                }
            });
        })
    </script>
@endsection

@extends('admin.main_layout')
@section('title')
    Bài viết
@endsection

@section('content')
@include('admin.partials.content_header', ['title' => 'Quản lý bài giảng'])
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách bài viết</h3>
              <a href="{{route('admin.post.create')}}" class="btn btn-info p-1 float-right">Thêm mới</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="post-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Ảnh đại diện</th>
                        <th>Danh mục</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th><input class="w-100 form-control" type="text" placeholder="Search" /></th>
                        <th></th>
                        <th></th>
                        <th>
                            <input
                            id="date-picker"
                            class="date-range-picker form-control"
                            type="text"
                            autocomplete="off"
                            value=""
                            >
                        </th>
                        <th>
                            <select class="form-control">
                                <option value="">Tất cả</option>
                                <option value="1">Đang hoạt động</option>
                                <option value="2">Dừng hoạt động</option>
                            </select>
                        </th>
                        <th></th>
                    </tr>
                  </thead>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

@include('admin.components.datatable_resource')
@endsection
    @section('script')
    <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#post-table thead tr:eq(1) th').each( function (i) {
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

            var table = $("#post-table").DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                autoWidth:false,
                ajax: "{{route('admin.post.list')}}",
                orderCellsTop: true,
                order: [[0, "desc"]],
                columns: [
                    { "data": "id","name": 'posts.id', 'width': '10px'},
                    { "data": "name",  },
                    { "data": "avatar", 'width': '80px' },
                    { "data": "category", 'name': 'categories.name' ,  'width': '150px', 'orderable': false},
                    { "data": "created_at", 'name': 'posts.created_at' ,'width': '120px' },
                    { "data": "status", 'width': '90px' },
                    { "data": "action", 'width': '80px' },
                ],
            })
        });
    </script>
@endsection

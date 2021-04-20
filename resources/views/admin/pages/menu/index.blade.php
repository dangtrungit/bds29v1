@extends('admin.main_layout')
@section('title')
    Trang chủ
@endsection
@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')

@include('admin.partials.content_header', ['title' => 'Quản lý menu'])
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách menu</h3>
              <a href="{{route('admin.menu_category.create')}}" class="btn btn-info p-1 float-right">Thêm mới</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="menu-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $index => $category)
                     <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>
                          @if ($category->status == 1)
                          Đang hoạt động
                          @else    
                          Dừng hoạt động
                          @endif
                        </td>
                        <td>
                          <a class="btn btn-success" href="{{route('admin.menu_category.edit', $category->id)}}"><i class="fas fa-edit"></i></a>
                          <a class="btn btn-danger" href="{{route('admin.menu_category.destroy', $category->id)}}"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>    
                    @endforeach
                     
                  </tbody>
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
            $("#menu-table").dataTable({
                autoWidth:false,
            })
        });
    </script>
@endsection
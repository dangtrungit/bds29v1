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
@include('admin.partials.content_header', ['title' => 'Quản lý danh mục bài viết'])
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách</h3>
              <a href="{{route('admin.post_category.create')}}" class="btn btn-info p-1 float-right">Thêm mới</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="courses-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Danh mục cha</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($post_categories as $index => $category)
                    <tr>
                      <td>{{$index+1}}</td>
                      <td><a href="{{route('customer.post.show_by_category', $category->slug)}}">{{$category->name}}</a> </td>
                      <td>
                        <span class="right badge badge-primary">{{$category->parent->name ?? ''}}</span>
                      </td>
                      <td>{{Carbon\Carbon::parse($category->created_at)->format('H:i d/m/Y')}}</td>
                      <td>
                      @switch($category->status)
                          @case(1)
                            <span class="right badge badge-primary">Đang hoạt động</span>
                            @break
                          @case(2)
                            <span class="right badge badge-danger">Dừng hoạt động</span>
                            @break
                          @default
                          <span class="right badge badge-danger">Dừng hoạt động</span>
                      @endswitch</td>
                      <td>
                        <a data-toggle-for="tooltip" title="Sửa thông tin" href="{{route('admin.post_category.edit', $category->id)}}"class="btn text-info category-edit"><i class="fas fa-edit" data-toggle="modal" data-target="#customer-model"></i></a>
                        <a data-toggle-for="tooltip" title="Xóa" href="{{route('admin.post_category.destroy', $category->id)}}"class="btn text-danger category-destroy"><i class="fas fa-trash" data-toggle="modal" data-target="#customer-model"></i></a>
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
              scrollX: true,
              autoWidth:false,
          });
      });
      $(document).on('click', '.category-destroy', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            Swal.fire({
                title: 'Xóa danh mục này?',
                text: "Bạn không thể hoàn tác!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Vẫn xóa!',
            })
            .then((result) => {
                if (result.value) {
                   window.location = url;
                }
            });
        })

    </script>
@endsection

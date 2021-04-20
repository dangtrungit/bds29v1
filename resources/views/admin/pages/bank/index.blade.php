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
@include('admin.partials.content_header', ['title' => 'Quản lý loại tin đăng'])
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách</h3>
              <a href="{{route('admin.bank.create')}}" class="btn btn-info p-1 float-right">Thêm mới</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="bank-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Mã ngân hàng</th>
                        <th>Ảnh</th>
                        <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($banks as $index => $bank)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$bank->name}}</td>
                        <td>{{$bank->code}}</td>
                        <td><img src="{{$bank->avatar}}" width="60px" alt=""></td>
                        <td>
                            <a data-toggle-for="tooltip" title="Sửa thông tin" href="{{route('admin.bank.edit', $bank->id)}}"class="btn text-info bank-edit"><i class="fas fa-edit"></i></a>
                            <a data-toggle-for="tooltip" title="Xóa" href="{{route('admin.bank.destroy', $bank->id)}}"class="btn text-danger bank-destroy"><i class="fas fa-trash"></i></a>
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
          $("#bank-table").dataTable({
              processing: true,
              scrollX: true,
              autoWidth:false,
          });
      });
      $(document).on('click', '.bank-destroy', function (e) {
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

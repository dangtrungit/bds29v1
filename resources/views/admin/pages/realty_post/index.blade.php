@extends('admin.main_layout')
@section('title')
    Danh sách bài đăng khách hàng
@endsection

@section('content')
@include('admin.partials.content_header', ['title' => 'Quản lý bài đăng khách hàng'])
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách bài đăng khách hàng</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="realty-post-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ảnh</th>
                        <th>Tiêu đề</th>
                        <th>Loại giao dịch</th>
                        <th>Địa chỉ</th>
                        <th>Ngày gửi</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th><input class="w-100 form-control" type="text" placeholder="Search" /></th>
                        <th>
                            <select class="form-control" name="" id="">
                                <option value="">Tất cả</option>
                                @foreach (config('constant.realty_post_type') as $index => $item)
                                    <option value="{{$index}}">{{$item['name']}}</option>
                                @endforeach
                            </select>
                        </th>
                        <th><input class="w-100 form-control" type="text" placeholder="Search" /></th>
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
                            <select class="form-control" name="" id="">
                                <option value="">Tất cả</option>
                                @foreach (config('constant.realty_post_status') as $index => $item)
                                    <option value="{{$index}}">{{$item}}</option>
                                @endforeach
                            </select>
                        </th>
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
    <img src="" alt="">
</section>
@include('admin.components.datatable_resource')

@endsection
    @section('script')
    <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#realty-post-table thead tr:eq(1) th').each( function (i) {
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

            var table = $("#realty-post-table").DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                autoWidth:false,
                orderCellsTop: true,
                ajax: "{{route('admin.realty_post.list')}}",
                order: [[0, "desc"]],
                columns: [
                    { "data": "id","name": 'realty_posts.id' , 'width': '10px'},
                    { "data": "thumb",  'width':'40px' },
                    { "data": "title", 'name': 'title'  },
                    { "data": "type", 'name' : 'type', 'width': '150px'},
                    { "data": "realty.full_address", 'name': 'realty.full_address',  },
                    { "data": "created_at", 'name': 'realty_posts.created_at' ,'width': '120px' },
                    { "data": "status", 'width': '90px' },
                    { "data": "action", 'width': '90px',  },
                ],
                select: {
                    style: 'os',
                }
            })
        } );



        function destroyRealtyPost(url){
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

        $(document).on('click', '.realty-post-destroy', function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            swalConfirm('Xóa bài rao này!').then((result) => {
                if (result.value) {
                    destroyRealtyPost(url);
					setTimeout(() => {
						$('#realty-post-table').DataTable().ajax.reload();
					}, 1000);
                }
            });
        })
    </script>
@endsection

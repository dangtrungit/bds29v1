@extends('customer.pages.user_profile.index')
@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('form')
<div class="table-wraper col-12 py-3" >
    <table id="realty-post-table" class="table table-bordered table-hover bg-white">
        <thead>
          <tr>
              <th>TT</th>
              <th>Ảnh</th>
              <th>Link bài đăng</th>
              <th>Thời gian</th>
              <th>Trạng thái</th>
              <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($realty_posts as $key => $post)
            <tr>
                <td class="font-8"><strong>{{$key + 1}}</strong></td>
                <td style="height:50px; width: 80px">
                    <div>
                        <img  class="img-fluid" src="{{$post->thumb ?? ''}}" alt="{{$post->title ?? ''}}">
                    </div>
                </td>
                <td><a class="font-8 main-text" href="{{route('customer.realty_post.show', $post->slug)}}">{{$post->title ?? ''}}</a> </td>
                <td class="font-8">{{Carbon\Carbon::parse($post->open_at)->format('d/m/Y') ?? ''}} - {{ Carbon\Carbon::parse($post->close_at ?? '')->format('d/m/Y') ?? ''}}</td>
                <td><span class="font-8">{{config('constant.realty_post_status.' . $post->status)}}</span></td>
                <td><a class="font-8" href="{{route('customer.realty_post.edit', $post->id)}}">Sửa</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('script')
@parent
<script src="{{asset('template/AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('template/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('template/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
 $("#realty-post-table").dataTable({
    "scrollX": true,
    columns: [
            {'width': '10px'},
            {'width':'40px', 'orderable': false },
            {  },
            { },
            { },
            {'orderable': false},
        ],
    language: {

            "decimal":        "",
            "emptyTable":     "Không có bài đăng nào!",
            "info":           "Hiển thị _START_ từ _END_ của _TOTAL_ kết quả",
            "infoEmpty":      "Hiển thị 0 từ 0 của 0 kết quả",
            "infoFiltered":   "(Lọc từ _MAX_ kết quả)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Hiển thị _MENU_ kết quả",
            "loadingRecords": "Đang tải...",
            "processing":     "Đang tải...",
            "search":         "Tìm kiếm:",
            "zeroRecords":    "Không tìm thấy kết quả phù hợp",
            "paginate": {
                "first":      "Trang đầu",
                "last":       "Trang cuối",
                "next":       "Trang kế",
                "previous":   "Trang trước"
            },
            "aria": {
                "sortAscending":  ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        }
});
</script>
@endsection

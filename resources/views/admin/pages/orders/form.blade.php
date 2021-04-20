<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thông tin khách hàng</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group">
                <label for="order_code">Mã đơn hàng (<span class="text-red">*</span>)</label>
                <input 
                name="order_code" 
                type="text" 
                class="form-control" 
                id="order_code" 
                readonly
                value="{{$order->order_code ?? old('order_code')}}"
                >
            </div>

            <div class="form-group">
                <label for="fullname">Tên khách hàng (<span class="text-red">*</span>)</label>
                <input 
                name="fullname" 
                type="text" 
                class="form-control" 
                id="fullname" 
                placeholder="Nhập Tên khách hàng"
                value="{{$order->fullname ?? old('fullname')}}"
                >
            </div>

            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input 
                name="address" 
                type="text" 
                class="form-control" 
                id="address" 
                placeholder="Nhập địa chỉ"
                value="{{$order->address ?? old('address')}}"
                >
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input 
                name="email" 
                type="text" 
                class="form-control" 
                id="email" 
                placeholder="Nhập địa chỉ"
                value="{{$order->email ?? old('email')}}"
                >
            </div>

            <div class="form-group">
                <label for="phone_number">Số điện thoại</label>
                <input 
                name="phone_number" 
                type="text" 
                class="form-control" 
                id="phone_number" 
                placeholder="Nhập địa chỉ"
                value="{{$order->phone_number ?? old('phone_number')}}"
                >
            </div>


            <div class="form-group">
                <label>Yêu cầu thêm</label>
                <textarea name="message" class="form-control" rows="3"
                    placeholder="Nhập mô tả ...">{{$order->message ?? old('message')}}</textarea>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Chi tiết đơn hàng</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên khóa học</th>
                        <th>Ảnh đại diện</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $index => $item)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$item->online_class->name}}</td>
                        <td>
                            <img width="100px" src="{{$item->online_class->thumb}}" alt="{{$item->online_class->name}}" srcset="">                           
                        </td>
                        <td>{{number_format($item->price, 0, '', '.') }}đ</td>
                        <td>{{$item->qty}}</td>
                        <td>{{number_format($item->qty * $item->price, 0, '', '.') }}đ</td>
                        <td>
                            <a data-toggle-for="tooltip" title="Thêm vào lớp học" data-class-id="{{$item->online_class->id}}" href="#"class="btn text-info add-student-to-class"><i class="fas fa-edit "></i></a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="5">Thành tiền</th>
                        <th>{{number_format($order->sub_total, 0, '', '.') }}đ</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thao tác</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="btn-set">
                <button type="submit" name="submit" value="save" class="btn btn-info">
                    <i class="fa fa-save"></i> Lưu
                </button>
                &nbsp;
                <button type="submit" name="submit" value="apply" class="btn btn-success">
                    <i class="fa fa-check-circle"></i> Lưu &amp; Thoát
                </button>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Trạng thái </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Trạng thái</label>
                <select class="form-control select2 select2-info" value="" name="status" data-dropdown-css-class="select2-info"
                    style="width: 100%;">
                    <option @if(isset($order->status) && $order->status == 0) selected @endif value="0">Đơn hàng mới</option>
                    <option @if(isset($order->status) && $order->status == 1) selected @endif value="1">Đang xử lý</option>
                    <option @if(isset($order->status) && $order->status == 2) selected @endif value="2">Đã thanh toán</option>
                    <option @if(isset($order->status) && $order->status == 3) selected @endif value="3">Đơn bị hủy</option>
                </select>
            </div>
        </div>
    </div>
</div>

@section('script')
    @parent
    <script>
        function addSutdentAjax(class_id){
            $.ajax({
                url: "{{route('admin.class.student.add')}}",
                type: 'post',
                data: {
                    class_id: class_id,
                    student_id: {{$order->user_id}},
                }, 
                success: function(data){
                    if(data.msg){
                        swalToast(data.msg);
                    };
                    if(data.error){
                        swalToast(data.error, 'warning');
                    }
                }
            })
        }

        $('.add-student-to-class').on('click', function(e){
            e.preventDefault();
            var class_id = $(this).data('class-id');
            console.log(class_id);
            swalConfirm('Thêm khách hàng vào lớp học', "Thêm")
            .then((result) =>{
                if(result.value){
                    addSutdentAjax(class_id);
                }
            })            
        })
    </script>
@endsection
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
                <label for="name">Tên khách hàng (<span class="text-red">*</span>)</label>
                <input 
                name="name" 
                type="text" 
                class="form-control" 
                id="name" 
                placeholder="Nhập Tên khách hàng"
                value="{{$customer->name ?? old('name')}}"
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
                value="{{$customer->email ?? old('email')}}"
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
                value="{{$customer->address ?? old('address')}}"
                >
            </div>

            <div class="form-group">
                <label for="phone_number">Số điện thoại</label>
                <input 
                name="phone_number" 
                type="text" 
                class="form-control" 
                id="phone_number" 
                placeholder="Nhập số điện thoại"
                value="{{$customer->phone_number ?? old('phone_number')}}"
                >
            </div>

            <div class="form-group">
                <label for="phone_number">Ngày sinh</label>
                <input 
                name="date_of_birth" 
                type="text" 
                class="form-control" 
                id="date_of_birth" 
                placeholder="Nhập ngày sinh"
                value="{{$customer->date_of_birth ?? old('date_of_birth')}}"
                >
            </div>


        </div>
        <!-- /.card-body -->
    </div>
    @isset($customer)
    <div class="card collapsed-card">
        <div class="card-header">
            <h3 class="card-title">Lớp học đang tham gia</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <table id="students-table" class="table table-bordered table-hover">
                <thead>
                  <tr>
                      <th>STT</th>
                      <th>Ảnh đại diện</th>
                      <th>Tên</th>
                      <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($customer->classes as $index => $class)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$class->thumb}}</td>
                        <td>{{$class->name}}</td>
                        <td>
                            
                        </td>
                    </tr>    
                    @endforeach
                    
                  </tbody>
            </table>
        </div>
    </div>

    @endisset
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

    {{-- <div class="card">
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
                    <option @if(isset($customer->status) && $customer->status == 0) selected @endif value="0">Đơn hàng mới</option>
                    <option @if(isset($customer->status) && $customer->status == 1) selected @endif value="1">Đang xử lý</option>
                    <option @if(isset($customer->status) && $customer->status == 2) selected @endif value="2">Đã thanh toán</option>
                    <option @if(isset($customer->status) && $customer->status == 3) selected @endif value="3">Đơn bị hủy</option>
                </select>
            </div>
        </div>
    </div> --}}
</div>

@section('script')
    @parent
    <script>
        $("#classes-table").dataTable({
            responsive: true,
            autoWidth:false,
            columns: [
                    { 'width': '10px'},
                    { 'width': '200px'},
                    {  },
                    { 'width': '80px' },
                ],
        });
        
    </script>
@endsection
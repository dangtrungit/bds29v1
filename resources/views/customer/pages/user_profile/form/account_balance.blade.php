@section('css')
@parent
<link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

<div class="col-12 p-2 bg-white mb-2 d-flex align-items-center justify-content-between">
    <h3 class=" text-secondary m-0">Tài khoản cá nhân</h3>
    <a href="/tai-khoan/nap-tien" class="btn btn-save hrm-btn-info-solid"><strong>Nạp tiền</strong></a>
</div>
<div class="account-balance-wraper row p-3">
    <div>
        <div class=" ">
            <div class="account-balance bg-white font-13 p-2">
                <span class="text-secondary"> Số dư tài khoản:</span> <strong class="text-blue">{{ number_format($wallet->main_account ?? 0, 0,0, '.')}}VNĐ</strong>
            </div>
        </div>
    </div>
</div>

<div class="history-table w-100 pt-5 px-3 bg-white">
    <table id="account-balance-table" class="table table-bordered table-hover ">
        <thead>
          <tr>
              <th>Thời gian</th>
              <th>Mô tả</th>
              <th>Biến động</th>
              <th>Số dư</th>
          </tr>
        </thead>
        <tbody class="font-9">
            @foreach ($history as $item)
            @php
                $properties = $item->properties;
            @endphp
            <tr>
                <td>{{Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i')}}</td>
                <td>{{$item->description}}</td>
                <td>{{$properties['amount_of_money'] ?? 0}} VNĐ</td>
                <td>{{$properties['main_account'] ?? 0}} VNĐ</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@section('script')
    @parent
    <script src="{{asset('template/AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('template/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('template/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
        $("#account-balance-table").dataTable( {"order": [[ 0, "desc" ]]});
       </script>
@endsection

@section('css')
@parent
    <link rel="stylesheet" href="{{asset('template/AdminLTE/plugins/daterangepicker/daterangepicker.css')}}">
@endsection


<form id="form-my-acount" class="mt-3 mt-md-0 form-horizontal row" action="/tai-khoan" method="POST" enctype="multipart/form-data">
    @php
        $user = auth()->user();
    @endphp
    @csrf
    <div class="col-12">
        <div class="bg-white px-3 py-2 mb-2 d-flex align-items-center justify-content-between">
            <h3 class=" text-secondary m-0">Thông tin cá nhân</h3>
            <button type="submit" class="btn btn-save hrm-btn-info-solid"><strong>Lưu</strong></button>
        </div>
    </div>
    <div class="col-sm-6">
        <div class=" bg-white p-3">
            <div class="form-group">
                <label class="control-label">Họ và tên</label>
                <input name="name" id="name" type="text"
                    class="form-control"
                    placeholder="Họ và tên"
                    value="{{$user->name ?? old('name')}}" />

                @error('name')
                <small class="text-danger col-sm-12">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group mr-2">
                <label>Ngày sinh</label>
                <input name="birthday" id="birthday" type="text" class="form-control date-picker" placeholder="Ngày sinh"
                value="{{Carbon\Carbon::parse($user->birthday)->format('d/m/Y')  ?? old('birthday')}}">
                @error('birthday')
                    <small class="text-danger col-sm-12">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Giới tính</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="">Giới tính</option>
                    <option value="1" @if ($user->gender == 1) selected @endif >Nam</option>
                    <option value="2" @if ($user->gender == 2) selected @endif >Nữ</option>
                </select>
                @error('gender')
                    <small class="text-danger col-sm-12">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label class="label">Email</label>
                <input
                    name="email" id="email" type="text"
                    class="form-control"
                    placeholder="Email"
                    value="{{$user->email ?? old('email')}}"
                />
                @error('email')
                    <small class="text-danger col-sm-12">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Số điện thoại</label>
                <input
                    name="phone_number" id="phone_number" type="text"
                    class="form-control"
                    placeholder="Số điện thoại"
                    value="{{$user->phone_number ?? old('phone_number')}}"
                />

                @error('phone_number')
                    <small class="text-danger col-sm-12">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                    <label>Địa chỉ</label>
                    <input
                        name="address" id="address" type="text"
                        class="form-control"
                        placeholder="Nhập địa chỉ liên hệ"
                        value="{{$user->address ?? old('address')}}"
                    />
                    @error('phone_number')
                        <small class="text-danger col-sm-12">{{$message}}</small>
                    @enderror
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="col-sm-12 p-0 d-none">
            <div class="form-group">
                <input type="file" id="imgInp" name="profile_image_path" class="">
            </div>
        </div>
        <div class="bl-avatar text-center p-3 mt-sm-4" style="position:relative">
            <a href="javascript:;" class="change-image-acount">
                <div class="avatar-holder mx-auto shadow-10"
                    style="background-size: cover; height: 150px; width: 150px; background-image: url('{{auth()->user()->profile_image_path ?? '/images/empty-avatar.jpg'}}');background-position: center;">
                    <span class="span-camera"></span>
                </div>
                <button class="btn  hrm-btn-info-solid mt-3 avatar-change" type="button">
                    Đổi hình đại diện
                </button>
            </a>
        </div>
    </div>
    <div class="col-6">
        <h3 class=" text-secondary m-0 pl-3">Đổi mật khẩu</h3>
        <div class="bg-white p-3">
            <div class="form-group">
                <label class="control-label">Mật khẩu cũ</label>
                <input name="old_password" id="old_password" type="text"
                    class="form-control"
                    placeholder="Mật khẩu cũ"
                    value="{{old('old_password')}}" />

                @error('old_password')
                <small class="text-danger col-sm-12">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label class="control-label">Mật khẩu mới</label>
                <input name="new_password" id="new_password" type="text"
                    class="form-control"
                    placeholder="Nhập mật khẩu mới"
                    value="{{old('new_password')}}" />

                @error('new_password')
                <small class="text-danger col-sm-12">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label class="control-label">Xác nhận mật khẩu</label>
                <input name="new_password_confirmation" id="new_password_confirmation" type="text"
                    class="form-control"
                    placeholder="Nhập lại mật khẩu mới"
                    value="{{old('new_password_confirmation')}}" />

                @error('new_password_confirmation')
                <small class="text-danger col-sm-12">{{$message}}</small>
                @enderror
            </div>
        </div>
    </div>
</form>

@section('script')
@parent
    <!-- daterangepicker -->
<script src="{{asset('template/AdminLTE/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('template/AdminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script>
       $('.date-picker').each(function(){
        $(this).daterangepicker({
            singleDatePicker: true,
            timePicker24Hour: true,
            showDropdowns:true,
            locale: {
                "format": 'DD/MM/YYYY',
                "applyLabel": "Ok",
                "cancelLabel": "Thoát",
                "fromLabel": "Từ",
                "toLabel": "Đến",
                "customRangeLabel": "Custom",
                "daysOfWeek": [
                    "CN",
                    "T2",
                    "T3",
                    "T4",
                    "T5",
                    "T6",
                    "T7"
                ],
                "monthNames": [
                    "Tháng 1",
                    "Tháng 2",
                    "Tháng 3",
                    "Tháng 4",
                    "Tháng 5",
                    "Tháng 6",
                    "Tháng 7",
                    "Tháng 8",
                    "Tháng 9",
                    "Tháng 10",
                    "Tháng 11",
                    "Tháng 12"
                ],
            },
        })
    })
</script>
@endsection

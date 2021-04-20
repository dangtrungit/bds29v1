@extends('customer.layouts.main')

@section('title')
Liên hệ admin
@endsection

@section('content')
<section class="contact-form pt-5" style="background: url({{asset('/images/contact_background.jpg')}}); background-size: cover; background-position: center">
    <div class="container">
        <div class="contact-details mb-3 mb-md-5">
            <div class="content-wraper bg-white p-3 mt-2 rounded">
                {!!$theme_options['contact_page'] ?? ''!!}
            </div>
        </div>
        <div class="contact-form pb-5" >
            <form action="{{route('admin.class_request.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <input
                            name="fullname"
                            type="text"
                            class="form-control border-0 p-3 @error('fullname') is-invalid @enderror"
                            id="fullname"
                            placeholder="Nhập Tên khách hàng"
                            value="{{old('fullname')}}"
                            >
                            @error('fullname')
                            <div id="" class="error invalid-feedback d-block">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input
                            name="email"
                            type="text"
                            class="form-control border-0 p-3  @error('email') is-invalid @enderror"
                            id="email"
                            placeholder="Email"
                            value="{{old('email')}}"
                            >
                            @error('email')
                            <div id="" class="error invalid-feedback d-block ">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input
                            name="phone_number"
                            type="text"
                            class="form-control border-0 p-3  @error('phone_number') is-invalid @enderror"
                            id="phone_number"
                            placeholder="Số điện thoại"
                            value="{{old('phone_number')}}"
                            >
                            @error('phone_number')
                            <div id="" class="error invalid-feedback d-block">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input
                            name="address"
                            type="text"
                            class="form-control border-0 p-3  @error('address') is-invalid @enderror"
                            id="address"
                            placeholder="Địa chỉ"
                            value="{{old('address')}}"
                            >
                            @error('address')
                            <div id="" class="error invalid-feedback d-block">
                                    {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 h-100">
                        <div class="form-group">
                            <textarea name="messages" class="form-control @error('messages') is-invalid @enderror d-block" placeholder="Nhập yêu cầu" style="height: 271px">{{$class->messages ?? old('messages')}}</textarea>
                            @error('messages')
                            <div id="" class="error invalid-feedback d-block">
                                    {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-info px-4 py-3" style="letter-spacing: 2px"><strong>GỬI PHẢN HỒI</strong></button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

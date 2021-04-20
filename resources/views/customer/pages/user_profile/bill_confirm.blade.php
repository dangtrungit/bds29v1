@extends('customer.pages.user_profile.index')

@section('form')
    <div>
        <h1>Xác nhận nạp tiền</h1>

        <p>Chúng tôi đã nhân được yêu cầu nạp tiền của bạn!</p>
        <p>Để nạp tiền, quý khách hãy chuyển tiền đến tài khoản phía trên kèm tin nhắn là chuỗi ký tự sau:</p>
        <h2>{{$bill->bill_code}}</h2>
    </div>
@endsection


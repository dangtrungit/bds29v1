<div>
    Kính chào <a href="mailto:{{$data['realty_owner_email']}}">{{$data['realty_owner_email']}}</a>
    <br>
    Có một khách hàng tiềm năng đã để lại thông tin liên lạc trên tin đăng của bạn.
    <br>
</div>

<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
    <tbody>
        <tr>
            <td style="width:126px;vertical-align:top">Tên khách hàng:</td>
            <td style="padding-bottom:5px"><b>{{$data['name']}}</b></td>
        </tr>
        <tr>
            <td style="width:126px;vertical-align:top">Số điện thoại:</td>
            <td style="padding-bottom:5px"><b>{{$data['phone']}}</b></td>
        </tr>
        <tr>
            <td style="width:126px;vertical-align:top">Lời nhắn:</td>
            <td style="padding-bottom:5px"><b>{{$data['message']}}</b></td>
        </tr>
        <tr>
            <td style="width:126px;vertical-align:top">Gửi lúc:</td>
            <td style="padding-bottom:5px">{{\Carbon\Carbon::now()->format('d-m-Y H:i:s A')}}</td>
        </tr>
        <tr>
            <td valign="top" style="width:126px;vertical-align:top">Tin đăng của bạn:</td>
            <td style="padding-bottom:5px"><a
                    href="{{$data['link']}}"
                    style="color:#055699;text-decoration:none" target="_blank">
                    {{$data['link']}}
                </a>
            </td>
        </tr>
    </tbody>
</table>

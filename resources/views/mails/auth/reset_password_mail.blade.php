@php
	$logos = explode(',', $theme_options['logo'] ?? '');
	$logo = '';
	foreach ($logos as $temp) {
		if ($temp != '') {
			$logo = $temp;
		}
	}
@endphp

<table cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
        <tr>
            <td align="center">
                <font color="#888888">
                </font>
                <font color="#888888">
                </font>
                <font color="#888888">
                </font>
                <table cellpadding="0" cellspacing="0" style="min-width:800px;width:800px">
                    <tbody>
                        <tr>
                            <td align="center" style="background-color: #fff">
                                <font color="#888888">
                                </font>
                                <font color="#888888">
                                </font>
                                <font color="#888888">
                                </font>
                                <table align="center" bgcolor="#ffffff" cellpadding="0" cellspacing="0"
                                    style="font-family:Arial;min-width:620px" width="620">
                                    <tbody>
                                        <tr>
                                            <td align="center" style="padding:20px;border-bottom:1px solid #dedede">
                                                <table cellpadding="0" cellspacing="0"
                                                    style="min-width:580px;width:580px;height:88px">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center" style="min-width:169px;width:169px">
                                                                <a href="http://batdongsan.com.vn"
                                                                    style="text-decoration:none;color:#fff"
                                                                    target="_blank"
                                                                    data-saferedirecturl="/">
                                                                    <img alt="Batdongsan.com.vn"
                                                                        src="https://ci4.googleusercontent.com/proxy/c3AbIjCe_x9v58xlc3VejWADyo3Ygr90DjFlI6tGJ1yLqwXj8xsNZsDqy5cQdhnluwT_st8iUntVdFZKmgwXAIMvFS_gWJtP1nD081oc_1RbSUypetNCUYYlww=s0-d-e1-ft#http://file3.batdongsan.com.vn/FileUpload/LandingPage/ImgNotify/logo.jpg"
                                                                        style="width:169px;vertical-align:top;height:88px;min-width:169px"
                                                                        class="CToWUd"> </a>
                                                            </td>
                                                            <td style="min-width:400px;width:400px;padding-left:30px;font-size:16px;font-family:Arial;color:#055699"
                                                                valign="middle">
                                                                THÔNG BÁO TỪ<br>
                                                                <strong>BAN QUẢN TRỊ <a href="{{route('home')}}"
                                                                        style="text-decoration:none;color:#055699"
                                                                        target="_blank"
                                                                        >{{env('APP_NAME')}}
                                                                    </a></strong>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="10">
                                                &nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0px 65px">
                                                <div
                                                    style="line-height:25px;font-family:Arial;font-size:15px;color:#555555">
                                                    Chào bạn&nbsp; <strong><span style="color:#055699"><a
                                                                href="mailto:{{$user->email ?? ''}}"
                                                                target="_blank">{{$user->email ?? ''}}</a></span></strong><br>
                                                    <p>Bạn đang yêu cầu thay đổi mật khẩu tài khoản <b><a
                                                                href="mailto:{{$user->email ?? ''}}"
                                                                target="_blank">{{$user->email ?? ''}}</a></b>.</p>
                                                    <p>Để cấp lại mật khẩu, Vui lòng click vào đường dẫn dưới đây: <a
                                                            style="color:#055699;text-decoration:underline;font-weight:bold"
                                                            href="{{$url}}"
                                                            target="_blank"
                                                            data-saferedirecturl="{{$url}}">Link
                                                            xác nhận khôi phục mật khẩu.</a></p><br>
                                                    <p>Nếu không nhìn thấy đường dẫn, bạn vui lòng chép và dán đường dẫn
                                                        sau vào trình duyệt: <a
                                                            href="{{$url}}"
                                                            target="_blank"
                                                            data-saferedirecturl="{{$url}}">{{$url}}</a>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0px 65px">
                                                <div
                                                    style="line-height:25px;margin-top:15px;font-family:Arial;font-size:15px;color:#555555">
                                                    Mọi thắc mắc xin vui lòng liên hệ hòm mail <a
                                                        href="mailto:{{$theme_options['Email_công_ty']}}" style="color:#055699"
                                                        target="_blank">{{$theme_options['Email_công_ty']}} </a>để được hỗ trợ và
                                                    giải đáp.</div>
                                                <div
                                                    style="line-height:25px;margin-top:15px;font-family:Arial;font-size:15px;color:#555555">
                                                    Chúc các bạn có những trải nghiệm thú vị cùng <a
                                                        href="{{route('home')}}"
                                                        style="color:#055699;text-decoration:none" target="_blank"
                                                        >{{route('home')}}</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right"
                                                style="font-family:Arial;font-size:15px;color:#555555;padding:20px 65px 20px 65px">
                                                Trân trọng,<br>
                                                Ban quản trị</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:20px 0px;border-top:1px solid #dedede">
                                                <table cellpadding="0" cellspacing="0"
                                                    style="font-family:Arial;font-size:12px;color:#525252;width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center" colspan="5"
                                                                style="color:#055699;font-size:16px">
                                                                <b>{{$theme_options['Tên_công_ty']}}</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20">
                                                                &nbsp;</td>
                                                            <td colspan="5">
                                                                <img src="https://ci5.googleusercontent.com/proxy/nOIdrMbWQmxYrvpqB80cU3DLlN7nsWCojH3fHtmJZOUA4jVTLy4LBdkfSITAeNztpWRGrlfxYGBDOI_tkjr3Z5_IdpOjVi6Sp7zjlXLhGAPu89aZAY2ku_NceNvMcw=s0-d-e1-ft#http://file3.batdongsan.com.vn/FileUpload/LandingPage/ImgNotify/address.jpg"
                                                                    class="CToWUd">{{$theme_options['Trụ_sở']}}
                                                            </td>
                                                            <td width="20">
                                                                &nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20">
                                                                &nbsp;</td>
                                                            <td valign="bottom" width="215">
                                                                <img src="https://ci4.googleusercontent.com/proxy/saUhyk-3zO2N9rrczrGB3nYhBKUPkbq9ZpqGDA0pcyaCi5OVrnwszXMNsPHvS_9t1GeVdUJRaezkKoASDcCO6abwYnPNtS27Ve-h3fv7dC0KCSAEpLFSksgIiPlPgw=s0-d-e1-ft#http://file3.batdongsan.com.vn/FileUpload/LandingPage/ImgNotify/hotline.jpg"
                                                                    class="CToWUd">&nbsp; Tổng đài CSKH: {{$theme_options['Số_điện_thoại']}}
                                                            </td>
                                                            <td align="center" valign="bottom" width="190">
                                                                <img src="https://ci3.googleusercontent.com/proxy/o0I85z9IlKk23erM6qlFeHD3KVXwaP8SP8sMAMec-JpBORpJOOdt60R1RlKuOcO_vwV2UeoNzukLauJLN2rXvIsfyk2qPk9Px1JzRbiy2m2yYfeosl0DhniVHVw=s0-d-e1-ft#http://file3.batdongsan.com.vn/FileUpload/LandingPage/ImgNotify/email.jpg"
                                                                    style="vertical-align:middle"
                                                                    class="CToWUd">&nbsp;&nbsp; <a
                                                                    href="mailto:{{$theme_options['email_công_ty'] ?? ''}}"
                                                                    style="color:#525252;text-decoration:none"
                                                                    target="_blank">{{$theme_options['email_công_ty'] ?? ''}} </a>
                                                            </td>
                                                            {{-- <td valign="bottom" width="80">
                                                                <img src="https://ci6.googleusercontent.com/proxy/h-wcN-rBl_vB5KW4LBgMO7Qo6u8cV4ExXOYeCObi4aJ5ON7tJYEjwIkiuHeoIvBwQ8yps0KhFfksWomTknC-imNguxdfDggYuhOqSlmPSAV-7bDKKlycLdAhRTctdQ=s0-d-e1-ft#http://file3.batdongsan.com.vn/FileUpload/LandingPage/ImgNotify/youtube.jpg"
                                                                    style="vertical-align:middle"
                                                                    class="CToWUd">&nbsp;&nbsp; <a
                                                                    href="https://www.youtube.com/user/BDSVN"
                                                                    style="color:#525252;text-decoration:none"
                                                                    target="_blank"
                                                                    data-saferedirecturl="https://www.google.com/url?q=https://www.youtube.com/user/BDSVN&amp;source=gmail&amp;ust=1609299949437000&amp;usg=AFQjCNFaHD7p39NmsxoS0bJJ5EnUOaNv3Q">Youtube
                                                                </a>
                                                            </td>
                                                            <td valign="bottom" width="90">
                                                                <img src="{{$logo}}"
                                                                    style="vertical-align:middle"
                                                                    class="CToWUd">&nbsp;&nbsp; <a
                                                                    href="https://www.facebook.com/Batdongsandv"
                                                                    style="color:#525252;text-decoration:none"
                                                                    target="_blank"
                                                                    data-saferedirecturl="https://www.google.com/url?q=https://www.facebook.com/Batdongsandv&amp;source=gmail&amp;ust=1609299949437000&amp;usg=AFQjCNHfN23tdu8gSMMaTQCgzN_tN8PwDw">Facebook
                                                                </a>
                                                            </td> --}}
                                                        </tr>
                                                        <tr>
                                                            <td height="10">
                                                                &nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" colspan="5" style="color:#055699">
                                                                Thành thật xin lỗi nếu email này làm phiền Quý khách!
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" bgcolor="#3d9e10"
                                                style="font-size:12px;color:#fff;font-family:Arial;text-align:justify;padding:10px 20px">
                                                Lưu ý: Đây là email được gửi tự động, bạn không thể trả lời email này.
                                                Để liên hệ với chúng tôi, vui lòng gọi điện hoặc gửi mail cho bộ phận <a
                                                    href="mailto:hotro@batdongsan.com.vn"
                                                    style="color:#fff;text-decoration:none" target="_blank">Bộ phận Chăm
                                                    sóc khách hàng </a>. Quý khách muốn dừng nhận thông báo qua email,
                                                vui lòng bấm <a style="color:#fae0bf">vào đây </a>.</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <font color="#888888">
                                </font>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <font color="#888888">
                </font>
            </td>
        </tr>
    </tbody>
</table>

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
                                                                TH??NG B??O T???<br>
                                                                <strong>BAN QU???N TR??? <a href="{{route('home')}}"
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
                                                    Ch??o b???n&nbsp; <strong><span style="color:#055699"><a
                                                                href="mailto:{{$user->email ?? ''}}"
                                                                target="_blank">{{$user->email ?? ''}}</a></span></strong><br>
                                                    <p>B???n ??ang y??u c???u thay ?????i m???t kh???u t??i kho???n <b><a
                                                                href="mailto:{{$user->email ?? ''}}"
                                                                target="_blank">{{$user->email ?? ''}}</a></b>.</p>
                                                    <p>????? c???p l???i m???t kh???u, Vui l??ng click v??o ???????ng d???n d?????i ????y: <a
                                                            style="color:#055699;text-decoration:underline;font-weight:bold"
                                                            href="{{$url}}"
                                                            target="_blank"
                                                            data-saferedirecturl="{{$url}}">Link
                                                            x??c nh???n kh??i ph???c m???t kh???u.</a></p><br>
                                                    <p>N???u kh??ng nh??n th???y ???????ng d???n, b???n vui l??ng ch??p v?? d??n ???????ng d???n
                                                        sau v??o tr??nh duy???t: <a
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
                                                    M???i th???c m???c xin vui l??ng li??n h??? h??m mail <a
                                                        href="mailto:{{$theme_options['Email_c??ng_ty']}}" style="color:#055699"
                                                        target="_blank">{{$theme_options['Email_c??ng_ty']}} </a>????? ???????c h??? tr??? v??
                                                    gi???i ????p.</div>
                                                <div
                                                    style="line-height:25px;margin-top:15px;font-family:Arial;font-size:15px;color:#555555">
                                                    Ch??c c??c b???n c?? nh???ng tr???i nghi???m th?? v??? c??ng <a
                                                        href="{{route('home')}}"
                                                        style="color:#055699;text-decoration:none" target="_blank"
                                                        >{{route('home')}}</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right"
                                                style="font-family:Arial;font-size:15px;color:#555555;padding:20px 65px 20px 65px">
                                                Tr??n tr???ng,<br>
                                                Ban qu???n tr???</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:20px 0px;border-top:1px solid #dedede">
                                                <table cellpadding="0" cellspacing="0"
                                                    style="font-family:Arial;font-size:12px;color:#525252;width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center" colspan="5"
                                                                style="color:#055699;font-size:16px">
                                                                <b>{{$theme_options['T??n_c??ng_ty']}}</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20">
                                                                &nbsp;</td>
                                                            <td colspan="5">
                                                                <img src="https://ci5.googleusercontent.com/proxy/nOIdrMbWQmxYrvpqB80cU3DLlN7nsWCojH3fHtmJZOUA4jVTLy4LBdkfSITAeNztpWRGrlfxYGBDOI_tkjr3Z5_IdpOjVi6Sp7zjlXLhGAPu89aZAY2ku_NceNvMcw=s0-d-e1-ft#http://file3.batdongsan.com.vn/FileUpload/LandingPage/ImgNotify/address.jpg"
                                                                    class="CToWUd">{{$theme_options['Tr???_s???']}}
                                                            </td>
                                                            <td width="20">
                                                                &nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="20">
                                                                &nbsp;</td>
                                                            <td valign="bottom" width="215">
                                                                <img src="https://ci4.googleusercontent.com/proxy/saUhyk-3zO2N9rrczrGB3nYhBKUPkbq9ZpqGDA0pcyaCi5OVrnwszXMNsPHvS_9t1GeVdUJRaezkKoASDcCO6abwYnPNtS27Ve-h3fv7dC0KCSAEpLFSksgIiPlPgw=s0-d-e1-ft#http://file3.batdongsan.com.vn/FileUpload/LandingPage/ImgNotify/hotline.jpg"
                                                                    class="CToWUd">&nbsp; T???ng ????i CSKH: {{$theme_options['S???_??i???n_tho???i']}}
                                                            </td>
                                                            <td align="center" valign="bottom" width="190">
                                                                <img src="https://ci3.googleusercontent.com/proxy/o0I85z9IlKk23erM6qlFeHD3KVXwaP8SP8sMAMec-JpBORpJOOdt60R1RlKuOcO_vwV2UeoNzukLauJLN2rXvIsfyk2qPk9Px1JzRbiy2m2yYfeosl0DhniVHVw=s0-d-e1-ft#http://file3.batdongsan.com.vn/FileUpload/LandingPage/ImgNotify/email.jpg"
                                                                    style="vertical-align:middle"
                                                                    class="CToWUd">&nbsp;&nbsp; <a
                                                                    href="mailto:{{$theme_options['email_c??ng_ty'] ?? ''}}"
                                                                    style="color:#525252;text-decoration:none"
                                                                    target="_blank">{{$theme_options['email_c??ng_ty'] ?? ''}} </a>
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
                                                                Th??nh th???t xin l???i n???u email n??y l??m phi???n Qu?? kh??ch!
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" bgcolor="#3d9e10"
                                                style="font-size:12px;color:#fff;font-family:Arial;text-align:justify;padding:10px 20px">
                                                L??u ??: ????y l?? email ???????c g???i t??? ?????ng, b???n kh??ng th??? tr??? l???i email n??y.
                                                ????? li??n h??? v???i ch??ng t??i, vui l??ng g???i ??i???n ho???c g???i mail cho b??? ph???n <a
                                                    href="mailto:hotro@batdongsan.com.vn"
                                                    style="color:#fff;text-decoration:none" target="_blank">B??? ph???n Ch??m
                                                    s??c kh??ch h??ng </a>. Qu?? kh??ch mu???n d???ng nh???n th??ng b??o qua email,
                                                vui l??ng b???m <a style="color:#fae0bf">v??o ????y </a>.</td>
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

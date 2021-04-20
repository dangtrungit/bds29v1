<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="{{asset('css/main.css')}}"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <div class="vw-100 d-flex justify-content-center align-items-center" style="height: 100vh;background-image: url(/images/contact_background.jpg); background-size:cover; background-repeat: none">
        <form action="/admin/login" method="POST" class="p-4 rounded bg-white shadow-10" style="width: 500px; max-width:100%">
            @csrf
            <div class="form-group">
              <label for="">Tên đăng nhập</label>
              <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập hoặc email">
            </div>
            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
              </div>
            <button type="submit" class="mx-auto btn btn-info d-block px-4 py-2 rounded-0">Đăng nhập</button>
            <div id="remember-container" class="d-flex justify-content-between mt-3 font-9">
                <div>
                    <input type="checkbox" id="remember" class="checkbox" checked="checked" />
                    <label for="remember" id="remember">Nhớ mật khẩu</label for="remember">
                </div>
                <span id="forgotten">Quên mật khẩu</span>
            </div>
        </form>
    </div>
</body>
</html>

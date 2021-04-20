<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Models\AccountBalance;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Mail;
use Password;
use Session;
use Str;

class CustomerLoginController extends Controller
{
    /**
     * Handle login form.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */

    public function showLoginForm()
    {
        return view('customer.auth.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */

    public function authenticate(Request $request)
    {
        $this->username = $this->findUsername();
        // Validation Form
        $this->validate($request, [
            'username' => 'required',
            'password' => 'min:6|required',
        ], [
            'username.required' => 'Tên đăng nhập không được để trống',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự!',
            'password.required' => 'Mật khẩu không được để trống!',
        ]);
        $remember = isset($request->remember) ? true : false;

        if (Auth::viaRemember()) {
            return redirect()->route('home')->with(['success' => 'Chào mừng ' . Auth::guard('web')->user()->name]);
        }

        if (Auth::guard('web')->attempt([$this->username => $request->username, 'password' => $request->password], $remember)) {
            if ($request->expectsJson()) {
                return response()->json(['success' => 'Đăng nhập thành công'], 200);
            }
            return redirect()->route('home')->with(['success' => 'Chào mừng ' . Auth::guard('web')->user()->name]);
        }

        if ($request->expectsJson()) {
            return response()->json(['success' => 'Sai thông tin đăng nhập'], 401);
        }

        return back()->withInput()->withErrors(['login_fail' => ['Thông tin đăng nhập sai!']]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     *@param  Request  $request
     *
     * @return string
     */
    public function findUsername()
    {

        $login = request()->input('username');

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone_number';

        request()->merge([$fieldType => $login]);

        return $fieldType;
    }

    /**
     * Get username property.
     *
     * @return string
     */
    public function username()
    {
        return $this->username;
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flush();
        return redirect()->route('home');
    }

    public function showResetForm()
    {
        return view('admin.auth.forgot_password');
    }

    public function sendRequestMail(Request $request)
    {
        $request->validate(['email_reset' => 'required|email']);

        $status = Password::broker('users')->sendResetLink(
            ['email' => $request->email_reset], function ($user, $token) {
                // callback function mặc định tham số đầu vào là token reset và user hiện tại
                $url = route('customer.password.reset', $token);
                Mail::to($user->email)->send(new ResetPassword($url, $user));
            }
        );

        if ($request->expectsJson()) {
            return $status === Password::RESET_LINK_SENT
            ? response()->json(['status' => "Chúng tôi đã gửi link reset password đến Email của bạn"], 200)
            : response()->json(['email_reset' => "Không tìm thấy Email!"], 403);
        }

        return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email_reset' => __($status)]);
    }

    public function showResetPasswordForm($token)
    {
        return redirect('/v2/reset-password?token=' . $token);
        //return redirect()->route('home')->with(['reset_token' => $token]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'reset_email' => 'required|email',
            'reset_password' => 'required|min:4|confirmed',
        ], [
            'reset_email.required' => 'Email không được để trống',
            'reset_email.email' => 'Email không đúng định dạng',
        ]);

        $status = Password::broker('users')->reset(
            [
                'token' => $request->token,
                'email' => $request->reset_email,
                'password' => $request->reset_password,
                'password_confirmation' => $request->reset_password_confirmation,
            ],
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();

                $user->setRememberToken(Str::random(60));
            }
        );

        if ($request->expectsJson()) {
            return $status == Password::PASSWORD_RESET
            ? response()->json(['reset_status' => __($status)], 200)
            : response()->json(['password_reset' => __($status)], 422);
        }

        return $status == Password::PASSWORD_RESET
        ? redirect()->route('home')->with('reset_status', __($status))
        : back()->withErrors(['password_reset' => __($status)])->withInput();
    }

    public function register(Request $request)
    {
        $request->validate([
            'register_fullname' => 'required|string|max:50',
            'register_password' => 'required|string|max:256|min:4',
            'register_phone_number' => 'required|numeric|max:999999999999|unique:users,phone_number',
            'register_email' => 'required|email|max:256|unique:users,email',
        ], [
            'register_phone_number.max' => "Số điện thoại không đúng định dạng",
        ]);

        $user = User::create([
            'name' => $request->register_fullname,
            'email' => $request->register_email,
            'phone_number' => $request->register_phone_number,
            'password' => Hash::make($request->register_password),
        ]);

        $wallet = new AccountBalance;
        $wallet->user_id = $user->id;
        $wallet->payment_id = $user->id . rand(1000, 9999);
        $wallet->save();
        Auth::login($user);

        if ($request->expectsJson()) {
            return response()->json(['success' => 'Đăng ký thành công'], 200);
        }

        return redirect()->back()->with(['success' => 'Tạo mới thành công user']);
    }

}
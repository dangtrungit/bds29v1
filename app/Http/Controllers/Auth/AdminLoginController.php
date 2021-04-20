<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Mail;
use Password;
use Session;
use Str;

class AdminLoginController extends Controller
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
        return view('admin.auth.login');
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
        if (Auth::guard('admin')->viaRemember()) {
            return redirect()->route('admin.dashboard')->with(['success' => 'Chào mừng ' . Auth::guard('admin')->user()->fullname]);
        }

        if (Auth::guard('admin')->attempt([$this->username => $request->username, 'password' => $request->password], $remember)) {
            return redirect()->route('admin.dashboard')->with(['success' => 'Chào mừng ' . Auth::guard('admin')->user()->fullname]);
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

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

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
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        Session::flush();

        return redirect()->route('admin.login.show');
    }

    public function showResetForm()
    {
        return view('admin.auth.forgot_password');
    }

    public function sendRequestMail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::broker('users')->sendResetLink(
            $request->only('email'), function ($user, $token) {
                // callback function mặc định tham số đầu vào là token reset và user hiện tại
                $url = route('customer.password.reset', $token);
                Mail::to($user->email)->send(new ResetPassword($url));
            }
        );

        return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email_reset' => __($status)]);
    }

    public function showResetPasswordForm($token)
    {
        return view('home', ['reset_token' => $token]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::broker('users')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();

                $user->setRememberToken(Str::random(60));
            }
        );
        return $status == Password::PASSWORD_RESET
        ? redirect()->route('home')->with('reset_status', __($status))
        : back()->withErrors(['password_reset' => __($status)]);
    }
}
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AccountBalance;
use App\Models\User;
use Auth;
use Exception;
use Hash;
use Socialite;

class FacebookController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('facebook_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect('/');

            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'profile_image_path' => $user->getAvatar(),
                    'facebook_id' => $user->id,
                    'password' => Hash::make('123456dummy'),
                ]);

                Auth::login($newUser);
                $wallet = new AccountBalance;
                $wallet->user_id = $newUser->id;
                $wallet->payment_id = $newUser->id . rand(1000, 9999);
                $wallet->save();
                return redirect()->back();
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
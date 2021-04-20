<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Mail\AdvisoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdvisoryController extends Controller
{
    public function sendRequestToRealtyOwner(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|max:255',
            'message' => 'max:1000',
        ], [
            'name.required' => 'Họ tên không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'email.email' => 'Email sai định dạng',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'realty_owner_email' => $request->realty_owner_email,
            'link' => $request->link,
        ];

        Mail::to($request->realty_owner_email)->send(new AdvisoryRequest($data));

        return ['msg' => 'Gửi yêu cầu thành công'];
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerInfomationUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = auth()->user();
        return [
            'name' => 'required|max:30',
            'birthday' => 'nullable|date_format:d/m/Y',
            'gender' => Rule::in(['1', '2', '3']),
            'email' => 'email|unique:users,email,' . $user->id,
            'phone_number' => 'string|max:20|nullable',
            'profile_image_path' => 'nullable|mimes:jpeg,bmp,png,jpg|max:2000',
            'new_password' => 'required_with:old_password|confirmed|nullable|min:6',
        ];
    }

    public function messages()
    {
        return [
            'new_password.required_with' => 'Mật khẩu mới không được để trống nếu bạn muốn đối mật khẩu',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên khách hàng',
            'birthday' => 'Ngày sinh',
            'gender' => 'Giới tính',
            'email' => 'Địa chỉ Email',
            'phone_number' => 'Số điện thoại',
            'profile_image_path' => 'Ảnh đại diện',
            'new_password' => 'Mật khẩu mới',
            'password_confirmation' => 'Mật khẩu xác nhận',
        ];
    }
}
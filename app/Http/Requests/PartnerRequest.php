<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
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
        return [
            "name" => "required|max:256",
            "slug" => "required|max:256",
            "address" => "required|max:256",
            "phone" => "required|max:256",
            "email" => "email|required|max:256",
            "description" => "string|max:100000",
            "logo" => "required|max:1000",
        ];
    }

    public function attributes()
    {
        return [
            "name" => "Tên đối tác",
            "slug" => "slug",
            "address" => "Địa chỉ",
            "phone" => "Số điện thoại",
            "email" => "Email",
            "description" => "Chi tiết đối tác",
            "logo" => "Logo",
        ];
    }
}
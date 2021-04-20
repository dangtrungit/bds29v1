<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommuneRequest extends FormRequest
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
        $id = request()->id;
        return [
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
            'name_with_type' => 'required|max:255',
            'path' => 'required|max:255',
            'path_with_type' => 'required|max:255',
            'parent_code' => 'required|numeric',
            'code' => 'numeric|required|unique:communes,code,' . $id,
            'type' => [
                'required',
                Rule::in(['xa', 'phuong', 'thi-tran']),
            ],

            'area' => 'nullable|numeric',
            'short_description' => 'nullable|max: 2000',
            'full_description' => 'nullable|max: 100000',
            'avatar' => 'nullable|max:255',
            'images' => 'nullable|max:1000',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => "Tên xã",
            'name_with_type' => "Tên đầy đủ",
            'type' => 'Phân loại',
            'path' => 'Đường dẫn',
            'path_with_type' => 'Đường dẫn đầy đủ',

            'area' => 'Diện tích',
            'short_description' => 'Mô tả ngắn',
            'full_description' => 'Mô tả đầy đủ',
            'avatar' => 'Ảnh đại diện',
            'images' => 'Album ảnh',
            'code' => 'Mã xã',
        ];
    }
}
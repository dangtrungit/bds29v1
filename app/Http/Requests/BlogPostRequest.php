<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
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
            'name' => 'string|required|max:255|unique:posts,name,' . $id,
            'slug' => 'string|required|max:255|unique:posts,slug,' . $id,
            'short_description' => 'nullable|max:2000',
            'content' => 'nullable|max:100000',
            'avatar' => 'nullable|string|max:255',
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
            'name' => 'Tên bài post',
            'content' => 'Nội dung bài post',
        ];
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'investor' => 'nullable|max:255',
            'avatar' => 'nullable|max:255',
            'street' => 'nullable|max:255',
            'google_map_lat' => 'nullable|max:30',
            'google_map_lng' => 'nullable|max:30',

            'province_code' => 'required|numeric|max:100',
            'district_code' => 'required|numeric|max:10000',
            'commune_code' => 'required|numeric|max:100000',

            'location_description' => 'max:100000',

            'site_area' => 'nullable|numeric|max:100000000',
            'construction_area' => 'nullable|numeric|max:100000000',
            'project_type' => 'nullable|numeric|max:10',
            'start_time' => '',

            'description' => 'nullable|max:100000',
            'location_description' => 'nullable|max:100000',
            'promotion_term' => 'nullable|max:100000',
        ];
    }

    public function attributes()
    {
        return [
            'name' => "Tên dự án",
            'slug' => 'Slug',
            'site_area' => 'Diện tích tổng thể',
            'construction_area' => 'Diện tích xây dựng',
            'investor' => 'Chủ dự án',
            'description' => 'Chi tiết dự án',
            'location_description' => 'Mô tả địa điểm',
            'promotion_term' => 'Chính sách ưu đãi',
        ];
    }
}

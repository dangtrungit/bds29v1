<?php

namespace App\Http\Requests;

use App\Services\ImageService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Str;

class RealtyPostRequest extends FormRequest
{
    public function __construct(ImageService $image_service)
    {
        $this->image_service = $image_service;
    }
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
        $string_now = Carbon::yesterday()->format('d/m/Y');
        return [
            'title' => 'required|max:255',
            'realty_post_type' => 'required|numeric|max:2',
            'realty_type' => 'required|numeric|max:15',
            'area' => 'required|nullable|numeric',
            'direction' => 'nullable|numeric|max:20',
            'number_of_floors' => 'nullable|numeric|max:100',
            'number_of_bed_rooms' => 'nullable|numeric|max:100',
            'number_of_bath_rooms' => 'nullable|numeric|max:100',
            'price' => 'required|numeric|max:1000000000000',
            'province' => 'required|numeric',
            'district' => 'required|numeric',
            'commune' => 'required|numeric',
            'project' => 'required',
            'apartment_number' => 'nullable|numeric',
            'street' => 'required|string|max:256',

            'description' => 'required|string|max:5000',
            'contact_name' => 'required|string|max:256',
            'contact_phone_number' => 'required|string|max:30',
            'contact_email' => 'required|email|string|max:30',
            'contact_address' => 'nullable|max:300',

            'close_at' => 'date_format:d/m/Y|after:open_at',
            'open_at' => 'date_format:d/m/Y|after:' . $string_now,
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // Xóa toàn bộ ảnh đã up lên nếu validate bị lỗi
            $request = request()->all();
            if (!empty($validator->errors()->messages())) {
                if ($request['house_image']) {
                    $image_list = explode(',', $request['house_image']);
                    foreach ($image_list as $item) {
                        // dd($item);
                        // $this->image_service->delete(Str::replaceFirst('/storage', 'public', $item));
                        unlink(public_path().$item);
                    }
                }

                if ($request['house_design_image']) {
                    $image_list = explode(',', $request['house_design_image']);
                    foreach ($image_list as $item) {
                        // $this->image_service->delete(Str::replaceFirst('/storage', 'public', $item));
                        // Storage::delete(Str::replaceFirst('/storage', 'public', $item));
                        unlink(public_path().$item);
                    }
                }
            }
        });
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => "Tiêu đề",
            'province' => "Tỉnh/Thành phố",
            'district' => "Quận/Huyện",
            'commune' => 'Xã/Phường',
            'contact_name' => 'Họ tên liên hệ',
            'contact_phone_number' => 'Số điện thoại',
            'contact_email' => 'Email',
            'description' => 'Mô tả tin đăng',
            'open_at' => 'Ngày bắt đầu',
            'close_at' => 'Ngày kết thúc',
        ];
    }
}

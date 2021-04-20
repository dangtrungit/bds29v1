<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
     */

    'accepted' => ':attribute phải là accepted.',
    'active_url' => ':attribute is not a valid URL.',
    'after' => ':attribute phải là a date after :date.',
    'after_or_equal' => ':attribute phải là a date after hoặc bằng to :date.',
    'alpha' => ':attribute may only contain letters.',
    'alpha_dash' => ':attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => ':attribute may only contain letters and numbers.',
    'array' => ':attribute phải là an array.',
    'before' => ':attribute phải là a date before :date.',
    'before_or_equal' => ':attribute phải là a date before hoặc bằng to :date.',
    'between' => [
        'numeric' => ':attribute phải là between :min and :max.',
        'file' => ':attribute phải là between :min and :max kilobytes.',
        'string' => ':attribute phải là between :min and :max ký tự.',
        'array' => ':attribute must have between :min and :max items.',
    ],
    'boolean' => ':attribute field phải là true or false.',
    'confirmed' => ':attribute không trùng khớp.',
    'date' => ':attribute không đúng định dạng ngày tháng.',
    'date_equals' => ':attribute phải là a date equal to :date.',
    'date_format' => ':attribute does not match the format :format.',
    'different' => ':attribute and :other phải là different.',
    'digits' => ':attribute phải là :digits digits.',
    'digits_between' => ':attribute phải là between :min and :max digits.',
    'dimensions' => ':attribute has invalid image dimensions.',
    'distinct' => ':attribute field has a duplicate value.',
    'email' => ':attribute không đúng định dạng.',
    'ends_with' => ':attribute must end with one of the following: :values.',
    'exists' => 'selected :attribute is invalid.',
    'file' => ':attribute không đúng định dạng file.',
    'filled' => ':attribute field must have a value.',
    'gt' => [
        'numeric' => ':attribute phải lớn hơn :value.',
        'file' => ':attribute phải lớn hơn :value kilobytes.',
        'string' => ':attribute phải lớn hơn :value ký tự.',
        'array' => ':attribute phải lớn hơn :value items.',
    ],
    'gte' => [
        'numeric' => ':attribute phải lớn hơn hoặc bằng :value.',
        'file' => ':attribute phải lớn hơn hoặc bằng :value kilobytes.',
        'string' => ':attribute phải lớn hơn hoặc bằng :value ký tự.',
        'array' => ':attribute must have :value items or more.',
    ],
    'image' => ':attribute phải là hình ảnh.',
    'in' => ':attribute không khớp.',
    'in_array' => ':attribute không tồn tại trong :other.',
    'integer' => ':attribute phải là kiểu số.',
    'ip' => ':attribute phải là địa chỉ IP.',
    'ipv4' => ':attribute phải là địa chỉ IPv4.',
    'ipv6' => ':attribute phải là địa chỉ IPv6.',
    'json' => ':attribute phải là kiểu JSON.',
    'lt' => [
        'numeric' => ':attribute phải bé hơn :value.',
        'file' => ':attribute phải bé hơn :value kilobytes.',
        'string' => ':attribute phải bé hơn :value ký tự.',
        'array' => ':attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => ':attribute phải bé hơn hoặc bằng :value.',
        'file' => ':attribute phải bé hơn hoặc bằng :value kilobytes.',
        'string' => ':attribute phải bé hơn hoặc bằng :value ký tự.',
        'array' => ':attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => ':attribute không được lớn hơn :max.',
        'file' => ':attribute không được lớn hơn :max kilobytes.',
        'string' => ':attribute không được lớn hơn :max ký tự.',
        'array' => ':attribute may not have more than :max items.',
    ],
    'mimes' => ':attribute phải là file dạng: :values.',
    'mimetypes' => ':attribute phải là file dạng: :values.',
    'min' => [
        'numeric' => ':attribute phải tối thiểu :min.',
        'file' => ':attribute phải tối thiểu :min kilobytes.',
        'string' => ':attribute phải tối thiểu :min ký tự.',
        'array' => ':attribute must have at least :min items.',
    ],
    'not_in' => ':attribute không hợp lệ.',
    'not_regex' => ':attribute format is invalid.',
    'numeric' => ':attribute phải là kiểu số.',
    'password' => 'Sai mật khẩu.',
    'present' => ':attribute field phải là present.',
    'regex' => ':attribute format is invalid.',
    'required' => ':attribute không được để trống.',
    'required_if' => ':attribute field is required when :other is :value.',
    'required_unless' => ':attribute field is required unless :other is in :values.',
    'required_with' => ':attribute field is required when :values is present.',
    'required_with_all' => ':attribute field is required when :values are present.',
    'required_without' => ':attribute field is required when :values is not present.',
    'required_without_all' => ':attribute field is required when none of :values are present.',
    'same' => ':attribute và :other phải trùng khớp.',
    'size' => [
        'numeric' => ':attribute phải là :size.',
        'file' => ':attribute phải là :size kilobytes.',
        'string' => ':attribute phải là :size ký tự.',
        'array' => ':attribute must contain :size items.',
    ],
    'starts_with' => ':attribute phải bắt đầu bằng: :values.',
    'string' => ':attribute phải là chuỗi ký tự.',
    'timezone' => ':attribute phải là timezone.',
    'unique' => ':attribute đã tồn tại.',
    'uploaded' => ':attribute đã tồn tại.',
    'url' => ':attribute không đúng định dạng.',
    'uuid' => ':attribute phải là a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
     */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
     */

    'attributes' => [
        'email' => 'Email',
        'username' => 'Tên đăng nhập',
        'password' => 'Mật khẩu',
        'name' => 'Tên',
        'avatar' => 'Ảnh đại diện',
        'short_description' => 'Mô tả ngắn',
        'short_description' => 'Mô tả chi tiết',
        'status' => 'Trạng thái',
        'slug' => 'Slug',
    ],
];
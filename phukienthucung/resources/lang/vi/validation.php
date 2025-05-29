<?php

return [
    'required' => 'Trường :attribute là bắt buộc.',
    'email' => 'Trường :attribute phải là địa chỉ email hợp lệ.',
    'confirmed' => 'Xác nhận :attribute không khớp.',
    'min' => [
        'string' => 'Trường :attribute phải có ít nhất :min ký tự.',
        'numeric' => 'Trường :attribute phải lớn hơn hoặc bằng :min.',
    ],
    'max' => [
        'string' => 'Trường :attribute không được vượt quá :max ký tự.',
        'numeric' => 'Trường :attribute không được lớn hơn :max.',
    ],
    'unique' => 'Trường :attribute đã được sử dụng.',
    'numeric' => 'Trường :attribute phải là số.',
    'integer' => 'Trường :attribute phải là số nguyên.',
    'digits' => 'Trường :attribute phải gồm :digits chữ số.',
    'date' => 'Trường :attribute phải là ngày hợp lệ.',
    'exists' => 'Giá trị được chọn cho :attribute không hợp lệ.',
    'in' => 'Giá trị được chọn cho :attribute không hợp lệ.',
    'same' => 'Trường :attribute và :other phải giống nhau.',
    'regex' => 'Định dạng :attribute không hợp lệ.',

    'attributes' => [
        'name' => 'họ tên',
        'email' => 'email',
        'password' => 'mật khẩu',
        'password_confirmation' => 'xác nhận mật khẩu',
        'phone' => 'số điện thoại',
        'cccd' => 'căn cước công dân',
        'birth_date' => 'ngày sinh',
        'start_date' => 'ngày bắt đầu',
        'address' => 'địa chỉ',
        'group' => 'nhóm người dùng',
    ],
];

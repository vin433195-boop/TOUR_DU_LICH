<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookHotelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'bh_name'         => 'required|max:191',
            'bh_email'        => 'required|email|max:191',
            'bh_phone'        => 'required',
            'bh_address'      => 'required',
            'bh_check_in'     => 'required|date',
            'bh_check_out'    => 'required|date|after:bh_check_in',
            'bh_number_rooms' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'bh_name.required'         => 'Vui lòng nhập họ tên',
            'bh_email.required'        => 'Vui lòng nhập email',
            'bh_email.email'           => 'Email không hợp lệ',
            'bh_phone.required'        => 'Vui lòng nhập số điện thoại',
            'bh_address.required'      => 'Vui lòng nhập địa chỉ',
            'bh_check_in.required'     => 'Vui lòng chọn ngày nhận phòng',
            'bh_check_in.date'         => 'Ngày nhận phòng không hợp lệ',
            'bh_check_out.required'    => 'Vui lòng chọn ngày trả phòng',
            'bh_check_out.date'        => 'Ngày trả phòng không hợp lệ',
            'bh_check_out.after'       => 'Ngày trả phòng phải sau ngày nhận phòng',
            'bh_number_rooms.required' => 'Vui lòng nhập số phòng',
            'bh_number_rooms.min'      => 'Số phòng phải ít nhất là 1',
        ];
    }
}

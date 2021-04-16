<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSubscribeRequest extends FormRequest
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
            'email' => 'required|email|max:255|exists:users'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Vui lòng không bỏ trống',
            'email' => 'Định dạng không hợp lệ',
            'max' => 'Tối đa 255 ký tự',
            'exists' => 'Email chưa đăng ký tài khoản',
        ];
    }
}

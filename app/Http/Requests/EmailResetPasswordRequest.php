<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailResetPasswordRequest extends FormRequest
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
            'email' => [
                'bail',
                'required',
                'max:255',
                'email',
                'exists:users',
            ],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Vui lòng không bỏ trống',
            'max' => 'Độ dài tối đa 255 kí tự',
            'email' => 'Vui lòng điền đúng định dạng e-mail',
            'exists' => 'E-mail chưa được đăng ký',
        ];
    }
}

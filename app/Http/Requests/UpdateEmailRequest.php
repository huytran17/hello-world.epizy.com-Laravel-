<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\View;
use App\Rules\CheckPassword;

class UpdateEmailRequest extends FormRequest
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
            'email' => ['required', 'email', 'max:255', 
                Rule::unique('users')->where(function($query) {
                    $query->where([
                        ['id', '!=', $this->id],
                    ]);
                })],
            'password' => ['required', new CheckPassword],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Vui lòng không bỏ trống',
            'email' => 'Định dạng không hợp lệ',
            'email.max' => 'Tối đa 255 ký tự',
            'unique' => 'Email đã tồn tại',
            'string' => 'Định dạng không hợp lệ',
            'password.min' => 'Mật khẩu tối thiểu 8 ký tự',
            'password.max' => 'Mật khẩu tối đa 32 ký tự',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->axios([
                'error' => true,
                'toast_notice' => View::make('client.toast', ['content' => $validator->errors()->first()])->render(),
            ])
        );
    }
}

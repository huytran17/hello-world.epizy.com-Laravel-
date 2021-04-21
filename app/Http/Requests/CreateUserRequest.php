<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\View;
use App\Rules\CheckRetypePassword;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|string|max:50|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|max:32',
            'repass' => ['required','string',new CheckRetypePassword($this->password)]
        ];
    }

    public function messages()
    {
        return [
            'required' =>  'Vui lòng không bỏ trống',
            'name.string' => 'Tên tài khoản không đúng định dạng',
            'email' => 'Email không đúng định dạng',
            'name.max'=> 'Tên tài khoản tối đa 50 ký tự',
            'password.string' => 'Mật khẩu không đúng định dạng',
            'password.min'=> 'Mật khẩu tối thiểu 8 ký tự',
            'password.max'=> 'Mật khẩu tối đa 32 ký tự'
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

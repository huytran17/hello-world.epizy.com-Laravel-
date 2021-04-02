<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;

use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Support\Facades\View;

use App\Rule\CheckRetypePassword;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'password' => 'required|min:8|max:32',
            'repass' => ['required','string',new CheckRetypePassword($this->password)]
        ];
    }

    public function messages()
    {
        return [
            'required' =>  'Vui lòng nhập đầy đủ thông tin',
            'string' => 'Định dạng không đúng. Vui lòng kiểm tra lại',
            'email' => 'Email không hợp lệ',
            'min'=> 'Độ dài mật khẩu trong khoảng 8-32 ký tự',
            'max.name'=> 'Độ dài tên nhiều nhất 50 ký tự',
            'max.password'=> 'Độ dài mật khẩu trong khoảng 8-32 ký tự'
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

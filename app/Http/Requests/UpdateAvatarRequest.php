<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAvatarRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:users',
            'profile_photo_path' => 'file|mimes:jpeg,jpg,png,webp,gif|max:1024'
        ];
    }

    public function messages()
    {
        return [
            'required' =>  'Vui lòng không bỏ trống',
            'string' => 'Định dạng không đúng',
            'max.name' => 'Tối đa 255 ký tự',
            'file' => 'Định dạng không đúng',
            'mimes' => 'Cho phép ảnh jpeg,jpg,png,webp,gif',
            'max.profile_photo_path' => 'Kích thước tối đa 1MB'
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

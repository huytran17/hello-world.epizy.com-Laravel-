<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'title' => 'required|string:max:255',
            'description' => 'required|string|max:255',
            'thumbnail_photo_path' => 'file|mimes:jpeg,jpg,png,webp'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Vui lòng không bỏ trống',
            'string' => 'Định dạng không hợp lệ',
            'max' => 'Tối đa 255 kí tự',
            'file' => 'File không hợp lệ',
            'mimes' => 'Cho phép định dạng jpeg,png,webp,jpg',
            'max.thumbnail_photo_path' => 'Kích thước tối đa 1MB'
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

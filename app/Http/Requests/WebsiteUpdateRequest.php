<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\View;

class WebsiteUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'title' => 'requied|string|max:255',
            'description' => 'required|string|max:255',
            'keywords' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'logo_photo_path' => 'file|mimes:jpeg,jpg,png,webp|max:1024',
            'shortcut_photo_path' => 'file|mimes:jpeg,jpg,png,webp|max:1024',
            'favicon_photo_path' => 'file|mimes:jpeg,jpg,png,webp|max:1024',
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
            'max.logo_photo_path' => 'Kích thước tối đa 1MB',
            'max.shortcut_photo_path' => 'Kích thước tối đa 1MB',
            'max.favicon_photo_path' => 'Kích thước tối đa 1MB'
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

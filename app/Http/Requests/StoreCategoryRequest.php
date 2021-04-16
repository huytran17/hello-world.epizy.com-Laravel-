<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\View;

class StoreCategoryRequest extends FormRequest
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
            'title' => 'bail|required|string|max:255|unique:categories',
            'description' => 'bail|required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng không bỏ trống tiêu đề',
            'description.required' => 'Vui lòng không bỏ trống mô tả',
            'string' => 'Định dạng không hợp lệ',
            'max' => 'Tối đa 255 kí tự',
            'unique' => 'Tiêu đề đã tồn tại'
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

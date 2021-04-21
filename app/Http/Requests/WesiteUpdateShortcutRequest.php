<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WesiteUpdateShortcutRequest extends FormRequest
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
            'shortcut' => ['bail', 'required', 'mimes:jpeg,jpg,png,webp,gif', 'max:1024']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Vui lòng không bỏ trống',
            'mimes' => 'Cho phép định dạng jpeg,jpg,png,webp,gif',
            'max' => 'Kích thước tối đa 1MB'
        ];
    }
}

<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'abbr' => 'required|string|max:10',
            'active' => 'in:0,1',
            'direction' => 'required|in:rtl,ltr',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب ادخاله',
            'in' => 'القيم المدخله غير صحيحه ',
            'name.string' => 'هذا الحقل لابد وأن يكون أحرف ',
            'abbr.string' => 'هذا الحقل لابد وأن يكون أحرف ',
            'name.max' => 'هذا الحقل يجب أن لايزيد عن 100 حرف',
            'abbr.max' => 'هذا الحقل يجب أن لايزيد عن 10 حرف',
        ];
    }
}

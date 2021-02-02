<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ' required|email',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => '.البريد الالكتروني مطلوب',
            'email.email' => '.ادخل بريد اليكتروني صحيح',
            'password.required' => '.كلمة المرور مطلوبة ',
        ];
    }
}

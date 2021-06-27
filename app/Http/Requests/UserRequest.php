<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|min:9',
            'email' => 'required|unique:users',
            'phone' => 'required',
            'password' => 'required|confirmed',
            'image' => 'required|mimes:png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'الإسم مطلوب',
            'email.required' => 'الإيميل مطلوب',
            'email.unique' => 'الإيميل موجود',
            'phone.required' => 'الهاتف مطلوب',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.confirmed' => 'كلمة المرور غير متطابقة',
            'image.required' => 'الصورة مطلوبة',
            'image.mimes' => 'الصورة غير مدعومة',
        ];
    }
}

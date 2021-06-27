<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required|min:9',
            'image' => 'required|mimes:png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'العنوان مطلوب',
            'description.required' => 'النبذة مطلوب',
            'image.required' => 'الصورة مطلوبة',
            'description.min' => 'يرجى كتابة 10 كلمات على الأقل',
            'image.mimes' => 'الصورة غير مدعومة',
        ];
    }
}

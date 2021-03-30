<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ADMIN_VALIDATE_LOGIN extends FormRequest
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
            'email'                => 'required|email',
            'password'             => 'required|min:6',
            'g-recaptcha-response' => ['required', new \App\Rules\ValidRecaptcha]
        ];
    }

    public function messages(){
        return [
            'email.required'                => 'email phải được nhập',
            'email.email'                   => 'email không phải là định dạng email',
            'password.required'             => 'password phải được nhập',
            'password.min'                  => 'password phải chứa ít nhất 6 kí tự',
            'g-recaptcha-response.required' => 'chưa xác minh được recapcha',
            
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CLIENT_VALIDATE_ADVISORY extends FormRequest
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
            'mobile'               => 'required|numeric',
            'message'              => 'required',
            'g-recaptcha-response' => ['required', new \App\Rules\ValidRecaptcha]
        ];
    }

    public function messages(){
        return [
            'email.required'  => ':attribute phải được nhập',
            'email.email'     => ':attribute định dạng không đúng',
            'mobile.required' => ':attribute phải được nhập',
            'mobile.numeric'   => ':attribute  phải là số',
            'message.required' => ':attribute phải được nhập',
            'g-recaptcha-response.required' => 'chưa nhập recapcha'
        ];
    }
}

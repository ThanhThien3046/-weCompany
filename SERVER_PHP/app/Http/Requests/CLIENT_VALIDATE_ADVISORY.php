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
            'email.required'  => ':属性が入力してください',
            'email.email'     => ':属性の形式が正しくありません',
            'mobile.required' => ':属性が入力してください',
            'mobile.numeric'   => ':属性は数値でなければなりません',
            'message.required' => ':属性が入力してください',
            'g-recaptcha-response.required' => 'recapchaを入力してください'
        ];
    }
}

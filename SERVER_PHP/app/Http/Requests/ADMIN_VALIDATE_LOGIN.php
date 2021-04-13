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
            // 'email.required'                => 'メールを入力してください',
            // 'email.email'                   => 'メールが正しい形式ではありません',
            // 'password.required'             => 'パスワードを入力してください',
            // 'password.min'                  => 'パスワードは6文字以上である必要があります',
            // 'g-recaptcha-response.required' => 'recapchaがまだ検証しませんでした',
            
        ];
    }
}

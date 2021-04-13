<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CLIENT_VALIDATE_CONTACT extends FormRequest
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
            'first_name' => 'required|max:150',
            'last_name'  => 'required|max:150',
            'email'      => 'required|email',
            'mobile'     => 'numeric',
            'fax'        => 'max:150',
            'job_name'   => 'max:150',
            'company'    => 'max:150',
            "message"    => 'max:1500',
        ];
    }

    public function messages(){
        return [
            'first_name.required'           => ':属性を入力してください',
            'first_name.max'                => ':属性が最大文字数を超えています',
            'email.required'                => ':属性を入力してください',
            'email.email'                   => ':メール形式の属性が正しくありません',
            'mobile.required'               => ':属性 を入力してください',
            'mobile.numeric'                => ':属性は数でなければなりません',
            'g-recaptcha-response.required' => 'recapchaを入力してください'
        ];
    }
}

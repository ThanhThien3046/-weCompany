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
            'first_name.required'                 => ':属性を入力してください',
            'first_name.max'                      => ':attribute vượt quá :max kí tự',
            'email.required'                => ':属性を入力してください',
            'email.email'                   => ':属性 định dạng không đúng',
            'mobile.required'               => ':属性 を入力してください',
            'mobile.numeric'                => ':属性  phải là số',
            'g-recaptcha-response.required' => 'chưa nhập recapcha'
        ];
    }
}

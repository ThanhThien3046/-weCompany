<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ADMIN_VALIDATE_SAVE_USER extends FormRequest
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
            'name'     => 'required|max:150',
            'email'    => 'required|email',
            'avatar'   => 'required|max:510',
            'role_id'  => 'required|numeric',
            'contact'  => 'required|email',
        ];
    }

    public function messages(){
        return [
            'name.required'     => ':属性が入力してください',
            'name.max'          => ':属性が最大文字数を超えています',
            'email.required'    => ':属性が入力してください',
            'email.email'       => ':メール形式の属性が正しくありません',
            'email.unique'      => ':属性はすでに存在します',
            'avatar.required'   => ':属性が入力してください',
            'avatar.max'        => ':属性が最大文字数を超えています',
            'role_id.required'  => ':属性が入力してください',
            'role_id.numeric'   => ':属性は数でなければなりません',
            'contact.required'  => ':属性が入力してください',
            'contact.email'     => ':属性はメールフォーマットと正しくありません',
        ];
    }
}


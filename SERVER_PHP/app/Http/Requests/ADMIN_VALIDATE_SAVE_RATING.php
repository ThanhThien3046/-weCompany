<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ADMIN_VALIDATE_SAVE_RATING extends FormRequest
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
            'username' => 'required|max:150',
            'avatar'   => 'required|max:510'
        ];
    }

    public function messages(){
        return [
            'username.required'           => ':属性が入力してください',
            'username.max'                => ':属性が最大文字数を超えています',
            'avatar.required'            => ':属性が入力してください',
            'avatar.max'                 => ':属性が最大文字数を超えています',
        ];
    }
}

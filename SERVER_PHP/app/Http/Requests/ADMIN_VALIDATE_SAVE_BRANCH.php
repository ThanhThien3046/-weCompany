<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ADMIN_VALIDATE_SAVE_BRANCH extends FormRequest
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
            'title'       => 'required|max:150',
            'excerpt'     => 'max:255',
            'image'       => 'required|max:255',
            'banner'      => 'required|max:255',
            'description' => 'max:160',
            'color'       => 'required',
        ];
    }

    public function messages(){
        return [
            'title.required'   => ':attribute 属性が入力してください',
            'title.max'        => ':attribute 属性が最大文字数を超えています',
            'excerpt.required' => ':attribute 属性が入力してください',
            'excerpt.max'      => ':attribute 属性が最大文字数を超えています',
            'content.required' => ':attribute 属性が入力してください',
            'public.required'  => ':attribute 属性が入力してください',
            'image.required'   => ':attribute 属性が入力してください',
            'image.max'        => ':attribute 属性が最大文字数を超えています',
            'banner.required'  => ':attribute 属性が入力してください',
            'banner.max'       => ':attribute 属性が最大文字数を超えています',
            'description.max'  => ':attribute 属性が最大文字数を超えています',
        ];
    }
}

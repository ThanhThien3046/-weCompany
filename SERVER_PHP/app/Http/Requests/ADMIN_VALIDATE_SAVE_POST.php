<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ADMIN_VALIDATE_SAVE_POST extends FormRequest
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
            'slug'        => 'required|max:150',
            'excerpt'     => 'required|max:255',
            'content'     => 'required',
            'background'  => 'required|max:510',
            'thumbnail'   => 'required|max:510',
            'public'      => 'required',
            'topic_id'    => 'required',
            'rate_value'  => 'required',
            'site_name'   => 'required|max:150',
            'image'       => 'required|max:510',
            'description' => 'max:255',
            'type'        => 'required',
            'stylesheet'  => 'max:10000',
            'javascript'  => 'max:10000'
        ];
    }

    public function messages(){
        return [
            'title.required'      => ':属性が入力してください',
            'title.max'           => ':属性が最大文字数を超えています',
            'slug.required'       => ':属性が入力してください',
            'slug.max'            => ':属性が最大文字数を超えています',
            'excerpt.required'    => ':属性が入力してください',
            'excerpt.max'         => ':属性が最大文字数を超えています',
            'content.required'    => ':属性が入力してください',
            'background.required' => ':属性が入力してください',
            'background.max'      => ':属性が最大文字数を超えています',
            'thumbnail.required'  => ':属性が入力してください',
            'thumbnail.max'       => ':属性が最大文字数を超えています',
            'public.required'     => ':属性が入力してください',
            'topic_id.required'   => ':属性が入力してください',
            'rate_value.required' => ':属性が入力してください',
            'site_name.required'  => ':属性が入力してください',
            'site_name.max'       => ':属性が最大文字数を超えています',
            'image.required'      => ':属性が入力してください',
            'image.max'           => ':属性が最大文字数を超えています',
            'description.max'     => ':属性が最大文字数を超えています',
            'type.required'       => ':属性が入力してください',
            'stylesheet'          => ':属性が最大文字数を超えています',
            'javascript'          => ':属性が最大文字数を超えています',
        ];
    }
}

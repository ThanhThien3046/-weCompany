<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ADMIN_VALIDATE_SAVE_TOPIC extends FormRequest
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
            'site_name'   => 'required|max:150',
            'image'       => 'required|max:510',
            'description' => 'max:160',
        ];
    }

    public function messages(){
        return [
            'title.required'      => ':attribute phải được nhập',
            'title.max'           => ':attribute vượt quá :max kí tự',
            'slug.required'       => ':attribute phải được nhập',
            'slug.max'            => ':attribute vượt quá :max kí tự',
            'excerpt.required'    => ':attribute phải được nhập',
            'excerpt.max'         => ':attribute vượt quá :max kí tự',
            'content.required'    => ':attribute phải được nhập',
            'background.required' => ':attribute phải được nhập',
            'background.max'      => ':attribute vượt quá :max kí tự',
            'thumbnail.required'  => ':attribute phải được nhập',
            'thumbnail.max'       => ':attribute vượt quá :max kí tự',
            'public.required'     => ':attribute phải được nhập',
            'topic_id.required'   => ':attribute phải được nhập',
            'site_name.required'  => ':attribute phải được nhập',
            'site_name.max'       => ':attribute vượt quá :max kí tự',
            'image.required'      => ':attribute phải được nhập',
            'image.max'           => ':attribute vượt quá :max kí tự',
            'description.max'     => ':attribute vượt quá :max kí tự',
        ];
    }
}

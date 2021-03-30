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
            'name.required'     => ':attribute phải được nhập',
            'name.max'          => ':attribute vượt quá :max kí tự',
            'email.required'    => ':attribute phải được nhập',
            'email.email'       => ':attribute không đúng định dạng email',
            'email.unique'      => ':attribute đã tồn tại',
            'avatar.required'   => ':attribute phải được nhập',
            'avatar.max'        => ':attribute vượt quá :max kí tự',
            'role_id.required'  => ':attribute phải được nhập',
            'role_id.numeric'   => ':attribute phải là số',
            'contact.required'  => ':attribute phải được nhập',
            'contact.email'     => ':attribute không đúng định dạng email',
        ];
    }
}


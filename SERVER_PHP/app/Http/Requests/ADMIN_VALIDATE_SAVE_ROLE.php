<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ADMIN_VALIDATE_SAVE_ROLE extends FormRequest
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
            'name' => 'required|max:150',
            'type' => 'required|in:user,admin',
        ];
    }

    public function messages(){
        return [
            'name.required' => ':attribute phải được nhập',
            'name.max'      => ':attribute vượt quá :max kí tự',
            'type.required' => ':attribute phải được nhập',
            'type.in'       => ':attribute không đúng định dạng',
        ];
    }
}

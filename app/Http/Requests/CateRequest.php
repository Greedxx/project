<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateRequest extends FormRequest
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
            //
            'cname' => 'required|regex:/^[\x{4e00}-\x{9fa5}]+$/u'
        ];
    }

    public function messages()
    {
        return [
            'cname.required'=> '填写不能为空',
            'cname.regex'=> '请填写中文'
        ];
    }
}

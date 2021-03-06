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
            'cate_name' => 'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_\-]{1,12}$/u'
        ];
    }

    public function messages()
    {
        return [
            'cate_name.required'=> '填写不能为空',
            'cate_name.regex'=> '格式不匹配'
        ];
    }
}

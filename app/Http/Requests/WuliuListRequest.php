<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WuliuListRequest extends FormRequest
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
            'cangshang'=>'required|regex:/^[\x{4e00}-\x{9fa5}]+$/u',
            'dingdan'=>'required|regex:/\d{10,13}/'
        ];
    }

    public function messages()
    {
        return [
            'cangshang.required'=>'厂商不能为空',
            'cangshang.regex'=>'请填写中文',
            'dingdan.required'=>'填写不能为空',
            'dingdan.regex'=>'请填写10-13位订单号'
        ];
    }
}

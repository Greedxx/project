<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
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
        return  [
            'name'  => 'required|string|between:1,20',
            'title' => 'required|string|between:1,50',
            'editor' => 'required|string|between:1,20',
            'keywords' => 'required|string|between:1,10',
            'desc' => 'required|string|between:1,100',
        ];
        
    }
    public function messages()
    {
         return   [
             'name.required'=>'内容小标 不能为空',
             'name.string'=>'内容小标 不能为空',
             'name.between'=>'内容小标 1-20个字符',
             'title.required'=>'标题 不能为空',
             'title.string'=>'标题 提交类型不对',
             'title.between'=>'标题 1-50个字符',
             'editor.required'=>'编辑 不能为空',
             'editor.string'=>'编辑 1-20个字符',
             'editor.between'=>'编辑 不能为空',
             'keywords.string'=>'关键字 提交类型不对',
             'keywords.required'=>'关键字 不能为空',
             'keywords.between'=>'关键字 1-10个字符',
             'desc.required'=>'文章描述 不能为空',
             'desc.string'=>'文章描述 提交类型不对',
             'desc.between'=>'文章描述 1-个字符',
        ];
    }
}

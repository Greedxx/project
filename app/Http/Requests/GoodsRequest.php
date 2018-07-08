<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodsRequest extends FormRequest
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
            'cate_name' =>'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]{1,18}$/u',
            'goods_name' =>'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]{1,20}$/u',
            'status'=>'boolean',
            'size' =>'required|max:60|regex:/^([\x{4e00}-\x{9fa5}A-Za-z0-9_]+,)*([\x{4e00}-\x{9fa5}A-Za-z0-9_]+)$/u',
            'color' =>'required|max:60|regex:/^([\x{4e00}-\x{9fa5}A-Za-z0-9_]+,)*([\x{4e00}-\x{9fa5}A-Za-z0-9_]+)$/u',
            'type' =>'required|max:32|regex:/^([\x{4e00}-\x{9fa5}A-Za-z0-9_\-]+,?)*([\x{4e00}-\x{9fa5}A-Za-z0-9_\-]+)$/u',
            'memory' =>'required|max:32|regex:/^([\x{4e00}-\x{9fa5}A-Za-z0-9_]+,?)*([\x{4e00}-\x{9fa5}A-Za-z0-9_]+)$/u',
            'count' =>'required|max:11|regex:/^([0-9]+)$/u',
            'price' =>'required|max:11|regex:/^([0-9]+)(\.([0-9]{1,2}))?$/u',
            'desc' =>'required|max:100|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u',

        ];
        
    }
    public function messages()
    {
         return   [
             'cate_name.required'=>'分类名不能为空',
             'cate_name.regex'=>'分类名格式不正确',
             'goods_name.required'=>'商品名不能为空',
             'goods_name.regex'=>'商品名格式不正:确字母数字下划线20个以内',
             'status.boolean'=>'状态 格式不正确',
             'size.required'=>'尺寸 不能为空',
             'size.max'=>'尺寸 超过最大值', 
             'size.regex'=>'尺寸 格式不正确 请,分隔',
             'color.required'=>'颜色 不能为空',
             'color.max'=>'颜色 超过最大值', 
             'color.regex'=>'颜色 格式不正确 请,分隔',
             'type.required'=>'类型 不能为空',
             'type.max'=>'尺寸超过最大值', 
             'type.regex'=>'格式不正确请,分隔',
             'memory.required'=>'内存 不能为空',
             'memory.max'=>'内存 最多60个字符', 
             'memory.regex'=>'内存 格式不正确请,分隔',
             'count.required'=>'库存不能为空',
             'count.max'=>'库存 最多11个字符', 
             'count.regex'=>'库存请输入数字',
             'desc.required'=>'描述 不能为空',
             'desc.max'=>'描述 最多11个字符', 
             'desc.regex'=>'描述 格式不正确',
             'price.required'=>'描述 不能为空',
             'price.max'=>'描述 最多11个字符', 
             'price.regex'=>'描述 格式不正确',
        ];
    }
}

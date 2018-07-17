<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodsImgRequest extends FormRequest
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
            'cate_id' =>'required|regex:/^\d{1,11}$/u',
            'goods_name' =>'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]{1,20}$/u',
            'status'=>'boolean',
            'size' =>'required|max:60|regex:/^([\x{4e00}-\x{9fa5}A-Za-z0-9_\.]+,)*([\x{4e00}-\x{9fa5}A-Za-z0-9_\.]+)$/u',
            'color' =>'required|max:60|regex:/^([\x{4e00}-\x{9fa5}A-Za-z0-9_]+,)*([\x{4e00}-\x{9fa5}A-Za-z0-9_]+)$/u',
            'type' =>'required|max:32|regex:/^([\x{4e00}-\x{9fa5}A-Za-z0-9_\-]+,?)*([\x{4e00}-\x{9fa5}A-Za-z0-9_\-]+)$/u',
            'memory' =>'required|max:32|regex:/^([\x{4e00}-\x{9fa5}A-Za-z0-9_\+]+,?)*([\x{4e00}-\x{9fa5}A-Za-z0-9_\+]+)$/u',
            'count' =>'required|max:11|regex:/^([0-9]+)$/u',
            'price' =>'required|max:11|regex:/^([0-9]+)(\.([0-9]{1,2}))?$/u',
            'desc' =>'required|max:100|string',
            'thumb'=>'filled|image|file',

        ];
        
    }
    public function messages()
    {
         return   [
             'cate_id.required'=>'@分类 没有选择',
             'cate_id.regex'=>'@分类 验证不通过',
             'goods_name.required'=>'@商品名称  不能为空',
             'goods_name.regex'=>'@商品名称 格式不正:确字母数字下划线20个以内',
             'status.boolean'=>'@状态 信息不对',
             'size.required'=>'@商品尺寸 不能为空',
             'size.max'=>'@商品尺寸  输入内容过多', 
             'size.regex'=>'@商品尺寸 格式不正确 请,分隔 aa,bb,cc',
             'color.required'=>'@颜色 不能为空',
             'color.max'=>'@颜色  输入内容过多', 
             'color.regex'=>'@颜色 格式不正确 请,分隔',
             'type.required'=>'@商品型号  不能为空',
             'type.max'=>'@商品型号  输入内容过多', 
             'type.regex'=>'@商品型号 格式不正确请,分隔',
             'memory.required'=>'@内存大小 不能为空',
             'memory.max'=>'@内存大小 输入内容过多最多60个字符', 
             'memory.regex'=>'@内存大小 格式不正确请,分隔',
             'count.required'=>'@商品总数不能为空',
             'count.max'=>'@商品总数 输入内容过多最多11个字符', 
             'count.regex'=>'@商品总数请输入数字',
             'desc.required'=>'@商品描述 不能为空',
             'desc.max'=>'@商品描述 输入内容过多最多11个字符', 
             'desc.string'=>'@商品描述 格式不正确',
             'price.required'=>'@商品价格 不能为空',
             'price.max'=>'@商品价格 输入内容过多', 
             'price.regex'=>'@商品价格 必须数值',

             'thumb.filled'=>'@缩略图 必须上传', 
             'thumb.image'=>'@缩略图上传缩略图必须是图片格式', 
             'thumb.file'=>'@缩略图 必须是完整文件',
        ];
    }
}

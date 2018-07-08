<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    /**
    * 
    *
    *   content表
    */ 
    protected $table = 'content';
    protected $primaryKey = 'id';
    public $timestamps = true;
    
    /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];

    /**
    * 可被批量赋值的属性
    *
    * @var 
    */ 
    // protected $fillable = [];
    
    /**
     * 模型的日期字段
      *
      * @var string
      */ 
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * 模型的日期字段保存格式。
     *
     * @var string
     */
    protected $dateFormat = 'U';
}

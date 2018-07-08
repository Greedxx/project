<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsImg extends Model
{
    protected $table = 'goods_img';
    protected $primaryKey = 'id';
    protected $foreignKey = 'gid';
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
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * 模型的日期字段保存格式。
     *
     * @var string
     */
    protected $dateFormat = 'U';

    public function goods(){
         return $this->belongsTo('App\Models\Goods','gid','id');
    }
}

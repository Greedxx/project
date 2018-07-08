<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    /**
    * 
    *
    * @var 
    */ 
    protected $table = 'goods';
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
    // 
    // 
    //public $timestamps = false;

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function($model) {
    //         $dt = new DateTime;
    //         $model->created_at = $dt->format('m-d-y H:i:s');
    //         return true;
    //     });

    //     static::updating(function($model) {
    //         $dt = new DateTime;
    //         $model->updated_at = $dt->format('m-d-y H:i:s');
    //         return true;
    //     });
    // }

    /**
     * 模型的日期字段保存格式。
     *
     * @var string
     */
    protected $dateFormat = 'U';

    public function goodsimg()
    {
        return $this->hasMany('App\Models\GoodsImg','gid','id');
    }
}

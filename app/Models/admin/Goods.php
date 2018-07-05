<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goods';
    protected $primaryKey = 'goods_id';
    public $timestamps = false;
    /**
    * 可被批量赋值的属性
    *
    * @var 
    */ 
    protected $fillable = ['goods_id','cate_id','brand_id','goods_name','keywords','desc','status','price','created_at','update_at','thumb','count','sum','gpic_id','goods_size'];
}

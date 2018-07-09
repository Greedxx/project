<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goods';
    protected $primaryKey = 'id';
    public $timestamps = false;
    /**
    * 可被批量赋值的属性
    *
    * @var 
    */ 
   protected $guarded = [];

    public function order()
    {
    	return $this->hasMany('App\Models\admin\Orders', 'good_id','id');
    }

}

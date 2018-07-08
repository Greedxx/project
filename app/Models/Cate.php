<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $table = 'cate';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;
    /**
     * 可被批量赋值的属性
     *
     * @ 
     */ 
    protected $fillable = ['cate_name','pid','path','cate_id'];

    /**
     * 
     *
     * 一对多 关联
     */ 
    public function Goods(){
     return $this->hasMany('Goods','cate_id','id');
    }

    /**
     * 
     *
     * 无限极分类
     */ 
    static public function getCates($cates=[],$pid=0)
    {
        if(empty($cates)){
            $cates = self::get()->toArray();
        }
        $arr=[];
        foreach($cates as $k=>$v){
            if($v['pid']==$pid){
                $v['sub'] = self::getCates($cates,$v['cate_id']);
                $arr[]=$v;
            }
        }
        return $arr;    
    }
}

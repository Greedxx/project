<?php

namespace App\Models\home;

use Illuminate\Database\Eloquent\Model;

class Receive extends Model
{   
    protected $table = 'receive';
    protected $primaryKey = 'sid';
    public $timestamps = false;
    /**
    * 可被批量赋值的属性
    *
    * @var 
    */ 
    protected $fillable = ['uid','sname','area','address','code','phone']; 
}

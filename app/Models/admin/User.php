<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{   
    protected $table = 'user';
    protected $primaryKey = 'id';
    public $timestamps = false;
    /**
    * 可被批量赋值的属性
    *
    * @var 
    */ 
    public function order()
    {
    	return $this->hasOne('App\Models\admin\Orders', 'id');
    }


    protected $fillable = ['username','password','email','phone','profile','status'];
}

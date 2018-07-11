<?php

namespace App\Models\boos;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{   
    protected $table = 'admin';
    protected $primaryKey = 'aid';
    public $timestamps = false;
    /**
    * 可被批量赋值的属性
    *
    * @var 
    */ 
    protected $fillable = ['vname','password','buff'];
}

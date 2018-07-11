<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
	
    //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'links';

    protected $primaryKey = 'lid';

    public $timestamps = false;


    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['lid','lname','ltitle','url','lorder'];
}


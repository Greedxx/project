<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class WuliuList extends Model
{
    //
    protected $table = 'wuliulist';
    protected $primaryKey = 'id';


    public $timestamps = false;


	protected $fillable = ['cname','danhao','status'];
	
}

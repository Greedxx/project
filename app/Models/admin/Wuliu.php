<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Wuliu extends Model
{
    // 
    protected $table = 'wulius';
    protected $primaryKey = 'id';


    public $timestamps = false;


	protected $fillable = ['cname'];
}

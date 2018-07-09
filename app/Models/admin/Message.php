<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $table = 'message';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];
}



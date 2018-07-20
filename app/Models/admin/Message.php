<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $table = 'message';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $guarded = [];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dateFormat = 'U';

    public function user()
    {
        return $this->belongsTo('App\Models\admin\User','uid','id');
    }

    public function good()
    {
        return $this->belongsTo('App\Models\admin\Goods','gid','id');
    }

    public function users()
    {
        return $this->belongsMany('App\Models\admin\User','uid','id');
    }

    public function goods(){
        return $this->belongsMany('App\Models\admin\Goods','gid','id');
    }   

}



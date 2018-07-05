<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;


class Orders extends Model
{
    //
    protected $table = 'orders';
    protected $primaryKey = 'id';


    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\admin\User','user_id','id');
    }
    public function good()
    {
        return $this->hasOne('App\Models\admin\Goods','id','good_id');
    }

	protected $fillable = ['orders_id','user_id','good_id','price','num','addr','msg','create_time','status','wuliu_status'];
}

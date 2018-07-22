<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Models\home\Shoucang;
use App\Models\admin\Goods;
use App\Models\admin\Orders;
use App\Models\admin\Wuliulist;
use App \Models\admin\Message;



class PinglunController extends Controller
{
    public function pinglun()
    {	
    	$uid = session('userinfo.id');



        //评论关联查询

        // dd($uid);
        //查询该用户所有买过的商品去除重复后的商品信息
    	$gid = Orders::where('user_id',$uid)->with('wuliulist')->distinct()->get()->toArray();
        // dd($gid);
        //查询商品的所有信息 

    	$xinxi=[];

    	foreach($gid as $k =>$v)
    	{
            if(!empty($v['wuliulist']))
            {
            // dump($v);
                if($v['wuliulist']['status'] == 2){
            		$xinxi[$k] = Goods::where('id',$v['good_id'])->first()->toArray();
                    $xinxi[$k]['pinglun'] = Message::where('gid',$v['good_id'])->where('uid',$uid)->first();
                }
            }
            // dump($xinxi[$k]);
 		}

    	return view('home.user.pinglun',['title'=>'评论列表','xinxi'=>$xinxi]);
    }


}

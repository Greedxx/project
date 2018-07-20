<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Orders;
use App\Models\admin\WuliuList;

class OrderController extends Controller
{
    public function index(Request $request)
    {   
        $id = $request->id;
        $res = Orders::where('id',$id)
        ->with('user','good','wuliulist','addrs')->first();

        // dump($res);
    	return view('home.user.order',['title'=>'订单详情','res'=>$res]);
    }

    public function queren(Request $request)
    {   
        // 订单id
        $id = $request->id;

        // 物流id
        $wuliu_id = Orders::where('id',$id)->first()->wuliu_status;

        $data = WuliuList::where('id',$wuliu_id)->update(['status'=>2]);

        if($data){
            return back();
        }else{
            return back();
        }
        
        
    	
    }

}

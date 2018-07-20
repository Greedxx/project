<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Models\home\Receive;
use App\Models\admin\Orders;

class ShopCartController extends Controller
{
    //
    public function index()
    {
        return view('home.shopcart.index');
    }

    public function getdel(Request $request)
    {
        $id = $request->input('id');
        $arr = Session::get('cart');
        unset($arr[$id]);
        Session::put(['cart'=>$arr]);
    }

    public function getsdel(Request $request)
    {
        $ids = $request->input('ids');
         $arr = Session::get('cart');
        foreach ($ids as $k => $v){
           
            unset($arr[$v]);
            
        }
        Session::put(['cart'=>$arr]);
    }

    public function jsy(Request $request)
    {    
        $uid = session('userinfo')->id;

        $data = Receive::where('uid','=',$uid)->where('default','=',1)->first();

        if(!$data){
            return redirect('/home/receive');
        }

        return view('home.jsy.index',['data'=>$data]);
    }

    public function ordsuccess()
    {   

        $uid = session('userinfo')->id;
        $addr = Receive::where('uid','=',$uid)->where('default','=',1)->first()->sid;



       

        
        $sums = 0;
        $order_id = date('YmdHis',time()).rand(1,999);
        $create_time = time();

        foreach(session('cart') as $k=>$v){
            $sums += $v['sum'];

            $data['orders_id'] = $order_id;
            $data['user_id'] = $uid;
            $data['good_id'] = $v['gid'];
            $data['price'] = $v['price'];
            $data['num'] = $v['num'];
            $data['sum'] = $v['sum'];
            $data['addr'] = $addr;
            $data['status'] = '1';
            
            $data['wuliu_status'] = 0;
            $data['create_time'] = $create_time;
            // dd($data);
            try{
                Orders::create($data);
            }catch(\Exception $e){
                return back();
            }
          
        }
        session(['cart'=>null]);
        
        return view('home.jsy.ordsuccess',['sums'=>$sums,'order_id'=>$order_id]);
    }
    


}

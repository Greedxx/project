<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Models\home\Receive;

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

        return view('home.jsy.index',['data'=>$data]);
    }

    public function ordsuccess(Request $request)
    {
        echo 111;
    }
}

<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\home\Shoucang;
use App\Models\admin\Goods;



class KeepController extends Controller
{
    public function keep()
    {	
    	$uid = session('userinfo.id');
    	
    	$gid = Shoucang::select('gid')->where('uid',$uid)->get()->toArray();
    	// dd($gid);
    	$xinxi=[];
    	foreach($gid as $k =>$v)
    	{
    		$xinxi[] = Goods::where('id',$v)->first()->toArray();
 			
 		}
 		// dd($xinxi);
    	return view('home.user.keep',['title'=>'收藏列表','xinxi'=>$xinxi]);
    }


}

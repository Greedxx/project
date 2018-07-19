<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\home\Shoucang;
use App\Models\admin\Goods;



class PinglunController extends Controller
{
    public function pinglun()
    {	
   //  	$uid = session('userinfo.id');
    	
   //  	$gid = Shoucang::select('gid')->where('uid',$uid)->get()->toArray();
   //  	// dd($gid);
   //  	$xinxi=[];
   //  	foreach($gid as $k =>$v)
   //  	{
   //  		$xinxi[] = Goods::where('id',$v)->first()->toArray();
 			
 		// }
 		// // dd($xinxi);
    	return view('home.user.pinglun',['title'=>'评论列表']);
    }


}

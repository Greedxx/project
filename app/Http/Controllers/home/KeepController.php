<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\home\Shoucang;



class KeepController extends Controller
{
    public function keep()
    {	
    	$uid = session('userinfo.id');
    	// dd($uid);
    	
 		
    	return view('home.user.keep',['title'=>'收藏列表']);
    }


}

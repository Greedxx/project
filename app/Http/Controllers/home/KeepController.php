<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeepController extends Controller
{
    public function keep()
    {

    	return view('home.user.keep',['title'=>'收藏列表']);
    }
}

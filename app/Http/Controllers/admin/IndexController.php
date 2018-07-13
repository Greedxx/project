<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request){

        $require->input('keyword','');

        $arr =[];
        $arr['keyword']= '';

        return view('admin.index',['arr'=>$arr]);
    }
}

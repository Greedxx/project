<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Content;

class ServiceController extends Controller
{
    public function index(){

        $content=Content::where('type','1')->where('status','1')->orderBy('sort')->get();

        // dd($content);
        return view('home.service',['content'=>$content]);
    }
}

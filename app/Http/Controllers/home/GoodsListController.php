<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsListController extends Controller
{
    public function index(){

        return view('home.list');
    }
}

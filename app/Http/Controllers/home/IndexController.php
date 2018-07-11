<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cate;
use App\Models\Goods;

class IndexController extends Controller
{
    public function index()
    {

        // $data = App\Models\Cate::where('pid',0)->limit(5)->get(); 
        // $cate = App\Models\Cate::getCates();
        // dump($cate);
         
        //商品的查询1 热门商品 5
        // $data = Goods::orderBy('count','id')->limit(5)->get();
        // // dd($data);
        
        // //商品查询2  热销商品 top5
        // $data = Goods::orderBy('sum','id')->limit(5)->get();
        // dd($data);
        // //按照顶级分类查询出所有顶级分类的ID
        // $data = Cate::where('pid',0)->orderBy('id')->get();
        
        


        return view('home.index');
    }
}

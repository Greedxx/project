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

         
        //商品的查询1 热门商品 5
        $sale = Goods::orderBy('goods_name')->limit(4)->get();


        //商品查询2  热销商品 top5
        $top = Goods::orderBy('sum','id')->limit(5)->get();


        //商品查询3 按照顶级分类查询出所有顶级分类的ID

        $cate = Cate::where('pid',0)->orderBy('cate_id')->get();

        $cate_id =[];

        foreach ($cate as $k => $v) {
          $cate_id[] =  $v['cate_id'];
        }

        $goods =Cate::whereIn('cate_id',$cate_id)->with('goods')->get();

        return view('home.index',['title'=>'仙女商城','sale'=>$sale,'top'=>$top,'goods'=>$goods]);

    }
}

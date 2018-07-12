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
        


        //商品查询2  热销商品 top5
        $goodsale = Goods::orderBy('sum','id')->limit(5)->get();
        // dd($data);
        //按照顶级分类查询出所有顶级分类的ID
        $cate = Cate::where('pid',0)->orderBy('cate_id')->get();


        foreach ($cate as $k => $v) {
            $goods =Cate::find($v['cate_id'])->with('goods')->get();
        }

        /*// dd($cate);  非关联查询
        $goods=[];
        foreach($cate as $k =>$v)
        {
            dump($v['cate_id']);
            $goods[] = Goods::where('cate_id',$v['cate_id'])->get();
        }

        // dd($goods);*/

        

        return view('home.index',['title'=>'仙女商城','goods'=>$goods,'goodsale'=>$goodsale]);

    }
}

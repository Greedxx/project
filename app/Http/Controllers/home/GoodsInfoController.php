<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Cate;

class GoodsInfoController extends Controller
{
    /*  引用 App\Models\Cate 
     *  将获取父路径封装成函数
     */
    public function getPath($cid)
    {

        //父级路径
        $cateinfo = cate::where('cate_id',$cid)->first()->toArray();

        //获取父路径
        $path = $cateinfo['path'];


        //拆分父路径 获取id;
        $path = rtrim($path,',');

        $arrpath =[];

        //排除只有0,
        if(!empty($path)){

            $path=  explode(',',$path);

            foreach($path as $k => $v){

                if(!empty($v)){

                   $arrpath[]= cate::select('cate_id','cate_name')->where('cate_id',$v)->first()->toArray();

                }
            }

        }
        //返回arrpath
        return $arrpath;
    }

    //对象转数组
    function object_to_array($obj) {
        $obj = (array)$obj;
        foreach ($obj as $k => $v) {
            if (gettype($v) == 'resource') {
                return;
            }
            if (gettype($v) == 'object' || gettype($v) == 'array') {
                $obj[$k] = (array)($v);
            }
        }
        return $obj;
    }

    public function index($id ,Request $request){

        $aa = 0 ;
        $cart = [];
        if(isset($_COOKIE["cart"])){

            $tt=$_COOKIE['cart'];

            $values =  json_decode($tt);

            $aa=$values; 
        }

        // //调用对象变数组
        if(!empty($aa)){

            $cart=$this->object_to_array($aa);
            dump($cart);

        }
       
        

        $data = Goods::where('id',$id)->with('cate')->with('GoodsImg')->first();

        // dump($data['color']);

        $color = explode(',',$data['color']);

        $size = explode(',',$data['size'] );

        $memory = explode(',',$data['memory'] );

        // dump($memory);

        $arrpath = $this->getPath($data['cate']['cate_id']);

        return view('home.good',['data'=>$data,'color'=>$color,'size'=>$size ,'memory'=>$memory,'arrpath'=>$arrpath,'cart'=>$cart]);
    }

    public function cartadd(Request $request){


    }



}

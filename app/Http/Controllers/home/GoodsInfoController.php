<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Cate;
use App\Models\GoodsImg;
use App\Models\home\Shoucang;

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

        $values = null ;
        $cart = [];
        if(isset($_COOKIE["cart"])){

            $tt=$_COOKIE["cart"];

            $values =  json_decode($tt);

        }

        //调用对象变数组
        if(!empty($values)){
            $cart=$this->object_to_array($values);
            dump($cart);
        }
       
        $goodsimg = GoodsImg::where('gid',$id)->where('statu','1')->orderBy('sort')->get();
        
        $data = Goods::where('id',$id)->with('cate')->with('GoodsImg')->first();

        // dump($data['color']);

        $color = explode(',',$data['color']);

        $size = explode(',',$data['size'] );

        $memory = explode(',',$data['memory'] );

        // dump($memory);

        $arrpath = $this->getPath($data['cate']['cate_id']);

        dd(session('userinfo'));
        if ($request->session()->has('userinfo')){
            if(!empty(session('userinfo'))){
                $data['uid'] = $request->session()->get('userinfo.id');
                // dump($data['uid']);
                // dd($id);
                // dd($data);
                $a =  Shoucang::where('gid','=',$id)->where('uid','=',$data['uid'])->first();
                // dd($a);
                if(empty($a)){
                    $data['status']=1;
                }else{
                    $data['status']=2;
                }
            }else{
                $data['status']=0;
            }
        }else{
            $data['status']=0;
        }
        dd($data['status']);
        return view('home.good',['data'=>$data,'goodsimg'=>$goodsimg,'color'=>$color,'size'=>$size ,'memory'=>$memory,'arrpath'=>$arrpath,'cart'=>$cart]);
    }

    public function cartadd(Request $request){


        $id = $request->input('gid');
        //保存单条信息
        $data  = Goods::select('goods_no','goods_name','thumb','price')->where('id',$id)->first()->toArray();
        $data["gid"]   = (int)$request->input('gid');
        $data["num"]   = (int)$request->input('num');
        $data["color"] = $request->input('color');
        $data["size"]  = $request->input('size');
        $data["sum"]  =  (int)intval($request->input('num')) * (float)$data['price'];
        //定义数据变化状态
        $status = 0;

        //检测session是否存在
        if(!($request->session()->has('cart'))){    
            //完成整条保存
            $cart =[];
            $cart[] = $data;
            //保存session
            session(['cart' => $cart ]);
            $status = 1;

        } else{
            //若session 存在 读取session 
            $cart = session('cart');
            foreach($cart as $k =>$v){
                //如果有相同值 数量自动 相加
                if( ($v['gid']== $data['gid']) && ($v['color'] == $data['color']) && ($v['size']== $data['size'])){
                    $data['num']   = (int)$v['num']+(int)$data['num'];
                    $data['sum'] =  (int)$data['num']*(int)$data['price'];
                    unset($cart[$k]);
                    $cart[$k]=$data;
                    //只变更数量不添加
                    $status =2;
                }
            }
            //否侧数据直接添加
            if($status != 2 ){
                array_push($cart,$data);
                $status = 3;
            }
            //将数组重新存入session
            session(['cart'=>$cart]);

        }

        if($status){
            echo 1;
        }else{
            echo 2;
        }

    }

    public function cartdel(Request $request){

        $i = $request->input('i');
        //获取cookie中信息 
        if(\Session::has('cart')){
           $cart = session('cart');
        }
        // dd($cart);
        unset($cart[$i]); 

        session(['cart'=>$cart]);

        if(count($cart)>0)
        {
            echo 1;
        } else {
            echo 2;
        }

    }



}

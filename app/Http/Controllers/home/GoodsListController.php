<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Cate;
class GoodsListController extends Controller
{
    public function index(Request $request){


        /**
        *用于接收查询条件的数组
        */ 
        $arr=[];

        $id = $request->input('id',0);

        $arr['id'] = $id;


        $arr['keyword']='';

        /**
        *用于接收查询条件的数组
        */ 
        $cate=[];

        /**
        * 
        *用于存路径中各级信息
        */ 
        $arrpath=[];

        /**
        * 
        *存本级信息
        */ 
        $cateinfo=[];





        //查询分类的父路径
        if(!empty($id)){

            $cateinfo = cate::where('cate_id',$id)->first()->toArray();

            //获取父路径
            $path = $cateinfo['path'];


            //拆分父路径 获取id;
            $path = rtrim($path,',');

           
            //排除只有0,
            if(!empty($path)){

                $path=  explode(',',$path);

                foreach($path as $k => $v){

                    if(!empty($v)){

                       $arrpath[]= cate::select('cate_id','cate_name')->where('cate_id',$v)->first()->toArray();

                    }
                }
            }

        }else{
            $cateinfo['cate_id']=0;
            $cateinfo['cate_name']='已在顶级';
        }

        //用于排序
        $num = $request->input('sort','4');
        $arr['sort'] =$num;
        $num = (int)$num;

        switch ($num) {
            case 1:
                $sort = 'count';
                $asc = 'asc';
                break;
            case 2:
                $sort = 'created_at';
                $asc  = 'desc' ;
                break;
            case 3:
                $sort = 'price';
                $asc = 'asc';
                break;
            case 4:
                $sort = 'price';
                $asc = 'desc';
                break;
        };

            


       // if(!empty($id)){
            //查询子分类
           $cate=Cate::select('cate_id','cate_name')->where('path','like','%'.$id.',%')->get()->toArray();
            // dd($cate);

            // 子分类空直接查询期分类商品 不为查询子分类的商品一并查询
            if(empty($cate)){
                $good=Goods::where('cate_id',$id)->where(function($query) use($request){

                    $keyword=$request->input('keyword','');

                    if(!empty($keyword)){

                        $query->where('goods_name','like','%'.$keyword.'%');
                        $arr['keyword'] = $keyword;

                    }

                })->paginate(12);
                    // dump($goods);
            }else{
                $category_id[]=$id;
                
                foreach($cate as $k=>$v){

                    $category_id[]=$v['cate_id'];

                }

                // dd($category_id);
                $good=Goods::whereIn('cate_id',$category_id)->where('status',1)->where(function($query) use($request){

                    $keyword=$request->input('keyword','');

                        $query->where('goods_name','like','%'.$keyword.'%');
                        $arr['keyword'] = $keyword;


                })->orderBy($sort,$asc)->with('message')->paginate(12)->appends($request->all()); 

                dd($good);
            } 

            

        return view('home.list',['title'=>'仙女商城','good'=>$good,'cate'=>$cate,'arrpath'=>$arrpath,'cateinfo'=>$cateinfo,'arr'=>$arr]);
    }
}

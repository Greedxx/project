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
        * 
        *用于查询获取路径导航
        */ 
        $arrpath=[];


        if(!empty($request->input('id'))){
            $id = $request->input('id');
        }


        //查询分类的父路径
        if(!empty($id)){

            $cateinfo = cate::where('cate_id',$id)->first()->toArray();

            //获取父路径
            $path = $cateinfo['path'];


            //拆分父路径 获取id;
            $path = rtrim($path,',');

           
            //排除首页
            if(!empty($path)){

                $path=  explode(',',$path);

                foreach($path as $k => $v){

                    if(!empty($v)){

                       $arrpath[]= cate::select('cate_id','cate_name')->where('cate_id',$v)->first()->toArray();

                    }
                }
            }

        }
           
            $num = $request->input('sort','4');
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

            
        /**
        * 
        *查询获取数据
        */ 
       if(!empty($id)){
            //查询子分类
           $cate=Cate::select('cate_id','cate_name')->where('path','like','%,'.$id.',%')->get()->toArray();
            //dd($cate_id);
            // 子分类空直接查询期分类商品 不为查询子分类的商品一并查询
            if(empty($cate)){
                    $good=Goods::where('cate_id',$id)->paginate(12);
                    // dump($goods);
            }else{
                $category_id[]=$id;
                
                foreach($cate as $k=>$v){

                    $category_id[]=$v['cate_id'];

                }

                // dd($category_id);
                $good=Goods::whereIn('cate_id',$category_id)->where(function($query) use($request){

                    $gname=$request->input('gname');

                    if(!empty($gname)){

                        $query->where('gname','like','%'.$gname.'%');

                    }

                })->orderBy($sort,$asc)->paginate(12)->appends($request->all()); 
            } 

       }else{

            $good=Goods::where(function($query) use($request){

                    $gname=$request->input('gname');

                    if(!empty($gname)){

                        $query->where('gname','like','%'.$gname.'%');

                    }

            })->paginate(12); 
       }


       // dd($arrpath);

        return view('home.list',['title'=>'仙女商城','good'=>$good,'cate'=>$cate,'arrpath'=>$arrpath,'cateinfo'=>$cateinfo]);
    }
}

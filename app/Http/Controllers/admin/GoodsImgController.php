<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\GoodsImg;

class GoodsImgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($gid,Request $req)
    {
        
        //取图片组商品 传递图片名称
        
        $gname = Goods::select('goods_name')->where('id',$gid)->first();


        //传递  @gid 下图片信息

        $arr =[];

        $data = GoodsImg::where(function($query) use($req){


            $search = $req->input('search','');

            // $query->where('gid','=',$gid);

            $query->where('src','like','%'.$search.'%');

        })->where('gid','=',$gid)->paginate($req->input('num',10));

            
        $arr['num'] = $req->input('num');

        $arr['search']= $req->input('search');

        // dd($gname);
        
        // dd($data);
        
        return view('admin.goodsimg.index',['title'=>'图片组列表','gname'=>$gname,'data'=>$data,'arr'=>$arr,'gid'=>$gid]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($gid)
    {
        //取图片组商品 传递图片名称
        $gname = Goods::select('goods_name')->where('id',$gid)->first();


        return view('admin.goodsimg.add',['title'=>'编辑图片','gname'=>$gname,'gid'=>$gid]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($gid,Request $request)
    {

        //获取表单
        $res = $request->except(['_token','src']);
        // dd($res);

        //上传图片
        if($request->hasFile('src')){

            //设置名字
            $name = date('Ymd').str_random(10).time();

            //获取后缀
            $suffix = $request->file('src')->getClientOriginalExtension();

            //移动
             $request->file('src')->move('./updata/',$name.'.'.$suffix);
              //存数据表
            $res['src'] = '/updata/'.$name.'.'.$suffix;
        }
        try {

            $data = GoodsImg::where('gid',$gid)->create($res);

             // dd($data);

            //关联更新

            if($data){

                // try {
                    $sort = GoodsImg::where('id',$data->id)->update(['sort'=>$data->id]);
                if($sort){

                    return redirect('/admin/goodsimg/'.$gid.'/guan')->with('success','添加成功');
                }
                else{
                // } catch (Exception $e) {
                    
                    return back();
                }

            }

        } catch (Exception $e) {
               
            return back();
        }
       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($gid,$id)
    {
        /**
         * 这是一串文本
         * 
         * @id 外键值  @gid 图片组第一张图片值 需注意 
         */  

        
        //获取单张图片id
        $data=GoodsImg::where('id',$id)->first();
         // dd($data);
        // echo $gid;
        return view('admin.goodsimg.edit',['title'=>'修改图片','gid'=>$gid,'id'=>$id,'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $gid ,$id)
    {

         $res = $request->except('_token','_method','src');
         // dd($res);
         //src获取
          if($request->hasFile('src')){

            //设置名字
            $name = date('Ymd').str_random(10).time();

            //获取后缀
            $suffix = $request->file('src')->getClientOriginalExtension();

            //移动
             $request->file('src')->move('./updata/',$name.'.'.$suffix);
              //存数据表
            $res['src'] = '/updata/'.$name.'.'.$suffix;
            }else{
                $data = GoodsImg::where('id',$id)->first();
                // dd($data);
                 $res['src'] = $data['src'] ;
            }

            // dd($res);

        //插入更新
         try{
            $data =GoodsImg::where('id',$id)->update($res);

        }catch(\Exception $e){

            return back();

        }

        if($data){
            return redirect('/admin/goodsimg/'.$gid.'/guan')->with('success','更新成功');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($gid,$id)
    {
        try {
            $aa = GoodsImg::where('id',$id)->first();
            // dd($aa);

               // dd($aa['src']);
            @unlink('.'.$aa['src']);
            // die();
            $data= GoodsImg::where('id',$id)->delete();

            if($data){
                return redirect('/admin/goodsimg/'.$gid.'/guan')->with('success','删除成功');
            }

        } catch (Exception $e) {
            return back();
        }
        
    }
}

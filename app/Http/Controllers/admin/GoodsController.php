<?php

namespace App\Http\Controllers\admin;
use Config;
use Illuminate\Http\Request;
use App\Http\Requests\GoodsRequest;
use App\Http\Requests\GoodsEditRequest;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\GoodsImg;
use App\Models\User;
use App\Models\Cate;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

        //
            

        //按条件搜索并分页

        $data = Goods::where(function($query) use($request){

            $id = $request->input('id','');
            $goods_no = $request->input('goods_no','');
            $goods_name = $request->input('goods_name','');
            $type = $request->input('type','');

            // if(!empty($goods_no)) {
                $query->where('goods_no','like','%'.$goods_no.'%');
            // }

            if(!empty($goods_name)) {
                $query->where('goods_name','like','%'.$goods_name.'%');
            }

             if(!empty($type)) {
                $query->where('type','like','%'.$type.'%');
            }
            

             if(!empty($id)) {
                $query->where('id',$id);
            }
        })
        ->with('cate')->paginate($request->input('num', '10'));

         // dd($data); //检测数据是否查询出
         
        //生成参数数组返还给appends
        $arr=[];
        $arr['num']=$request->input('num',10);
        $arr['goods_no']=$request->input('goods_no','');
        $arr['goods_name']=$request->input('goods_name','');
        $arr['id']=$request->input('id','');
        $arr['type']=$request->input('type','');
        return view('admin.goods.index',['title'=>'单品列表','arr'=>$arr,'data'=>$data]);

        // if($req->has('goods_no ')
        // $data = Goods::->where('goods_no','like','%'.$req->input('search','').'%')
        // ->where('goods_name','like','%'.$req->input('search','').'%')
        // ->paginate($req->input('num',10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr =  cate::select(\DB::raw('*,concat(path,cate_id) as paths '))->orderBy('paths')->get();
        //生成商品no
        $goods_no = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        return view('admin.goods.add',['title'=>'商品添加','goods_no'=>$goods_no,'arr'=>$arr]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodsRequest $request)
    {
        $statu = 0;
               
        // 接收表单数据到数组 抛出图片和验证信息 
        $res = $request->except(['_token','thumb','img']);
        //dd($res);
        

        //接收图片并 填充图片到添加数组res中
        if($request->hasFile('thumb')){

            //设置名字
            $name = date('Ymd').str_random(10).time();

            //获取后缀
            $suffix = $request->file('thumb')->getClientOriginalExtension();

            //移动
             $request->file('thumb')->move('./updata/',$name.'.'.$suffix);
              //存数据表
            $res['thumb'] = '/updata/'.$name.'.'.$suffix;
        }
        //dd($res);

        //更新数据
        $data = Goods::create($res);
        $gid = $data->id;

        if($gid){
            $statu = 1;
        }


        //接收关联表数据 和id
        
        if($request->hasFile('img')){

            $gimgs = $request->file('img');

            $gimgsnew = [] ;

            foreach($gimgs as $k => $v) {

                $gc = [];
                
                //设置名字
                $name = date('Ymd').str_random(10).time();

                //获取后缀
                $suffix = $v->getClientOriginalExtension();

                //移动
                 $v->move('./updata/',$name.'.'.$suffix);

                //存单张图片信息
                $gc['gid'] = $data->id;
                $gc['src'] = '/updata/'.$name.'.'.$suffix;
                $gc['created_at'] = time();
                $gc['updated_at'] = time();
                $gimgsnew[] = $gc;
            }
              //查找id 并将数组插入
                $goods = Goods::find($gid);


                 //模型   出错
                try{
                    $data = $goods->goodsimg()->createMany($gimgsnew);
                    // $data->toArray();

                    $msg=[];
                    foreach($data as $k =>$v)
                    {
                        $msg[] = GoodsImg::where('id',$v->id)->update(['sort'=>$v->id]);
                    }

                }catch(\Exception $e){

                }
                if($msg){
                    $statu = 2;
                }else{
                    $statu = 0;
                }
        }
        // dd($gimgsnew);


        //如果更新成功将成功信息返回 
        if($statu=1||$statu =2){
            return redirect('/admin/goods')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
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
    public function edit($id)
    {
        $cate = cate::select(\DB::raw('*,concat(path,cate_id) as paths '))->orderBy('paths')->get();

        $data=goods::find($id);

        // $gpic = goods::find($id)->with('goodsimg')->first();
        $gpic = GoodsImg::where('gid',$id)->get()->toArray();
        // dump($gpic);
     


        return view('admin.goods.edit',['title'=>'商品修改','data'=>$data,'arr'=>$gpic,'cate'=>$cate,'id'=>$id]);
    }

    /**
     * 更新
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id 商品id
     * @return \Illuminate\Http\Response
     */
    public function update(GoodsEditRequest $request, $id)
    {
        //表单验证
        //     $this->validate($request, [
        //         'username' => 'required|regex:/^\w{6,12}$/',
        //     ],[
        //         'username.required'=>'用户名不能为空',
        //     ]);
        

        // 接收数据 不处理 图片 图组信息

        $res = $request->except(['_token','_method','thumb','img']);
        $statu = 0 ;
        
        //如果有关联表数据先更新关联表数据
        if($request->hasFile('img')){


            //关联关联表 start
            $goods = Goods::find($id);

            try {
                $goods->goodsimg()->delete();
                
            } catch (Exception $e) {
                // return back();
            }   
            //关联删除 end


            //接收的信息
            $gimgs = $request->file('img');

            //信息要保存到的数组
            $gimgsnew = [] ;
            foreach($gimgs as $k => $v) {

                $gc = [];
                
                //设置名字
                $name = date('Ymd').str_random(10).time();

                //获取后缀
                $suffix = $v->getClientOriginalExtension();

                //移动
                 $v->move('./updata/',$name.'.'.$suffix);

                //存单张图片信息
                $gc['gid'] = $id;
                $gc['src'] = '/updata/'.$name.'.'.$suffix;
                $gimgsnew[] = $gc;
            }

             //查找id 将新数据加入 start
            $goods = Goods::find($id);

            // dd($goods);
            // try{
                $data = $goods->goodsimg()->createMany($gimgsnew);
                // dd($data);
                
                $msg=[];
                foreach($data as $k =>$v)
                {
                    $msg[] = GoodsImg::where('id',$v->id)->update(['sort'=>$v->id]);
                }
                // dd($msg);
                
            // }catch(\Exception $e){
                // return back(); 错误返回不应打开
            // }

            //查找id 将新数据加入 end

            if ($data){

                $statu = 1;

                //如果有图片信息 图片信息加入到数组
                if($request->hasFile('thumb')){

                    //设置名字
                    $name = date('Ymd').str_random(10).time();

                    //获取后缀
                    $suffix = $request->file('thumb')->getClientOriginalExtension();

                    //移动
                     $request->file('thumb')->move('./updata/',$name.'.'.$suffix);
                      //存数据表
                    $res['thumb'] = '/updata/'.$name.'.'.$suffix;
                }
            
                //更新主表中信息 并获取插入信息
                try{
                    // dd($res);
                    $data2 =Goods::where('id',$id)->update($res);
                }catch(\Exception $e){
                    // return back();
                }

                if($data2){
                    $statu = 2;
                }

            }
        } else{

            //如果有图片信息 图片信息加入到数组
                if($request->hasFile('thumb')){

                    //设置名字
                    $name = date('Ymd').str_random(10).time();

                    //获取后缀
                    $suffix = $request->file('thumb')->getClientOriginalExtension();

                    //移动
                     $request->file('thumb')->move('./updata/',$name.'.'.$suffix);
                      //存数据表
                    $res['thumb'] = '/updata/'.$name.'.'.$suffix;
                }
            
                //更新主表中信息 并获取插入信息
                try{
                    $data2 =Goods::where('id',$id)->update($res);
                }catch(\Exception $e){
                    // return back();
                }
                if($data2){
                    $statu = 1;

                }

        }

        if($statu == 1 || $statu == 2){
            return redirect('/admin/goods')->with('success','添加成功');
        }else{
            return back();
        }
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //关联删除
        $goods = Goods::find($id);

        try {
            
            $goods->goodsimg()->delete();

            // dd($goods)

            $res = $goods->delete();
            
        } catch (Exception $e) {

            return back();
        }
        if($res){
            return redirect('/admin/goods')->with('success','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
    }
}

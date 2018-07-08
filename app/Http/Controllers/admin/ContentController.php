<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests\ContentRequest;
use App\Http\Controllers\Controller;
use App\Models\Content;

class ContentController extends Controller
{
    /**
     * 显示文章编辑页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //按照时间升序
        //按照时间降序

        
        //多条件搜索与分页
         $data = Content::orderBy('created_at','asc')
        ->where(function($query) use($request){

            //检测关键字
            $title = $request->input('title','');
            
            $keywords = $request->input('keywords','');
            

            //如果用户名不为空
            if(!empty($title)) {
                $query->where('title','like','%'.$title.'%');
            }

            //如果邮箱不为空
            if(!empty($keywords)) {

                $query->where('keywords','like','%'.$keywords.'%');
            }

        })->paginate($request->input('num', 10));

        //生成参数数组返还给appends
        //定义参数数组
        $arr = [];
        $arr['title'] = $request->input('title','');
        $arr['keywords'] = $request->input('keywords','');
        $arr['num'] = $request->input('num','10');
        return view('admin.content.index',['title'=>'文章列表页','arr'=>$arr,'data'=>$data]);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.add',['title'=>'文章添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentRequest $request)
    {
        $res = $request->except('_token');
        try {
            $data = Content::create($res);

            $arr=[];
            if($data){
                try {
                    $arr=['sort'=>$data->id];
                    // dd($arr);
                    $success=Content::where('id',$data->id)->update($arr);
                } catch (Exception $e) {
                    return back()->with('info','操作失败');
                }
               
            }

        } catch (Exception $e) {
            return back();
        }
            // dd($success);
        if($success){
            return redirect('admin/content')->with('success','添加成功');
        }else{
            return back()->with('success','添加成功');
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
        $data = Content::find($id);
        return view('admin.content.edit', ['title'=>'文章修改页','data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContentRequest $request, $id)
    {
        $res = $request->except('_token','_method');

        try {
           $data  =  Content::where('id',$id)->update($res);
        } catch (Exception $e) {
            return back();
        }

        if($data){
            return redirect('/admin/content')->with('success','修改成功');
        }else{
            return back()->with('info','修改失败');
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
         try {
           $data = Content::find($id)->delete();
        } catch (Exception $e) {
            return back();
        }
        if($data){
            return redirect('/admin/content')->with('success','删除成功');
        }else{
            return redirect('/admin/content')->with('error','删除失败');
        }
    }
}

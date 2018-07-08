<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cate;
use App\Http\Requests\CateRequest;

class CateController extends Controller
{
    /**
     * 显示信息
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $name = $request->input('cate_name');

        $cate = cate::select(\DB::raw('*,concat(path,cate_id) as paths '))->where('cate_name','like',"%$name%")->orderBy('paths')->paginate($request->input('num',10));

        $data=['cate_name'=>$request->input('cate_name'),'num'=>$request->input('num')];

        return view('admin.cate.index',['title'=>'分类显示','cate'=>$cate,'data'=>$data]);
    }
 
    /**
     * 显示添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = \DB::select('select *,concat(path,cate_id) from cate order by concat(path,cate_id)');
        return view('admin.cate.add',['title'=>'表单添加','cate'=>$cate,'id'=>'0']);
    }
    //加入子添加
    public function add($id)
    {
        $cate = \DB::select('select *,concat(path,cate_id) from cate order by concat(path,cate_id)');
        return view('admin.cate.add',['title'=>'表单添加','cate'=>$cate,'id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CateRequest $request)
    {
        // //表单验证
        // $this->validate($request, [ 
        //     'cate_name' =>'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]{1,10}$/u'
        // ],[
        
        //      'cate_name.required'=>'分类名不能为空',
        //      'cate_name.regex'=>'分类名格式不对'
        // ]);

        //获取数据
        $data = $request->except(['_token']);

        //获取父id
        $pid = $data['pid'];
        //用通过pid找到 pid的父path.pid.','.
        if ($pid==0){
            $data['path'] = '0,';
        } else {
            $str = Cate::select('path')->where("cate_id",$pid)->first();
            $data['path']=$str->path.$pid.',';
        }
        //插入一条记录 
        try {
            cate::create($data);
        } catch (Exception $e) {
            return back();;
        }

        if($data){

            return redirect('/admin/cate')->with('success','添加成功');

        } else {

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
    public function edit($id)
    {
        $cate = cate::find($id);
        return view('admin.cate.edit',['title'=>'类别修改','cate'=>$cate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CateRequest $request, $id)
    {
        //表单验证
        /*$this->validate($request, [
            'cate_name' =>'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]{1,10}$/u'
        ],[

             'cate_name.required'=>'分类名不能为空',
             'cate_name.regex'=>'分类名格式不正确'
        ]);*/

        $data = $request->input('cate_name');
        $arr = ['cate_name'=>$data,'cate_id'=>$id];
        $info = cate::where('cate_id',$id)->update($arr);

        //判断信息
        if($info){
            return redirect('/admin/cate')->with('info','修改成功');
        } else {
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
        /**
         * 删除信息
         *
         * @id 
         */  
        $cate = Cate::where('pid','=',$id)->first();
        // dd($cate);
        if ($cate) {
            return redirect('/admin/cate')->with('error','有子类不能删除');
            die;
        }

        $row = Cate::destroy($id);
        if($row){
            return redirect('/admin/cate')->with('success','删除成功');
        } else {
            return redirect('/admin/cate');
        }
    }
}

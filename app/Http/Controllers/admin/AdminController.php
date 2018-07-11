<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use Hash;
use App\Models\boos\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
      
        $res = Admin::where('vname','like','%'.$request->input('search','').'%')->paginate($request->input('num',5));

        $arr = ['num'=>$request->input('num'),'search'=>$request->input('search')];   
        return view('admin.admin.index',[
            'title'=>'管理员列表页面',
            'res'=>$res,
            'arr'=>$arr
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.admin.add',[

            'title'=>'管理员添加页面'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单验证
        $this->validate($request, [
            'vname' => 'required|regex:/^\w{3,12}$/',
            'password' => 'required|regex:/^\S{6,12}$/',
            'repass'=>'same:password',        
        ],[
            'vname.required'=>'用户名不能为空',
            'vname.regex'=>'用户名格式不正确',
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码格式不正确',
            'repass.same'=>'两次密码不一致'
           
        ]);

        $res = $request->except(['repass','_token']);
        // dump($res);
        // //密码加密
        $res['password'] = Hash::make($request->input('password'));


        //模型
        // dump($res);
        
        try{
            $data = Admin::create($res);
            // dump($date);
            if($data){
                return redirect('/admin/admin');
            }
        }catch(\Exception $e){

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
    public function edit($aid)
    {
      $res = Admin::find($aid);

        // dump($res);
        return view('admin.admin.edit',['title'=>'用户名的修改页面','res'=>$res]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $aid)
    {
        $res = $request->except(['repass','password','_token','_method']);

         //模型   出错
        try{
            $data = Admin::where('aid',$aid)->update($res);
            // $dump($date);
            if($data){
                return redirect('/admin/admin')->with('success','修改成功');
            }
        }catch(\Exception $e){

            return back()->with('error');

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
         // $res = Admin::where('id',$id)->delete();
        //第二种
        $res = Admin::destroy($id);

        if($res){

            return redirect('/admin/admin')->with('success','删除成功');
        }
    }

    public function ajaxkai(Request $request)
    {
        $value = $request->input('vname');
        $aid = $request->input('aid');
        // dd($value);
        try{
            $res = Admin::where('aid',$aid)->update(['buff'=>$value]);
            if($res){
                echo $value;
            }else{
                echo 4 ;
            }

        }catch(\Exception $e){
            return back();
        }

       
    }

    // public function ajaxuser(Request $request)
    // {
    //     $res = $request->input('vanme');

    //     $ids = $request->input('ids');

    //     $res = Admin::where('aid',$ids)->update($res);

    //      try{
    //         $data = Admin::create($res);
    //         // dump($date);
    //         if($data){
    //             return redirect('/admin/admin');
    //         }
    //     }catch(\Exception $e){

    //         return back();

    //     }   

    // }
}

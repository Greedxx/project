<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use Hash;
use App\Models\admin\User;
use App\Http\Requests\FormRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // dump($request->all());

       /* where('active', 1)
               ->orderBy('name', 'desc')
               ->take(10)
               ->get();*/



        $res = User::where('username','like','%'.$request->input('search').'%')->
                paginate($request->input('num',5));

        $arr = ['num'=>$request->input('num'),'search'=>$request->input('search')];     

        return view('admin.user.index',[
            'title'=>'用户的列表页面',
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
        return view('admin.user.add',[

            'title'=>'用户的添加页面'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormRequest $request)
    {
        //表单验证
        // $this->validate($request, [
        //     'username' => 'required|regex:/^\w{6,12}$/',
        //     'password' => 'required|regex:/^\S{6,12}$/',
        //     'repass'=>'same:password',
        //     'email'=>'email',
        //     'phone'=>'required|regex:/^1[3456789]\d{9}$/',            
        // ],[
        //     'username.required'=>'用户名不能为空',
        //     'username.regex'=>'用户名格式不正确',
        //     'password.required'=>'密码不能为空',
        //     'password.regex'=>'密码格式不正确',
        //     'repass.same'=>'两次密码不一致',
        //     'email.email'=>'邮箱格式不正确',
        //     'phone.required'=>'手机号不能为空',
        //     'phone.regex'=>'手机号格式不正确'

        // ]);

        $res = $request->except(['_token','profile','repass']);

        //头像
        if($request->hasFile('profile')){

            //设置名字
            $name = str_random(10).time();

            //获取后缀
            $suffix = $request->file('profile')->getClientOriginalExtension();

            //移动
            $request->file('profile')->move('./uploads/',$name.'.'.$suffix);
        }

        //存数据表
        $res['profile'] = Config::get('app.path').$name.'.'.$suffix;

        //密码加密
        $res['password'] = Hash::make($request->input('password'));
        
        // 模型   出错  
        try{
            $data = User::create($res);
            // dump($data);
            if($data){
                return redirect('/admin/user')->with('success','添加成功');
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
    public function edit($id)
    {
        //
        $res = User::find($id);
        // dump($res);
        return view('admin.user.edit',['title'=>'用户名的修改页面','res'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //表单验证

     
        
        $res = $request->except('_token','_method','profile');

        // dd($request->hasFile('profile'));
        if($request->hasFile('profile')){
            //设置名字
            $name = str_random(10).time();

            //获取后缀
            $suffix = $request->file('profile')->getClientOriginalExtension();

            //移动
            $request->file('profile')->move('./uploads/',$name.'.'.$suffix);

            //存数据表
            $res['profile'] = Config::get('app.path').$name.'.'.$suffix;

        }
            
            if(!($request->hasFile('profile'))){
                   
                    try{
                    $data = User::where('id',$id)->update($res);

                    if($data){
                        return redirect('/admin/user')->with('success','修改成功');
                    }
                }catch(\Exception $e){

                    return back()->with('error');

                }

            }   

         try{
                $data = User::where('id',$id)->update($res);

                if($data){
                    return redirect('/admin/user')->with('success','修改成功');
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
        //

        

        //第一种
        $res = User::where('id',$id)->delete();
        //第二种
        // $res = User::destroy($id);

        if($res){

            return redirect('/admin/user')->with('success','删除成功');
        }


    }
}

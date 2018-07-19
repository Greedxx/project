<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\User;
use Config;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        
        $res = User::find($id);
        return view('home.user.users',['title'=>'用户信息修改','res'=>$res]);
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
        $res = $request->except('_token','_method','profile');
        // dd($res);
        

        if($request->hasFile('profile')){
            //设置名字
            $name = str_random(10).time(); 

            //获取后缀
            $suffix = $request->file('profile')->getClientOriginalExtension();

            //移动
            $request->file('profile')->move('./uploads/',$name.'.'.$suffix);

             $res['profile'] = Config::get('app.path').$name.'.'.$suffix;

        }

         if(!($request->hasFile('profile'))){

                try{
                $userinfo = User::where('id',$id)->update($res);
                // dd($userinfo);
                if($userinfo){
                    $request->session()->put('userinfo', $userinfo);
                    return redirect('/home/login');
                }else{
                     return back();
                }

            }catch(\Exception $e){
                // echo "string";die;
                return back()->with('error');

             }

         }
        
        try{
            $userinfo = User::where('id',$id)->update($res);
            
            if($userinfo){
                $request->session()->put('userinfo', $userinfo);
                return redirect('/home/login');
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
    }
}

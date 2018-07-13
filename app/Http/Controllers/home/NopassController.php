<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\User;

class NopassController extends Controller
{
    public function nopass()
    {
    	return view('home.login.nopass',['title'=>'修改密码']);
    }

    public function pass(Request $request)
    {
    	$this->validate($request, [
            'username' => 'required|regex:/^([\x{4e00}-\x{9fa5}A-Za-z0-9_\.]+,)*([\x{4e00}-\x{9fa5}A-Za-z0-9_\.]+)$/u',
            'email'=>'email',
            'phone'=>'required|regex:/^1[3456789]\d{9}$/',            
        ],[
            'username.required'=>'用户名不能为空',
            'username.regex'=>'用户名格式不正确',
            'email.email'=>'邮箱格式不正确',
            'phone.required'=>'手机号不能为空',
            'phone.regex'=>'手机号格式不正确'

        ]);

        $res = $request->except('_token');

        $username = $request -> input('username');  
        // dd($username);

        $a = User::where('username',$username)->first();
        // dd($a);
        if(!$a){
        	$request->session()->flash('nononame', '用户名不存在!');
        	return back()->with('error');
        }
       
        $oldemail = $a->email;
       	
       	$email = $request -> input('email');
       	if(!($email == $oldemail)){
          
       		$request->session()->flash('noemail', '原邮箱不正确!');
        	return back()->with('error');
       	}
       	
       	$oldphone = $a->phone;

       	$phone = $request -> input('phone');

       	if(!($phone == $oldphone)){
       		$request->session()->flash('nophone', '原手机号不正确!');
        	return back()->with('error');
       	}

       	//验证码
          if(session('code') != $res['code']){

            return back()->with('error','验证码不正确');
          }

        $passid = $a->id;
        $request->session()->put('passid', $passid);
       	return redirect('home/modifypass')->with('success','修改成功');
    }
}

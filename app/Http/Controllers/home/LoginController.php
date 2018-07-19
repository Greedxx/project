<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\User;
use Session;
use Hash;

class LoginController extends Controller
{
   public function login()
   { 
   		return view('home.login.login');
   }
   public function dologin(Request $request)
   {
   		$res = $request->except('_token');

          $userinfo = User::where('username',$res['username'])->first();
          // dd($userinfo);

          //获取用户名
          if(!$userinfo){

            return back()->with('error','用户名或密码不正确');
          }

          //判断密码
          if (!Hash::check($res['password'], $userinfo->password)) {
            // 密码对比...

            //如果说密码失败
            return back()->with('error','用户名或密码不正确');
          }

          $request->session()->put('userinfo', $userinfo);
          if((session('userinfo.status') == '2')){
            return back()->with('error','账户被禁用');
          }
             
           return redirect('/');
   }
   
   public function lologin()
   {
      session(['userinfo'=>'']);
      return redirect('/');
   }
}

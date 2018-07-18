<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder; 
use Session;
use Hash;
use App\Models\boos\Admin;
class LoginController extends Controller
{
      public function login(){
          
          return view('admin.login.login');
      }
      
      public function dologin(Request $request)
      {
          $res = $request->except('_token');

          $vname = Admin::where('vname',$res['vname'])->first();

          //获取用户名
          if(!$vname){

            return back()->with('error','用户名或密码不正确');
          }

          //判断密码
          if (!Hash::check($res['password'], $vname->password)) {
            // 密码对比...

            //如果说密码失败
            return back()->with('error','用户名或密码不正确');
          }

          //验证码
          if(session('code') != $res['code']){

            return back()->with('error','验证码不正确');
          }
         
          $request->session()->put('admininfo', $vname);
          
           if ((session('admininfo.buff') == '0')) {
                      return back()->with('error','账户被禁用');
                    }
          session(['vname'=>$vname->vname]);
          // session(['profile'=>$vname->profile]]);
          return redirect('/admin/admin');

       }
    public function captcha()
    {
         $phrase = new PhraseBuilder;
      // 设置验证码位数
      $code = $phrase->build(4);
      // 生成验证码图片的Builder对象，配置相应属性
      $builder = new CaptchaBuilder($code, $phrase);
      // 设置背景颜色
      $builder->setBackgroundColor(123, 203, 230);
      $builder->setMaxAngle(10);
      $builder->setMaxBehindLines(0);
      $builder->setMaxFrontLines(0);
      // 可以设置图片宽高及字体
      $builder->build($width = 350, $height = 87, $font = null);
      // 获取验证码的内容
      $phrase = $builder->getPhrase();
      // 把内容存入session
      //可以使用
      // Session::flash('code', $phrase);

      //
      session(['code'=>$phrase]);


      // 生成图片

      header("Cache-Control: no-cache, must-revalidate");
      header("Content-Type:image/jpeg");
      $builder->output();
    }
    
    public function logout()
    {
      session(['vname'=>'']);
      return redirect('/admin/login');
    }
 
    

}

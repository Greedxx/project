<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder; 
use Session;
use Hash;
use App\Models\admin\User;

class ZhuceController extends Controller
{
    public function index()
    {
    	return view('home.login.zhuce');
    }

    public function dozhuce(Request $request)
    {	

    	$this->validate($request, [
            'username' => 'required|regex:/^([\x{4e00}-\x{9fa5}A-Za-z0-9_\.]+,)*([\x{4e00}-\x{9fa5}A-Za-z0-9_\.]+)$/u',
            'password' => 'required|regex:/^\S{6,12}$/',
            'repass'=>'same:password',
            'email'=>'email',
            'phone'=>'required|regex:/^1[3456789]\d{9}$/',            
        ],[
            'username.required'=>'用户名不能为空',
            'username.regex'=>'用户名格式不正确',
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码格式不正确',
            'repass.same'=>'两次密码不一致',
            'email.email'=>'邮箱格式不正确',
            'phone.required'=>'手机号不能为空',
            'phone.regex'=>'手机号格式不正确'

        ]);

    	 $res = $request->except('_token','repass');
    	$res['password'] = Hash::make($request->input('password'));
    	$res['profile'] ='/uploads/FBvr1txEtL1531202661.png';
    	$res['status'] = '0';
    	
		 //验证码
		    	
          
      	if(session('code') != $res['code']){

        	return back()->with('error','验证码不正确');
    	}

		$date = User::create($res);
    	if($date){
    		return redirect('/home/login')->with('success','注册成功');
    	}
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
      $builder->build($width = 150, $height = 42, $font = null);
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
    
   
}

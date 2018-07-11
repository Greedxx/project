<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\boos\Admin;
use Illuminate\Support\Facades\Input as Input;
use Hash;
use Auth;
class PassController extends Controller
{
    public function xian()
    {	

    	return view('admin.login.pass',
    		['title'=>'修改密码']);
    	
    }

    public function gai(Request $request)
    {		
    		
			$oldpassword = $request->input('password_o');
    		$password = $request->input('password');
    		
    		
    		
    		 
    		$validator = \Validator::make($request->all(),[
    			'password_o'=>'required|between:6,20',
    			'password'=>'required|between:6,20',
    			'password_c'=>'same:password',
    		],[
    			'password_o.required'=>'原密码不能为空',
    			'password.required'=>'新密码不能为空',
    			'between'=>'密码必须在6-20位',
    			'password_.same'=>'两次密码不一致',
    		]);	

    		// $validator = \Validator::make($data,$rules,$message);
    	
	    	$user = Admin::first();
		    // dd($user);
		    

		  	$validator->after(function($validator) use ($oldpassword, $user) {
		        if (!Hash::check($oldpassword, $user->password)) {
		            $validator->errors()->add('oldpassword', '原密码错误');
		        }
	   		 });
	   
	    
	    	 if ($validator->fails()) {
			        return back()->withErrors($validator);  //返回一次性错误
			    }
		    $user->password = bcrypt($password);
		    // dd($user);

		    $user->save();
		    Auth::logout();  //更改完这次密码后，退出这个用户
		    return redirect('/admin/login');
	
    	


    		
    }
}

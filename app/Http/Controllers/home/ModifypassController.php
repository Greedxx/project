<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\User;
use Hash;
class ModifypassController extends Controller
{
    public function index()
    {
    	return view('home.login.modifypass');
    }

    public function passedit(Request $request)
    {
    	$this->validate($request, [
            'password' => 'required|regex:/^\w{6,12}$/',
            'renew'=>'same:repass',         
        ],[
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码格式不正确',
            'renew.same'=>'两次密码不一致',

        ]);


        $res = $request->except('_token','repass');

        $passid = session('passid');
        // dd($passid);
        
        $password = $request->input('password');

        $update = array(
	      'password'  =>bcrypt($password),
	    );

        try{
            $data = User::where('id',$passid)->update($update);

            if($data){
                return redirect('/home/login')->with('success','修改成功');
            }
        }catch(\Exception $e){

            return back()->with('error');

        }


    }
}

<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\User;
use Session;
use Hash;
class PassController extends Controller
{
   public function xiu()
   {
   		return view('home.user.pass',['title'=>'修改密码']);
   }

   public function gai(Request $request)
   {
   		$this->validate($request, [
            'old' => 'required|regex:/^\w{6,12}$/',
            'new' => 'required|regex:/^\w{6,12}$/',
            'renew'=>'same:new',         
        ],[
            'old.required'=>'原密码不能为空',
            'old.regex'=>'原密码格式不正确',
            'new.required'=>'密码不能为空',
            'new.regex'=>'密码格式不正确',
            'renew.same'=>'两次密码不一致',

        ]);


        $res = $request->except('_token','renew');

        $old = $request->input('old');

        $new = $request->input('new');

        $id = session('userinfo.id');

        $abc = User::where('id',$id)->select('password')->first();

        if(!Hash::check($old,$abc->password)){
        	$request->session()->flash('old', '原密码错误!');
        	return back()->with('error');
        }

        $update = array(
	      'password'  =>bcrypt($new),
	    );

       

         try{
            $data = User::where('id',$id)->update($update);

            if($data){
                return redirect('/home/login')->with('success','修改成功');
            }
        }catch(\Exception $e){

            return back()->with('error');

        }

       



   }
}

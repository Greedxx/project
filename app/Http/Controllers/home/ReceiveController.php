<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\home\receive;

class ReceiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $uid = session('userinfo.id');
        $q = Receive::where('uid',$uid)->get();
        if(!$q){
            $res = Receive::where('uid','0')->get()->toArray();
            // dump($res);die;
        }else{
            $res = Receive::where('uid',$uid)->get()->toArray();
        }

        // dd($res);
       return view('home.user.receive',[
        'title'=>'收货地址',
        'res'=>$res
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // echo "string";
        //表单验证
        $this->validate($request, [
            'sname' => 'required|regex:/^([\x{4e00}-\x{9fa5}A-Za-z0-9_\.]+,)*([\x{4e00}-\x{9fa5}A-Za-z0-9_\.]+)$/u',
            'area' => 'required',
            'address' => 'required',
            'code' => 'required',
            'phone'=>'required|regex:/^1[3456789]\d{9}$/',
                    
        ],[
            'sname.required'=>'收货人不能为空',
            'sname.regex'=>'不支持阿拉伯文希伯来亚文火星文',
            'area.required'=>'所在地区不能为空',
            'address.required'=>'街道地址不能为空',
            'code.required'=>'邮编不能为空',
            'phone.regex'=>'手机号格式不正确',
            'phone.required'=>'手机号不能为空',

           
        ]);

        $res = $request->except(['_token']);
       

       $res['uid']= session('userinfo.id');
        // dd($res);
        
        
          
        try{
            $data = Receive::create($res);

            $uaddr = Receive::where('uid', $res['uid'])->update(['default'=>'0']);
            // dump($uaddr);
            // die;
            $sid = Receive::where('sid',$data->sid)->update(['default'=>'1']);
            // dump($date);
            if($data){
                return redirect('/home/receive');
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
        $res = Receive::find($id);
        // dd($res);
        return view('home.user.Ereceive',['title'=>'收货地址修改','res'=>$res]);
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
         $res = $request->except('_token','_method');
         // dd($res);
          try{
            $data = Receive::where('sid',$id)->update($res);

            if($data){
                return redirect('/home/receive')->with('success','修改成功');
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

       // dd($id);
       $res = Receive::where('sid',$id)->delete();
        //第二种
        // $res = Receive::destroy($id);

        if($res){

            return redirect('/home/receive')->with('success','删除成功');
        }
    }

   public function mo()
   {
     echo "string";
   }
}

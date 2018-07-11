<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 
        $num = $request->input('num',10);
        

        $arr = ['num'=>$num];
        // 查询相关数据
        $res = Message::orderBy('id','asc')
        ->with('good','user')
        ->paginate($num);
    
        return view('admin.message.index',['res'=>$res,'arr'=>$arr]);
        
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
        //
        $res = Message::orderBy('id','asc')
        ->where('id',$id)
        ->with('good','user')->get();
        // dd($res);
        return view('admin.message.show',['res'=>$res,'id'=>$id]);
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
        //
        $res = $request->only('tomsg');
        
        try{
            $res = Message::find($id)->update($res);
            if ($res) {
                return redirect('/admin/message/'.$id);
            }else{
                echo '回复失败';die;
            }
        }catch(\Exception $e){
            return back();
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
        try{
            $res = Message::find($id)->delete();

            if ($res) {
                return redirect('/admin/message')->with('delete','删除成功');
            }else{
                echo '删除失败';die;
            }
        }catch(\Exception $e){
            return back();
        }
    }
}

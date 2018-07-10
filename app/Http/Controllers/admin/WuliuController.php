<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Wuliu;
use App\Http\Requests\FormsRequest;

class WuliuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $num = $request->input('num',10);
        $kw = $request->input('keywords');

        $arr = ['num'=>$num,'kw'=>$kw];    
       
        // 查询相关数据
        $res = Wuliu::orderBy('id','asc')->where('cname','like','%'.$kw.'%')->paginate($num);
        return view('admin.wuliu.index',['res'=>$res,'arr'=>$arr]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.wuliu.create');
    }

    /**
     * Store a newly created resource in storagem.i
     *
     * @param  \Illuminate\Http\Request  $request;
     * @return \Illuminate\Http\Response
     */
    public function store(FormsRequest $request)
    {
        //
       
        $res = $request->except('_token');

         //模型   出错
        try{
            $data = Wuliu::create($res);

            if($data){
                return redirect('/admin/wuliu')->with('success','添加成功');
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
        //
        $res = Wuliu::find($id);

        // dump($res);
        return view('admin.wuliu.edit',['res'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormsRequest $request, $id)
    {
        //
        $res = $request->except('_token','_method','id');

        try{
            $data =  Wuliu::where('id',$id)->update($res);
              if($data){
                return redirect('/admin/wuliu')->with('success','修改成功');
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
        $res = Wuliu::find($id)->delete();

        if ($res) {
            return redirect('/admin/wuliu')->with('delete','删除成功');
        }else{
            echo '删除失败';die;
        }

    }
}

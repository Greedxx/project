<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Orders;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

        $num = $request->input('num',10);
        $kw = $request->input('keywords');

        $arr = ['num'=>$num,'kw'=>$kw];    
       
        // 查询相关数据
        $res = Orders::orderBy('id','asc')
        ->with('user','good','wuliulist')
        ->where('orders_id','like','%'.$kw.'%')
        ->paginate($num);
        
        // dd($res[0]['wuliulist']->status);
        return view('admin.orders.index',['res'=>$res,'arr'=>$arr]);

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
     * Store aum newly created resource in storage.
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
        $res = Orders::where('id',$id)->with('user','good','wuliulist')->get();

        // dd($res);

        return view('admin.orders.show',['res'=>$res]);

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
        $res = Orders::find($id)->delete();

        if ($res) {
            return redirect('/admin/orders')->with('delete','删除成功');
        }else{
            echo '删除失败';die;
        }
    }
}

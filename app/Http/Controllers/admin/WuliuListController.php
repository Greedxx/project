<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Orders;
use App\Models\admin\Wuliu;
use App\Models\admin\WuliuList;
use App\Http\Requests\WuliuListRequest;

class WuliuListController extends Controller
{
    //
    public function index(Request $request)
    {	
    	$num = $request->input('num',10);
        $kw = $request->input('keywords');

        $arr = ['num'=>$num,'kw'=>$kw];    
       	
       	$list = Wuliu::get();
       	// dump($list);
        // 查询相关数据
        $res = Orders::orderBy('id','asc')
        	->with('wuliulist')
        	->where('status','1')
        	->where('orders_id','like','%'.$kw.'%')
        	->paginate($num);
        // dd($res);
    	return view('admin.wuliu.list',['arr'=>$arr,'res'=>$res,'list'=>$list]);
    }

    public function fahuo(WuliuListRequest $request)
    {
    	$res = $request->except('_token');
    	// dd($res);
		$id = $res['did'];
		// dd($id);
    	$d['cname'] = $request['cangshang'];
    	$d['danhao'] = $request['dingdan'];
    	
    	try{
    		$data = WuliuList::create($d);
            $ddid = $data->id;
    		// dd($ddid);
    		$da = Orders::where('id',$id)
    			->update(['wuliu_status'=>$ddid]);
    		
    		if ($data) {
    			return redirect('/admin/wuliulist')->with('success','发货成功');
    		}
    	}catch(\Exception $e){

    		return back();
    	}
	}
	
	public function status(Request $request)
	{
		$res = $request->all();
		$id = $res['id'];
		
		try{
			$data = Orders::where('id',$id)->update(['wuliu_status'=>0]);
			
			if($data){
				echo '1';
			}

		}catch(\Exception $e){
			return back();
		}
	}

}
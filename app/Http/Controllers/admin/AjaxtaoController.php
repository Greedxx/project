<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\GoodsImg;

class AjaxtaoController extends Controller
{
    public function gstatus(Request $request)
    {
        $status = $request->input('status');
        $gid = $request->input('gid');
         // dd($status);
        try{
            $res = Goods::where('id',$gid)->update(['status'=>$status]);
            if($res){
                echo  $status;
            }else{
                echo 4 ;
            }
        }catch(\Exception $e){
        }
    }

    public function gpicstatus(Request $request)
    {
        $status = $request->input('status');
        $gpicid = $request->input('gpicid');
         // dd($status);
         // echo 111;
        // try{
            $res = GoodsImg::where('id',$gpicid)->update(['statu'=>$status]);
            if($res){
                echo  $status;
            }else{
                echo 4 ;
            }
        // }catch(\Exception $e){
        //     return back();
        // }
    }
}

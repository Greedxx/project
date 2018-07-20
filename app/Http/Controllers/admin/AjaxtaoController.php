<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\GoodsImg;
use App\Models\Content;
use App\Models\home\Receive;
use App\Models\admin\Message;

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

    public function csort(Request $request)
    {
        $id = $request->input('id');
        $sort = $request->input('val');

        // dump($id);
        // echo $sort;
        // die;
        // dd($status);
        // echo 111;
        // try{
            $res = Content::where('id',$id)->update(['sort'=>$sort]);
            // $res = GoodsImg::where('id',$)->update(['statu'=>$status]);
            if($res){
                echo  1;
            }else{
                echo -1 ;
            }
        // }catch(\Exception $e){
        //     return back();
        // }
    }

    public function defrev(Request $request){

        $uid = $request->input('uid');
        $sid = $request->input('sid');


        // $uaddr = Receive::where('uid',$uid)->get()->toArray();
        // dd($uaddr);
        $uaddr = Receive::where('uid',$uid)->update(['default'=>'0']);
        // dump($uaddr);
        // die;
        $sid = Receive::where('sid',$sid)->update(['default'=>'1']);

        echo 1;

    }

    public function msgadd(Request $request){

        $data = [];

        $data['uid'] = $request->input('uid');

        $data['gid'] = $request->input('gid');

        $data['msg'] = $request->input('msg');

        $info = 0;

        try {
            $info = Message::create($data);
        } catch (Exception $e) {
            
        }

        echo '1';
    }
}

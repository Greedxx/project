<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxtaoController extends Controller
{
    public function gstatus(){
        $value = $request->input('vname');
        $aid = $request->input('aid');
        // dd($value);
        try{
            $res = Admin::where('aid',$aid)->update(['buff'=>$value]);
            if($res){
                echo $value;
            }else{
                echo 4 ;
            }

        }catch(\Exception $e){
            return back();
        }
    }
}

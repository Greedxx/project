<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;

class GoodsInfoController extends Controller
{
   public function index($id){
        $data = Goods::where('id',$id)->with('cate')->with('GoodsImg')->first();

                // dump($data['color']);

                $color = explode(',',$data['color']);
                $size = explode(',',$data['size'] );



            // dd($data);

                

        return view('home.good',['data'=>$data,'color'=>$color,'size'=>$size]);
   }
}

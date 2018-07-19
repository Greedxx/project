<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\home\Shoucang;

class ShoucangController extends Controller
{
    //
     public function add(Request $request)
    {
    	$data = [];
    	$data['uid'] = $request->input('uid');
    	$data['gid'] = $request->input('gid');
    	// dd($data);
    	Shoucang::create($data);

        return back();

    }
    public function del(Request $request)
    {
    	$data = [];
    	$data['uid'] = $request->input('uid');
    	$data['gid'] = $request->input('gid');
        // dd($request->input('gid'));
    	$id = Shoucang::where('uid','=',$data['uid'])->where('gid','=',$data['gid'])->select('id')->first();
    	// dd($id->id);
    	Shoucang::find($id->id)->delete();

        return back();

    }
}

<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use App\Models\Admin\Links;
use App\Http\Requests\FormRequest;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $res = $request->all();
        //dump($res);
       $res = Links::orderBy('lorder')->where('lname','like','%'.$request->input('search').'%')->
        paginate($request->input('num',10));
        $arr = ['num'=>$request->input('num'),
        'search'=>$request->input('search')];
        return view('admin.links.index',
            ['title'=>'友情链接列表',
            'res'=>$res,
            'arr'=>$arr,
            'request'=>$request
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
        return view('admin.links.add',['title'=>'添加友情链接']);
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
        
         //表单验证
       // dump ($request);
        $this->validate($request, [
        'lname' => 
        'required|regex:/\S/',
        'ltitle' =>
        'required|regex:/\S/',
        'url' =>
       'required|regex:/\S/',
        'lorder' => 'required|regex:/^\d{1,}$/',
         ],
        [
            'lname.required'=>'链接名称不能为空',
            // 'lname.regex'=>'链接名称格式不正确',
            'url.required'=>'链接地址不能为空',
            // 'url.regex'=>'链接地址格式不正确',
            'ltitle.required'=>'链接说明不能为空',
            // 'ltitle.regex'=>'链接说明格式不正确',
            'lorder.required'=>'链接排序不能为空',
            'lorder.regex'=>'链接排序格式不正确','lorder' => 'unique:links,lorder'
        ]);
            $res = $request->except(['_token']);

        //url
            if ($request->hasFile('url')){

                //设置名字
                $name = str_random(10).time();
                //获取后缀
                $suffix= $request->file('url')->getClientOriginalExtension();
                //移动
                $aa= $request -> file('url')->move('./uploads/',$name.'.'.$suffix);
                //dd($aa);
                //存数据表
                $res['url']= Config::get('app.path').$name.'.'.$suffix;
            }
        
               // dd($res);
            try{
                    $data = Links::create($res);
                    // dd($data);
                    if($data){
                        return redirect('/admin/links')->with('success','添加成功');
                      }
                }catch(\Exception $e){
                    return back()->with('error','添加失败');
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
         $res = Links::find($id);
       /* dump($res);
        dump($res->url);*/
        return view('admin.links.edit',['title'=>'链接的修改页面',
            'res'=>$res
            ]);
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
        //表单验证
        $foo = Links::first();
        //dd($foo);
        $urls  = $foo->url;
        //dump($urls);
      /*  $info = '@'.unlink('.'.$urls);
        dump($info);*/
       // if(!$info) return;

        $res = $request->except('_token','url','_method');
        //dump($res);
        if($request->hasFile('url')){
            //设置名字
            $name = str_random(10).time();
            //获取后缀
            $suffix = $request->file('url')->getClientOriginalExtension();
            //移动
            $request ->file('url')->move('./uploads/',
             $name.'.'.$suffix);
            //存数据表
            $res['url']= Config::get('app.path').$name.'.'.$suffix;
        }
        
        //dd($res);
        //模型 出错
        try{
            $data  =  Links::where('lid',$id)->update($res);
            if($data){
            return redirect('/admin/links')->with('success','修改成功');
        }    
        }catch(\Exception $e){
           return back()->width('error');
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
     //dd($id);
        $res = Links::where('lid',$id)->delete();
       // dump($res);
        if($res){
            return redirect('/admin/links')->with('success','删除成功');
        }
    }
}

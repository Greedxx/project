@extends('layout.homeuser')

@section('title',$title)

@section('content')

 <!--地址管理-->
  <div class="user_address_style">
    <div class="title_style">
        <em>
        </em>
        地址管理
    </div>
    <div class="add_address">
        <span class="name">
            添加送货地址
        </span>
        <form action="/home/receive" method="POST">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td class="label_name">
                        收&nbsp;货&nbsp;&nbsp;人：
                    </td>
                    <td>
                        <input name="sname" type="text" class="add_text" style=" width:100px" />
                        <i>
                            *@foreach ($errors->get('sname') as $message) 
                                {{$message}}    
                            @endforeach
                        </i>

                        
                    </td>
                </tr>
                <tr>
                    <td class="label_name">
                        所在地区：
                    </td>
                     <td>
                        <input name="area" type="text" class="add_text" style=" width:200px" />
                        <i>
                            *@foreach ($errors->get('area') as $message) 
                                {{$message}}    
                            @endforeach
                        </i>
                    </td>
                </tr>
                <tr>
                    <td class="label_name">
                        街道地址：
                    </td>
                    <td>
                        <textarea name="address"  style=" width:500px; height:100px; margin:5px 0px">
                        </textarea>
                        <i>
                            *@foreach ($errors->get('address') as $message) 
                                {{$message}}    
                            @endforeach
                        </i>
                    </td>
                </tr>
                <tr>
                    <td class="label_name">
                        邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;编：
                    </td>
                    <td>
                        <input name="code" type="text" class="add_text" style=" width:100px" />
                        <i>
                            *@foreach ($errors->get('code') as $message) 
                                {{$message}}    
                            @endforeach
                        </i>
                    </td>
                </tr>
                <tr>
                    <td class="label_name">
                        手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机：
                    </td>
                    <td>
                        <input name="phone" type="text" class="add_text" style=" width:200px" />
                        &nbsp;&nbsp;
                        <i>*@foreach ($errors->get('phone') as $message) 
                                {{$message}}    
                            @endforeach</i>
                    </td>

                </tr>
                
               
                <tr>
                    <td colspan="2" class="center">
                     {{csrf_field()}}
                        <input name="" type="submit" value="保存" class="add_dzbtn" />
                        <input name="" type="reset" value="清空" class="reset_btn" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <!--用户地址-->
    <div class="address_content">
        <div class="address_prompt">
          最多保存添加15条地址
        </div>
        <table cellpadding="0" cellspacing="0" class="user_address" width="100%">
            <thead>
                
                <tr class="label">
                    <td width="110px;">
                        收货人
                    </td>
                    <td width="210px;">
                        所在地
                    </td>
                    <td width="250px;">
                        详细地址
                    </td>
                    <td width="110px;">
                        邮编
                    </td>
                    <td width="150px;">
                        电话手机
                    </td>
                   
                    <td width="110px;">
                        操作
                    </td>
                    
                </tr>
            </thead>
            <tbody>
             @foreach($res as $k => $v)
                <tr>
                    <td>
                        {{$v->sname}}
                    </td>
                    <td>
                        {{$v->area}}
                    </td>
                    <td>
                        {{$v->address}}
                    </td>
                    <td>
                        {{$v->code}}
                    </td>
                    <td>
                        {{$v->phone}}
                    </td>
                    <td>
                        <a href="/home/receive/{{$v->sid}}/edit">
                             <button href="" class='"btn btn-warning btn-xs' height="10px">修改</button>
                        </a>
                      
                        <form action="/home/receive/{{$v->sid}}" method='post' >
                                
                                {{csrf_field()}}

                                {{method_field('DELETE')}}
                                <button href="" class='"btn btn-warning btn-xs'>删除</button>

                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
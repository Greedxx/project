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
        <form action="/home/receive/{{$res->sid}}" method="POST">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td class="label_name">
                        收&nbsp;货&nbsp;&nbsp;人：
                    </td>
                    <td>
                        <input name="sname" type="text" class="add_text" style=" width:100px" value="{{$res->sname}}" />
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
                        <input name="area" type="text" class="add_text" style=" width:200px" value="{{$res->area}}" />
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
                        <textarea name="address"  style=" width:500px; height:100px; margin:5px 0px" >{{$res->address}}
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
                        <input name="code" type="text" class="add_text" style=" width:100px" value="{{$res->code}}" />
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
                        <input name="phone" type="text" class="add_text" style=" width:200px" value="{{$res->phone}}" />
                        &nbsp;&nbsp;
                        <i>*@foreach ($errors->get('phone') as $message) 
                                {{$message}}    
                            @endforeach</i>
                    </td>

                </tr>
                
               
                <tr>
                    <td colspan="2" class="center">
                     {{csrf_field()}}
                     {{method_field('PUT')}}
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
        
    </div>
</div>

@endsection
@extends('layout.main')

@section('title',$title)

@section('content')
<div class="user_style clearfix">
 <div class="user_center clearfix">
 <div class="left_style">
     <div class="menu_style">
     <div class="user_title"><a href="/home/user">用户中心</a></div>
     <div class="user_Head">
     <div class="user_portrait">
      <a href="#" title="修改头像" class="btn_link"></a> <img src="{{session('userinfo.profile')}}">
      <div class="background_img"></div>
      </div>
      <div class="user_name">
       <p><span class="name">{{session('userinfo.username')}}</span><a href="/home/xiu">[修改密码]</a></p>
       </div>           
     </div>
     <div class="sideMen">
     <!--菜单列表图层-->
     <dl class="accountSideOption1">
      <dt class="transaction_manage"><em class="icon_1"></em>订单管理</dt>
      <dd>
        <ul>
          <li> <a href="/home/user">我的订单</a></li>
          <li> <a href="/home/receive">收货地址</a></li>
        
        </ul>
      </dd>
    </dl>
     <dl class="accountSideOption1">
      <dt class="transaction_manage"><em class="icon_2"></em>会员管理</dt>
        <dd>
      <ul>
        <li><a href="/home/users/{{session('userinfo.id')}}/edit">用户信息</a></li>
        <li><a href="#">我的收藏</a></li>
        <li><a href="#">我的留言</a></li>
        <li><a href="#">我的标签</a></li>
        <li><a href="#">我的推荐</a></li>
        <li><a href="#">我的评论</a></li>
      </ul>
    </dd>
    </dl>
    </div>
      <script>jQuery(".sideMen").slide({titCell:"dt", targetCell:"dd",trigger:"click",defaultIndex:0,effect:"slideDown",delayTime:300,returnDefault:true});</script>
   </div>
   <!--浏览记录样式-->
   
   
 </div>

 <div class="right_style">
    
    <div class="Notice"><span>系统最新公告:</span>为了更好地服务于【每日鲜】的会员朋友及读者 发表意见。</div>
   <!--样式-->
     <div class="user_info_p_s  clearfix">
       <!--订单记录-->
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
</div>
</div>
</div>
</div>
@endsection
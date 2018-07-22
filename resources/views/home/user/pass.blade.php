
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
        <li><a href="/home/keep">我的收藏</a></li>
        <li><a href="/home/pinglun">我的评论</a></li>
      </ul>
    </dd>
    </dl>
    </div>
      <script>jQuery(".sideMen").slide({titCell:"dt", targetCell:"dd",trigger:"click",defaultIndex:0,effect:"slideDown",delayTime:300,returnDefault:true});</script>
   </div>
   <!--浏览记录样式-->
   
   
 </div>

 <div class="right_style">
    
    <div class="Notice"><span>系统最新公告:</span>修改密码后需重新登录</div>
   <!--样式-->
     <div class="user_info_p_s  clearfix">
       <!--订单记录-->

<div class="right_style">
    <!--消费记录样式-->
    <div class="user_address_style">
        <div class="title_style">
            <em>
            </em>
            修改密码
        </div>
        <!--用户信息样式-->
        <!--个人信息-->

        <div class="Personal_info" id="Personal">
          
            <ul class="xinxi">
            	  <form action="/home/gai" method="POST" >
                <li>
                    <label>
                        原密码：
                    </label>
                    <span>
                        <input name="old" type="password" value="" class="text" 
                        />

                        
                    </span>
                    <font color="red">@foreach ($errors->get('old') as $message) 
                                {{$message}}    
                            @endforeach
                            {{session('old')}}</font>	
                </li>
               
                <li>
                    <label>
                        新密码：
                    </label>
                    <span>
                        <input name="new" type="password" value="" class="text" 
                        />
                    </span>
                     <font color="red">@foreach ($errors->get('new') as $message) 
                                {{$message}}    
                            @endforeach</font>	
                </li>
               
                <li>
                    <label>
                        重复密码：
                    </label>
                    <span>
                        <input name="renew" type="password" value="" class="text" 
                        />
                    </span>
                     <font color="red">@foreach ($errors->get('renew') as $message) 
                                {{$message}}    
                            @endforeach</font>	
                </li>

                
                 <div class="bottom">
                     {{csrf_field()}}
                    <input name="" type="submit" value="确认修改" class="confirm" />
                </div>
            </form>
            </ul>
        </div>
       
    </div>
</div>
</div>
</div>
</div>
</div>

@endsection
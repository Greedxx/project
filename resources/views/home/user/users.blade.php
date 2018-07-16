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
       <div class="left_user_cont">
     <div class="us_Orders left clearfix">
 
  






  
  </div>
    </div>

<div class="right_style">
    <!--消费记录样式-->
    <div class="user_address_style">
        <div class="title_style">
            <em>
            </em>
            用户信息
        </div>
        <!--用户信息样式-->
        <!--个人信息-->

        <div class="Personal_info" id="Personal">
          
            <ul class="xinxi">
            	  <form action="/home/users/{{$res->id}}" method="POST" enctype='multipart/form-data'>
                <li>
                    <label>
                        用户名：
                    </label>
                    <span>
                        <input name="username" type="text" value="{{$res->username}}" class="text" 
                        />
                    </span>
                </li>
               
                
                <li>
                    <label>
                        用户性别：
                    </label>
                    <span class="sex">
                       <input type="radio" name="sex" value="0"  @if($res->sex == '0') checked='checked' @endif >
                        男&nbsp;&nbsp;
                        <input type="radio" name="sex" value="1" @if($res->sex == '1') checked='checked' @endif >
                        女&nbsp;&nbsp;
                    </span>
                   
                </li>
                <li>
                    <label>
                        电子邮箱：
                    </label>
                    <span>
                        <input name="email" type="text" value="{{$res->email}}" class="text" 
                        />
                    </span>
                </li>
               
                <li>
                    <label>
                        移动电话：
                    </label>
                    <span>
                        <input name="phone" type="text" value="{{$res->phone}}" class="text" 
                        />
                    </span>
                </li>
                
                <li>
                    <label>
                        会员：
                    </label>
                    <span>
                      @if($res->status == '0') 普通用户&nbsp;&nbsp; @endif 
                        
                      @if($res->status == '1') <p style="color:red;">vip会员&nbsp;&nbsp;</p> @endif 
                        
                    </span>
                </li>  

                <li>
                    <label>
                        头像:
                    </label>
                    <span>
                        <input name="profile" type="file" value="" class="text"/>
                    </span>
                </li>
                 <div class="bottom">
                     {{csrf_field()}}

                     {{method_field('PUT')}}
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
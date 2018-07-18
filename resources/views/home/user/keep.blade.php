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
        <li><a href="/home/keep">我的收藏</a></li>
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
    
    
   <!--样式-->  <div class="Favorites_slideTxtBox">
     <div class="hd"><ul><li>收藏的商品</li></ul></div>
     <div class="bd">
        <ul class="commodity_list clearfix">
         <div class="Number_Favorites">共收藏：23条</div>
         <div class="clearfix">
          <li class="collect_p">
         <em class="iconfont  delete"></em>
         <a href="#" class="buy_btn">立即购买</a>
       <div class="collect_info">
        <div class="img_link"> <a href="#" class="center "><img src="products/p_4.jpg"></a></div>
        <dl class="xinxi">
         <dt><a href="#" class="name">施华蔻多效修护套包(600ml洗+600ml润+50ml膜)</a></dt>
         <dd><span class="Price"><b>￥</b>321.00</span><span class="collect_Amount"><i class="iconfont icon-shoucang"></i>345</span></dd>         
        </dl>
        </div>
       </li>
        
       </div>
       <div class="Paging">
    <div class="Pagination">
    <a href="#">首页</a>
     <a href="#" class="pn-prev disabled">&lt;上一页</a>
	 <a href="#" class="on">1</a>
	 <a href="#">2</a>
	 <a href="#">3</a>
	 <a href="#">4</a>
	 <a href="#">下一页&gt;</a>
	 <a href="#">尾页</a>	
     </div>
    </div>
        </ul>
        <ul class="Shops_list">
        <div class="Number_Favorites">共收藏：23家店铺</div>
        <li class="">
          <div class="shop_logo">
          
          </div>
          <div class="shop_content">
          
          </div>
        </li>
        </ul>
     </div>
   </div>
   <script>jQuery(".Favorites_slideTxtBox").slide({trigger:"click"});</script>
  
</div>
</div>
</div>

@endsection
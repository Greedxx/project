<!DOCTYPE html PUBLIC >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/css/common.css" rel="stylesheet" type="text/css" />
<link href="/css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/css/login.css">
<script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/js/common_js.js" type="text/javascript"></script>
<script src="/js/footer.js" type="text/javascript"></script>

<title>登陆</title>
</head>

<body>
<head>
 <div id="header_top">
  <div id="top">
    <div class="Inside_pages">
      <div class="Collection">
      	@if(session('username'))
      	<a href="" class="green">欢迎<?php print_r(session('username.0'))  ?></a> <a href="/home/lologin" class="green">退出</a>
		@else
      	<a href="/home/login" class="green">登陆</a> <a href="/home/zhuce" class="green">注册</a>
		@endif
      </div>
	<div class="hd_top_manu clearfix">
	  <ul class="clearfix">
	   <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="/home/index">首页</a></li> 
	   <li class="hd_menu_tit" data-addclass="hd_menu_hover"> <a href="#">我的小充</a> </li>
	   <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="#">消息中心</a></li>
       <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="#">商品分类</a></li>
        <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="#">我的购物车<b>(23)</b></a></li>	
	  </ul>
	</div>
    </div>
  </div>
  <div id="header"  class="header page_style">
  <div class="logo"></div><html lang="en">

<body>
	<div id='header'>
		
		<img id='hy' src='/images/hy.png'>
	</div>
	<div id='mainbody'>
		<div id='content'>
			<div id='login-form'>
			  <div id='lf-top'>
				<span id='lf-top-1'>账户登录</span>
			  </div>
			  <form action='/home/dologin' method='POST'>
			    <div id='lf-uname'>
				   <i></i>
				   <input  type='text' name='username' />
				   <div id="bbb" >
					  @if(session('error')) {{session('error')}} @endif
					  
					</div>
				</div>
				<div id='lf-upwd'>
				   <i></i>
				   <input  type='password' name='password' /> 
				   <div id="aaa" >
					  @if(session('error')) {{session('error')}} @endif
					</div>
				</div>

				 {{csrf_field()}}
				<input id='lf-submit' type='submit' value='登&nbsp;&nbsp;&nbsp;录'>
				<div id='lf-bottom'>
                   <span>微博</span>
                   <span>QQ</span>
                   <span>微信</span>
                   <a href="/home/zhuce"><span><i></i>立即注册</span></a>
				</div>
			  </form>
			</div>
		</div>
	</div>
<!--网站地图-->
<div class="fri-link-bg clearfix">
    <div class="fri-link">
        <div class="logo left margin-r20"><img src="/images/fo-logo.jpg" width="152" height="81" /></div>
        <div class="left"><img src="/images/qd.jpg" width="90"  height="90" />
            <p>扫描下载APP</p>
        </div>
       <div class="">
    <dl>
	 <dt>新手上路</dt>
	 <dd><a href="#">售后流程</a></dd>
     <dd><a href="#">购物流程</a></dd>
     <dd><a href="#">订购方式</a> </dd>
     <dd><a href="#">隐私声明 </a></dd>
     <dd><a href="#">推荐分享说明 </a></dd>
	</dl>
	<dl>
	 <dt>配送与支付</dt>
	 <dd><a href="#">保险需求测试</a></dd>
     <dd><a href="#">专题及活动</a></dd>
     <dd><a href="#">挑选保险产品</a> </dd>
     <dd><a href="#">常见问题 </a></dd>
	</dl>
	<dl>
	 <dt>售后保障</dt>
	 <dd><a href="#">保险需求测试</a></dd>
     <dd><a href="#">专题及活动</a></dd>
     <dd><a href="#">挑选保险产品</a> </dd>
     <dd><a href="#">常见问题 </a></dd>
	</dl>
	<dl>
	 <dt>支付方式</dt>
	 <dd><a href="#">保险需求测试</a></dd>
     <dd><a href="#">专题及活动</a></dd>
     <dd><a href="#">挑选保险产品</a> </dd>
     <dd><a href="#">常见问题 </a></dd>
	</dl>	
    <dl>
	 <dt>帮助中心</dt>
	 <dd><a href="#">保险需求测试</a></dd>
     <dd><a href="#">专题及活动</a></dd>
     <dd><a href="#">挑选保险产品</a> </dd>
     <dd><a href="#">常见问题 </a></dd>
	</dl>
     <dl>
	 <dt>帮助中心</dt>
	 <dd><a href="#">保险需求测试</a></dd>
     <dd><a href="#">专题及活动</a></dd>
     <dd><a href="#">挑选保险产品</a> </dd>
     <dd><a href="#">常见问题 </a></dd>
	</dl>
     <dl>
	 <dt>帮助中心</dt>
	 <dd><a href="#">保险需求测试</a></dd>
     <dd><a href="#">专题及活动</a></dd>
     <dd><a href="#">挑选保险产品</a> </dd>
     <dd><a href="#">常见问题 </a></dd>
	</dl>	   
   </div>
    </div>
</div>
<!--网站地图END-->	
<div class="copyright">
<div class="copyright-bg">
    <div class="hotline">为生活充电在线 <span>招商热线：****-********</span> 客服热线：400-******</div>
    <div class="hotline co-ph">
        <p>版权所有Copyright ©***************</p>
        <p>*ICP备***************号 不良信息举报</p>
        <p>总机电话：****-*********/194/195/196 客服电话：4000****** 传 真：********
            
            <a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
    </div>
</div>
</div>
</body>
</html>
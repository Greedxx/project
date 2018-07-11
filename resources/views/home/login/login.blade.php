<!DOCTYPE html PUBLIC >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/css/common.css" rel="stylesheet" type="text/css" />
<link href="/css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/css/login.css">
<link href="/home/css/base.css" rel="stylesheet" type="text/css" />
<script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/js/common_js.js" type="text/javascript"></script>
<script src="/js/footer.js" type="text/javascript"></script>

<title>登陆</title>
</head>

<body>
<head>
 <div class="top">
        <div class="top-c">
            <div class="top-left">
                <a href="javascript:;" class="collect">收藏</a>
                <a href="javascript:;" class="wechat">微信</a>
            </div>
            <div class="top-right">
                <p>嗨，欢迎来到仙女商城</p>
                @if(session('username'))
                    <p><a href="/home/users/{{session('userinfo.id')}}/edit"><?php echo session('userinfo.username')   ?></a> | <a href="/home/lologin">退出</a></p>
                @else
                    <p><a href="/home/login">请登录</a> | <a href="/home/zhuce">免费注册</a></p>
                @endif
                <p><a href="javascript:;">我的订单</a> | <a href="javascript:;">服务中心</a></p>
            </div>
        </div>
    </div>

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
<div class="footer">
        <div class="footer-c">
            

            <dl>
                <dt>购买指南</dt>
                <dd><a href="#">第一次购物体验</a></dd>
                <dd><a href="#">品质保证原则</a></dd>
                <dd><a href="#">会员申请条件</a></dd>
            </dl>
            <dl>
                <dt>支付方式</dt>
                <dd><a href="#">网银在线支付</a></dd>
                <dd><a href="#">支付宝支付</a></dd>
                <dd><a href="#">银联在线支付</a></dd>
            </dl>
            <dl>
                <dt>配送方式</dt>
                <dd><a href="#">配送方式</a></dd>
            </dl>
            <dl>
                <dt>售后服务</dt>
                <dd><a href="#">联系客服</a></dd>
                <dd><a href="#">订单查询</a></dd>
                <dd><a href="#">退换货流程及原则</a></dd>
            </dl>
            
            <div class="col-contact">
                <p class="phone">400-100-5678</p>
                <p>周一至周日 8:00-18:00<br />（仅收市话费）</p>
                <input type="button" value="在线客户" />
            </div>
            <div class="clr20"></div>
            <div class="footer-b">
                <p><a href="#">关于我们</a>  |  <a href="https://item.taobao.com/item.htm?spm=a1z10.1-c.w4004-11895250131.3.YOZUX7&id=521741523734">手机商城</a>  |  <a href="#">联系我们</a></p>
                <p>2013 © DEHUA.com,All Rights Reserver. cz科技 版权所有　　网站备案号：闽ICP备0000号-1</p>
            </div>
        </div>
    </div>
</body>
</html>
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
                   <a href="/home/nopass"><span><i></i>忘记密码</span></a>
				</div>
			  </form>
			</div>
		</div>
	</div>
<!--网站地图-->
    <div class="a1">
        <div class="a01">
            <div class="a001">
                <div class="a0001"><img src="/home/images/footer/01.png"><p>顺丰包邮</p></div>
                <div class="a0001"><img src="/home/images/footer/02.png"><p>100+ 城市次日到</p></div>
                <div class="a0001"><img src="/home/images/footer/03.png"><p>7天无理由退货</p></div>
                <div class="a0001"><img src="/home/images/footer/04.png"><p>15天换货保障</p></div>
                <div class="a0001"><img src="/home/images/footer/08.png"><p>上门快修</p></div>
                <div class="a0001"><img src="/home/images/footer/06.png"><p>230+ 线下体验店</p></div>
                <div class="a0001"><img src="/home/images/footer/07.png"><p>远程支持服务</p></div>
                <div class="a0001"><img src="/home/images/footer/05.png"><p>1年免费保修</p></div>
            </div>
            <div class="a002">
                <p class="riqi">周一至周日 7：30-24：00</p>
                <a href="" class="dianhua">400-788-3333</a>
                <div class="zaixiankefu"><img src="/home/images/footer/09.png"><p class="kefu1">在线客服</p></div>
            </div>  
            
        </div>
        <?php $data = App\Models\admin\Links::limit(9)->get()->toArray() ?>
        <div class="b02">
            <div class="b001">


                @foreach($data as $k=>$v)

                    @if($k==0)
                        <a href="{{$v['url']}}" class="b0001">{{$v['lname']}}</a>
                    @else
                        <a href="{{$v['url']}}" class="b0001">|&nbsp;{{$v['lname']}}</a>
                    @endif

                @endforeach 
            </div>
            
            <div class="b002">
                <a href="" class="b0002">©2018 Meizu Telecom Equipment Co.</a>
                <a href="" class="b0002">粤ICP备13003602号-2</a>
                <a href="" class="b0002">合字B2-20170010</a>
                <a href="" class="b0002">营业执照</a>
                <a href="" class="b0002">法律声明</a>
                <a href="" class="b00002">粤公网安备 44049102496009</a>
            </div>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>用户注册</title>
		<link rel="stylesheet" type="text/css" href="/other/css/login.css">
 
	</head>
	<body>
		<form  method="post" action="/home/dozhuce">
		<div class="regist">
			<div class="regist_center"> 
				<div class="regist_top">
					<div class="left fl">会员注册</div>
					<div class="right fr"><a href="/home/login" target="_self">登陆</a>&nbsp;&nbsp;<a href="/" target="_self">首页</a></div>
					<div class="clear"></div>
					<div class="xian center"></div>
				</div>
				<div class="regist_main center">
					<div class="username">用&nbsp;&nbsp;户&nbsp;&nbsp;名:&nbsp;&nbsp;<input class="shurukuang" type="text" name="username" placeholder="请输入你的用户名"/><span>@foreach ($errors->get('username') as $message) 
								{{$message}}	
							@endforeach</span></div> 
				
					<div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;&nbsp;<input class="shurukuang" type="password" name="password" placeholder="请输入你的密码"/><span>@foreach ($errors->get('password') as $message) 
								{{$message}}	
							@endforeach</span></div>
					
					<div class="username">确认密码:&nbsp;&nbsp;<input class="shurukuang" type="password" name="repass" placeholder="请确认你的密码"/><span>@foreach ($errors->get('repass') as $message) 
								{{$message}}	
							@endforeach</span></div>

					<div class="username">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱:&nbsp;&nbsp;<input class="shurukuang" type="text" name="email" placeholder="请填写你的邮箱"/><span>@foreach ($errors->get('email') as $message) 
								{{$message}}	
							@endforeach</span></div>


					<div class="username">手&nbsp;&nbsp;机&nbsp;&nbsp;号:&nbsp;&nbsp;<input class="shurukuang" type="text" name="phone" placeholder="请填写正确的手机号"/><span>@foreach ($errors->get('phone') as $message) 
								{{$message}}	
							@endforeach</span></div>

					<div class="username">
						<div class="left fl">验&nbsp;&nbsp;证&nbsp;&nbsp;码:&nbsp;&nbsp;<input class="yanzhengma" type="text" name="code" placeholder="请输入验证码"/></div>
						<div class="right fl"><img src="/home/captcha" onclick="this.src='/home/captcha/?'+Math.random()" title="点击图片重新获取验证码" ><span>@if(session('error')) {{session('error')}} @endif</span>
						<div class="clear"></div>
					</div>

				</div>
				<div class="regist_submit">
					{{csrf_field()}}
					<input class="submit" type="submit" name="submit" value="立即注册" >
					
				</div>
				
			</div>
		</div>
		</form>
	</body>
</html>
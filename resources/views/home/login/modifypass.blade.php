<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
        <title>修改密码</title>
        <link rel="stylesheet" type="text/css" href="/other/css/login.css">
 
    </head>
    <body>
        <form  method="post" action="/home/passedit">
        <div class="regist">
            <div class="regist_center">
                <div class="regist_top">
                    <div class="left fl">修改密码</div>
                    <div class="right fr"><a href="/home/login" target="_self">登陆</a>&nbsp;&nbsp;<a href="/" target="_self">首页</a></div>
                    <div class="clear"></div>
                    <div class="xian center"></div>
                </div>
                <div class="regist_main center">
                    
                    <div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;&nbsp;<input class="shurukuang" type="password" name="password" placeholder="请输入你的密码"/><span>@foreach ($errors->get('password') as $message) 
                                {{$message}}    
                            @endforeach</span></div>
                    
                    <div class="username">确认密码:&nbsp;&nbsp;<input class="shurukuang" type="password" name="repass" placeholder="请确认你的密码"/><span>@foreach ($errors->get('repass') as $message) 
                                {{$message}}    
                            @endforeach</span></div>

                </div>
                <div class="regist_submit">
                    {{csrf_field()}}
                    <input class="submit" type="submit" name="" value="立即修改" >
                    
                </div>
                
            </div>
        </div>
        </form>
    </body>
</html>
<!DOCTYPE html PUBLIC >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/css/common.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/css/login.css">
<link href="/home/css/base.css" rel="stylesheet" type="text/css" />
<link href="/css/style123.css" rel="stylesheet" type="text/css" media="all" />
<script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/js/common_js.js" type="text/javascript"></script>
<script src="/js/footer.js" type="text/javascript"></script>

<title>登陆</title>
</head>


<head>
 <div class="top">
        <div class="top-c">
          
            <div class="top-right">
                <p>嗨，欢迎来到仙女商城</p>
                @if(session('username'))
                    <p><a href="/home/users/{{session('userinfo.id')}}/edit"><?php echo session('userinfo.username')   ?></a> | <a href="/home/lologin">退出</a></p>
                @else
                    <p><a href="/home/login">请登录</a> | <a href="/home/zhuce">免费注册</a></p>
                @endif
                <p>| <a href="javascript:;">服务中心</a></p>
            </div>
        </div>
    </div>

<body>
    
    
        <div class="main-w3lsrow">
            <!-- login form -->
            <div class="login-form login-form-left"> 
                <div class="agile-row">
                    <h2>仙女商城</h2> 
                    <div class="login-agileits-top">    
                        <form action="/home/dologin" method="post"> 
                            <p>用户名 </p>
                            <input type="text" class="name" name="username" required=""/>
                                 <label class="anim" style="color:red;">
                                    <span> @if(session('error')) {{session('error')}} @endif</span>
                                </label>   
                            <p>密码 </p>
                            <input type="password" class="password" name="password" required=""/>
                                <label class="anim" style="width: 210px;color:red;">
                                    <span> @if(session('error')) {{session('error')}} @endif</span>
                                </label>  
                           
                          
                       
                            
                             {{csrf_field()}}   
                            <input type="submit" value="登陆"> 
                        </form>     
                    </div> 
                    <div class="login-agileits-bottom"> 
                        <h6><a href="/home/nopass">忘记密码?</a> <a href="/home/zhuce">立即注册</a></h6>
                    </div> 
                </div>  
            </div>  
        </div>  
     
        <!-- //copyright --> 
    







    
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
   <script type="text/javascript" src="https://cdn.bootcss.com/canvas-nest.js/1.0.1/canvas-nest.min.js">
!function(){function n(n,e,t){return n.getAttribute(e)||t}function e(n){return document.getElementsByTagName(n)}
function t(){var t=e("script"),o=t.length,i=t[o-1];return{l:o,z:n(i,"zIndex",-1),o:n(i,"opacity",.5),c:n(i,"color","0,0,0")
,n:n(i,"count",99)}}function o(){a=m.width=window.innerWidth||document.documentElement.clientWidth||document.body.clientWidt
h,c=m.height=window.innerHeight||document.documentElement.clientHeight||document.body.clientHeight}function i(){r.clearRect
(0,0,a,c);var n,e,t,o,m,l;s.forEach(function(i,x){for(i.x+=i.xa,i.y+=i.ya,i.xa*=i.x>a||i.x<0?-1:1,i.ya*=i.y>c||i.y<0?-1:1,r.
fillRect(i.x-.5,i.y-.5,1,1),e=x+1;e<u.length;e++)n=u[e],null!==n.x&&null!==n.y&&(o=i.x-n.x,m=i.y-n.y,l=o*o+m*m,l<n.max&&(n===
y&&l>=n.max/2&&(i.x-=.03*o,i.y-=.03*m),t=(n.max-l)/n.max,r.beginPath(),r.lineWidth=t/2,r.strokeStyle="rgba("+d.c+","+(t+.2)+")
",r.moveTo(i.x,i.y),r.lineTo(n.x,n.y),r.stroke()))}),x(i)}var a,c,u,m=document.createElement("canvas"),d=t(),l="c_n"+d.l,r=m.
getContext("2d"),x=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.
oRequestAnimationFrame||window.msRequestAnimationFrame||function(n){window.setTimeout(n,1e3/45)},w=Math.random,y={x:null,y:nul
l,max:2e4};m.id=l,m.style.cssText="position:fixed;top:0;left:0;z-index:"+d.z+";opacity:"+d.o,e("body")[0].appendChild(m),o(),
window.onresize=o,window.onmousemove=function(n){n=n||window.event,y.x=n.clientX,y.y=n.clientY},window.onmouseout=function(){y
.x=null,y.y=null};for(var s=[],f=0;d.n>f;f++){var h=w()*a,g=w()*c,v=2*w()-1,p=2*w()-1;s.push({x:h,y:g,xa:v,ya:p,max:6e3})}u=
s.concat([y]),setTimeout(function(){i()},100)}();
</script>
　

</body>

</html>
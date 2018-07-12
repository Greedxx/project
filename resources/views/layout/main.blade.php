<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="order by dede58.com"/>
<title>@yield('title')</title>

<link href="/bs/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/bs/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/home/js/jquery-1.7.1.min.js"></script>
<script> var $jq = jQuery.noConflict(true); </script>
<!-- <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>  -->

<script type="text/javascript" src="/bs/js/bootstrap.min.js"></script>


<link href="/home/css/base.css" rel="stylesheet" type="text/css" />
<link href="/home/css/index.css" rel="stylesheet" type="text/css" />

@section('css')
<link href="/home/css/pro-list.css" rel="stylesheet" type="text/css" />
<link href="/home/css/user.css" rel="stylesheet" type="text/css" />
<link href="/home/css/pro-detailed.css" rel="stylesheet" type="text/css" />             
@show

</head>

<body>
    <!------------top---------------->
    <div class="top">
        <div class="top-c">
            <div class="top-left">
                <a href="javascript:;" class="collect">收藏</a>
                <a href="javascript:;" class="wechat">微信</a>
            </div>
            <div class="top-right">
                <p>嗨，欢迎来到仙女商城</p>
                <p><a href="login.html">请登录</a> | <a href="register.html">免费注册</a></p>
                <p><a href="javascript:;">我的订单</a> | <a href="javascript:;">服务中心</a></p>
            </div>
        </div>
    </div>

    <!------------myheader---------------->
    <div class="myheader">
        <div class="logo"><a href="index.html"><img src="/home/images/logo.png" width="190" /></a></div>

        <div class="myheader-right">
            <form action="/cate" method="get">
                <div class="search-section">
                    <div class="keywords"><input name="keywords"  type="text"  value="请输入关键字" onFocus="this.value=''" onBlur="if(!value){value=defaultValue;}"/></div>
                    <div class="mybtn"></div>
                </div>
            </form>
            <div class="cart-section">
                <p>购物车(1)</p>
                <div class="hidden-cart">
                    <p>购物车(1)</p>
                </div>
                <div class="hidden-cart-c">
                    <ul>
                        <li>
                            <a href="#"><img src="home/images/00.jpg" width="60" height="60" /></a>
                            <p><a href="#">小米盒子增强版 1G 黑色</a></p>
                            <pre>299元 x 1</pre>
                            <ins>x</ins>
                        </li>
                        <li>
                            <a href="#"><img src="home/images/00.jpg" width="60" height="60" /></a>
                            <p><a href="#">小米盒子增强版 1G 黑色</a></p>
                            <pre>299元 x 1</pre>
                            <ins>x</ins>
                        </li>
                    </ul>
                    <div class="cart-mybtn">
                        <p>共计 2 件商品<span>合计：<strong>928.90元</strong></span></p>
                        <input type="button" value="去结算" />
                    </div>
                    <!--------购物车暂无产品--------------->
                    <div class="cart-not hidden">购物车中还没有商品，赶紧选购吧！</div>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="/home/js/Public.js"></script>
    
    <!------------myheader-wrap---------------->
    <?php 
        $data = App\Models\Cate::where('pid',0)->limit(5)->get(); 
        $cate = App\Models\Cate::getCates();
        // dump($cate);
    ?>
    <div class="myheader-wrap">
        <div class="mynavwrap">
            <div id="mynav">
                <div class="mynavbar myclearfix">

                    <a class="current" href="index.html">首页</a>
                    @foreach ($data as $k =>$v)
                    <a href="/list/{{$v['cate_id']}}">{{$v['cate_name']}}</a>
                    @endforeach
                    <a href="/service">服务帮助</a>
                    <a href="/content">评测推荐<em class="sale"></em></a>
                </div>
                                                            
                <div class="pros subpage">
                    <h2>全部商品分类</h2>
                    <ul class="prosul myclearfix" id="proinfo" style="display:none">
                       @foreach ($cate as $k =>$v)
                        <li>

                            <h3><a href="/list?id={{$v['cate_id']}}">{{$v['cate_name']}}</a> </h3>

                                
                                @foreach ($v['sub'] as $k2 =>$v2)
                                <a href="/list?id={{$v2['cate_id']}}">{{--$v2['cate_name']--}}</a>
 
                                    <div class="prosmore hide">
                                        @foreach ($v['sub'] as $kk =>$vv)
                                        <span><em><a href="/list?id={{$vv['cate_id']}}">{{$vv['cate_name']}}</a></em></span>
                                        <!-- <span><em class="morehot"><a class="morehot" href="#">电锁门禁</a></em></span> -->
                                        @endforeach
                                    </div>

                                 @endforeach

                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    
    <!------------main---------------->
    @section('content')

                    

    @show
     <!------底部-------->
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


    @section('js')

                    

    @show


</body>

</html>

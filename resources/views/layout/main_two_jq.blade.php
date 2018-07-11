<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="order by dede58.com"/>
<title>@yield('title')</title>

<!-- <link href="/bs/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/bs/css/bootstrap-theme.css" rel="stylesheet" type="text/css" /> -->


<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/home/js/jquery-1.7.1.min.js"></script>
<script> var $jq = jQuery.noConflict(true); </script>
<!-- <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>  -->

<script type="text/javascript" src="/bs/js/bootstrap.min.js"></script>





<link href="/home/css/base.css" rel="stylesheet" type="text/css" />
<link href="/home/css/index.css" rel="stylesheet" type="text/css" />
<link href="/home/css/pro-list.css" rel="stylesheet" type="text/css" />
<link href="/home/css/user.css" rel="stylesheet" type="text/css" />
<link href="/home/css/pro-detailed.css" rel="stylesheet" type="text/css" />
 



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

    <!------------header---------------->
    <div class="header">
        <div class="logo"><a href="index.html"><img src="home/images/logo.png" width="190" /></a></div>

        <div class="header-right">
            <div class="search-section">
                <div class="keyword"><input name="keyword"  type="text"  value="请输入关键字" onFocus="this.value=''" onBlur="if(!value){value=defaultValue;}"/></div>
                <div class="btn"></div>
            </div>
            
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
                    <div class="cart-btn">
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
    
    <!------------header-wrap---------------->
    <?php 
        $data = App\Models\Cate::where('pid',0)->limit(5)->get(); 
        $cate = App\Models\Cate::getCates();
        // dump($cate);
    ?>
    <div class="header-wrap">
        <div class="navwrap">
            <div id="nav">
                <div class="navbar clearfix">

                    <a class="current" href="index.html">首页</a>
                    @foreach ($data as $k =>$v)
                    <a href="products-list.html">{{$v['cate_name']}}</a>
                    @endforeach
                    <a href="#">品牌一览</a>
                    <a href="#">折扣区<em class="sale"></em></a>
                </div>
                                                            
                <div class="pros subpage">
                    <h2>全部商品分类</h2>
                    <ul class="prosul clearfix" id="proinfo" style="display:none">
                       @foreach ($cate as $k =>$v)
                        <li>
                              
                            <h3>{{$v['cate_name']}} </h3>
                                
                                @foreach ($v['sub'] as $k2 =>$v2)
                                <a href="#">{{$v2['cate_name']}}</a>
 
                                    <div class="prosmore hide">
                                        @foreach ($v['sub'] as $kk =>$vv)
                                        <span><em><a href="#">{{$vv['cate_name']}}</a></em></span>
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

    @section('js')

                    

    @show


</body>

</html>

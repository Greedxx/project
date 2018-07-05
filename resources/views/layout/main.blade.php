<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="order by dede58.com"/>
<title>@yield('title')</title>
<link href="/home/css/base.css" rel="stylesheet" type="text/css" />
<link href="/home/css/index.css" rel="stylesheet" type="text/css" />
<link href="/home/css/pro-list.css" rel="stylesheet" type="text/css" />
<link href="/home/css/user.css" rel="stylesheet" type="text/css" />
<link href="/home/css/pro-detailed.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/home/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/home/js/Public.js"></script>
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
                <p>嗨，欢迎来到XXX商城</p>
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
    
    <!------------header-wrap---------------->
    <div class="header-wrap">
        <div class="navwrap">
            <div id="nav">
                <div class="navbar clearfix">
                    <a class="current" href="index.html">首页</a>
                    <a href="products-list.html">环境控制</a>
                    <a href="products-list.html">视听娱乐</a>
                    <a href="products-list.html">安全防护</a>
                    <a href="products-list.html">信息通讯</a>
                    <a href="products-list.html">智能设备</a>
                    <a href="#">品牌一览</a>
                    <a href="#">折扣区<em class="sale"></em></a>
                </div>
                                                            
                <div class="pros subpage">
                    <h2>全部商品分类</h2>
                    <ul class="prosul clearfix" id="proinfo" style="display:block">
                        <li>
                            <h3>环境控制</h3>
                            <a href="#">中控主机</a>
                            <a href="#">智能照明</a>
                            <a href="#">电器控制</a>
                            <div class="prosmore hide">
                                <span><em><a href="#">中控主机</a></em></span>
                                <span><em class="morehot"><a class="morehot" href="#">智能照明</a></em></span>
                                <span><em class="morehot"><a class="morehot" href="#">电器控制</a></em></span>
                                <span><em><a href="#">电动窗帘</a></em></span>
                                <span><em><a href="#">暖通空调</a></em></span>
                                <span><em><a href="#">太阳能与节能设备</a></em></span>
                                <span><em><a href="#">花草自动浇灌</a></em></span>
                            </div>
                        </li>
                        <li>
                            <h3>视听娱乐</h3>
                            <a href="#">家庭背景音乐</a>
                            <a href="#">家庭影院</a>
                            <div class="prosmore hide">
                                <span><em><a href="#">家庭背景音乐</a></em></span>
                                <span><em class="morehot"><a class="morehot" href="#">家庭影院</a></em></span>
                                <span><em class="morehot"><a class="morehot" href="#">厨卫电视系统</a></em></span>
                                <span><em><a href="#">智能视频共享</a></em></span>
                            </div>
                        </li>
                        <li>
                            <h3>安全防护</h3>
                            <a href="#">视频监控</a>
                            <a href="#">防盗报警</a>
                            <a href="#">电锁门禁</a>
                            <div class="prosmore hide">
                                <span><em><a href="#">视频监控</a></em></span>
                                <span><em class="morehot"><a class="morehot" href="#">防盗报警</a></em></span>
                                <span><em class="morehot"><a class="morehot" href="#">电锁门禁</a></em></span>
                                <span><em><a href="#">宠物照看与动物管制</a></em></span>
                                <span><em><a href="#">追踪定位</a></em></span>
                            </div>
                        </li>
                        <li>
                            <h3>信息通讯</h3>
                            <a href="#">可视对讲</a>
                            <a href="#">家居布线</a>
                            <a href="#">智能软件</a>
                            <div class="prosmore hide">
                                <span><em><a href="#">可视对讲</a></em></span>
                                <span><em><a href="#">家居布线</a></em></span>
                                <span><em class="morehot"><a class="morehot" href="#">智能软件</a></em></span>
                                <span><em><a href="#">手机、网络远程控制</a></em></span>
                                <span><em><a href="#">家庭网络</a></em></span>
                            </div>
                        </li>
                        <li>
                            <h3>智能设备</h3>
                            <a href="#">智能穿戴</a>
                            <a href="#">运动器材与健康监测</a>
                            <div class="prosmore hide">
                                <span><em><a href="#">智能穿戴</a></em></span>
                                <span><em class="morehot"><a class="morehot" href="#">运动器材与健康监测</a></em></span>
                                <span><em><a href="#">智能手机与外设</a></em></span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    
    <!------------main---------------->
    @section('content')

                        123456464545

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


</body>

</html>

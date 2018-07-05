@extends('layout.main')
@section('title', 'new Title')
@section('content')
    
    <!------------banner---------------->
    <div id="banner">
        <div class="fullSlide">
            <div class="bd">
                <ul>
                    <li _src="url(/home/images/banner.jpg)" style="background:#000 center 0 no-repeat;"><a href="https://shop116998991.taobao.com/"></a></li>
                    <li _src="url(/home/images/2.jpg)" style="background:#DED5A1 center 0 no-repeat;"><a href="https://item.taobao.com/item.htm?spm=a1z10.1-c.w5003-11903850250.1.YOZUX7&id=521221929103&scene=taobao_shop"></a></li>
                    <li _src="url(/home/images/5.jpg)" style="background:#FEFF19 center 0 no-repeat;"><a href="https://item.taobao.com/item.htm?spm=a1z10.1-c.w4004-11895250131.3.YOZUX7&id=521741523734"></a></li>
                </ul>
            </div>
            <div class="hd"><ul></ul></div>
            <span class="prev"></span>
            <span class="next"></span>
        </div>
    </div>
    <!--------banner特效--------------->
    <script type="text/javascript" src="/home/js/index.js"></script>
    <script type="text/javascript">
    // alert($);
    $(function(){
        /*------------------------------购物车效果-----------------------------------*/     
        $(".cart-section").hover(function(){
            $(".hidden-cart").css("display","block");
            $(".hidden-cart-c").css("display","block");
        },function(){
            $(".hidden-cart").css("display","none");
            $(".hidden-cart-c").css("display","none");
            })  
        
        $(".hidden-cart-c ul li ins").click(function(){
            $(this).parents('li').remove();
        })
    })

    /*------------------------------banner特效-----------------------------------*/
        $(".fullSlide").hover(function(){
            $(this).find(".prev,.next").stop(true, true).fadeTo("show", 0.5)
        },
        function(){
            $(this).find(".prev,.next").fadeOut()
        });
        $(".fullSlide").slide({
            titCell: ".hd ul",
            mainCell: ".bd ul",
            effect: "fold",
            autoPlay: true,
            autoPage: true,
            trigger: "click",
            startFun: function(i) {
                var curLi = jQuery(".fullSlide .bd li").eq(i);
                if ( !! curLi.attr("_src")) {
                    curLi.css("background-image", curLi.attr("_src")).removeAttr("_src")
                }
            }
    });
    </script>
    <script src="/js/holder.js"></script>
	<div class="main">
    	<!------热门推荐-------->
    	<div class="recommend">
        	<div class="title"><img src="home/images/rt.png" /><p>热门商品</p></div>
        	<div class="clr20"></div>
            <div class="left">
            	<div class="img"><a href="#"><img src="home/images/501.gif" width="619" height="309" /></a></div>
                <div class="img img_309"><p><strong><a href="#">小米平板冰淇淋软胶保护套</a></strong><span>59元</span></p><a href="#"><img src="home/images/502.jpg" width="220" height="220"/></a></div>
                <div class="img img_309"><p><strong><a href="#">小米平板冰淇淋软胶保护套</a></strong><span>59元</span></p><a href="#"><img src="home/images/502.jpg" width="220" height="220"/></a></div>
                <div class="img img_309"><p><strong><a href="#">小米平板冰淇淋软胶保护套</a></strong><span>59元</span></p><a href="#"><img src="home/images/502.jpg" width="220" height="220"/></a></div>
                <div class="img img_309"><p><strong><a href="#">小米平板冰淇淋软胶保护套</a></strong><span>59元</span></p><a href="#"><img src="home/images/502.jpg" width="220" height="220"/></a></div>
            </div>
            <div class="right">
            	<h2><span>TOP 5</span>热销商品</h2>
                <ul class="board-list">
                	<li>
                    	<span class="item-num top3">1</span>
                        <span class="item-info">
                        	<span class="item-title"><a href="#">小米活塞耳机简装版</a></span>
                            <span class="item-price">49元 </span>
                        </span>
                        <span class="item-thumb"><a href="#"><img src="home/images/01.jpg" width="70" height="70" /></a></span>
                    </li>
                    <li>
                    	<span class="item-num top3">2</span>
                        <span class="item-info">
                        	<span class="item-title"><a href="#">小米活塞耳机简装版</a></span>
                            <span class="item-price">49元 </span>
                        </span>
                        <span class="item-thumb"><a href="#"><img src="home/images/02.jpg" width="70" height="70" /></a></span>
                    </li>
                    <li>
                    	<span class="item-num top3">3</span>
                        <span class="item-info">
                        	<span class="item-title"><a href="#">小米活塞耳机简装版</a></span>
                            <span class="item-price">49元 </span>
                        </span>
                        <span class="item-thumb"><a href="#"><img src="home/images/502.jpg" width="70" height="70" /></a></span>
                    </li>
                    <li>
                    	<span class="item-num">4</span>
                        <span class="item-info">
                        	<span class="item-title"><a href="#">小米活塞耳机简装版</a></span>
                            <span class="item-price">49元 </span>
                        </span>
                        <span class="item-thumb"><a href="#"><img src="home/images/04.jpg" width="70" height="70" /></a></span>
                    </li>
                    <li>
                    	<span class="item-num">5</span>
                        <span class="item-info">
                        	<span class="item-title"><a href="#">小米活塞耳机简装版</a></span>
                            <span class="item-price">49元 </span>
                        </span>
                        <span class="item-thumb"><a href="#"><img src="home/images/05.jpg" width="70" height="70" /></a></span>
                    </li>
                </ul>
            </div>
        </div>
        <div class = "guangao">
            <img src="holder.js/1240x200">
        </div>
        <!------热门推荐-------->
        <div class="list-title">
        	<p><strong style="border-bottom:solid 2px #00c3d5;">环境控制</strong></p><a href="#">More</a>
        </div>
        <div class="list-div">
        	<ul>
            	<li>
                    <a href="#"><img src="home/images/401.jpg" width="220" height="220" /></a>
                    <p><a href="#">趣味防尘塞 MI标</a></p>
                    <pre>适用于小米平板, 所有手机适用于小米平板, 所有手机</pre>
                </li>
                <li>
                    <a href="#"><img src="home/images/401.jpg" width="220" height="220" /></a>
                    <p><a href="#">趣味防尘塞 MI标</a></p>
                    <pre>适用于小米平板, 所有手机适用于小米平板, 所有手机</pre>
                </li>
                <li>
                    <a href="#"><img src="home/images/401.jpg" width="220" height="220" /></a>
                    <p><a href="#">趣味防尘塞 MI标</a></p>
                    <pre>适用于小米平板, 所有手机适用于小米平板, 所有手机</pre>
                </li>
                <li>
                    <a href="#"><img src="home/images/401.jpg" width="220" height="220" /></a>
                    <p><a href="#">趣味防尘塞 MI标</a></p>
                    <pre>适用于小米平板, 所有手机适用于小米平板, 所有手机</pre>
                </li>
            </ul>
        </div>
        
        <!------视听娱乐-------->
        <div class="list-title">
        	<p><strong style="border-bottom:solid 2px #54cb00;">视听娱乐</strong></p><a href="#">More</a>
        </div>
        <div class="list-div">
        	<ul>
            	<li>
                    <a href="#"><img src="home/images/502.jpg" width="220" height="220" /></a>
                    <p><a href="#">趣味防尘塞 MI标</a></p>
                    <pre>适用于小米平板, 所有手机适用于小米平板, 所有手机</pre>
                </li>
                <li>
                    <a href="#"><img src="home/images/502.jpg" width="220" height="220" /></a>
                    <p><a href="#">趣味防尘塞 MI标</a></p>
                    <pre>适用于小米平板, 所有手机适用于小米平板, 所有手机</pre>
                </li>
                <li>
                    <a href="#"><img src="home/images/502.jpg" width="220" height="220" /></a>
                    <p><a href="#">趣味防尘塞 MI标</a></p>
                    <pre>适用于小米平板, 所有手机适用于小米平板, 所有手机</pre>
                </li>
                <li>
                    <a href="#"><img src="home/images/502.jpg" width="220" height="220" /></a>
                    <p><a href="#">趣味防尘塞 MI标</a></p>
                    <pre>适用于小米平板, 所有手机适用于小米平板, 所有手机</pre>
                </li>
            </ul>
        </div>
        
        <!------安全防护-------->
        <div class="list-title">
        	<p><strong style="border-bottom:solid 2px #1d7ad9;">安全防护</strong></p><a href="#">More</a>
        </div>
        <div class="list-div">
        	<ul>
            	<li>
                    <a href="#"><img src="home/images/401.jpg" width="220" height="220" /></a>
                    <p><a href="#">趣味防尘塞 MI标</a></p>
                    <pre>适用于小米平板, 所有手机适用于小米平板, 所有手机</pre>
                </li>
                <li>
                    <a href="#"><img src="home/images/401.jpg" width="220" height="220" /></a>
                    <p><a href="#">趣味防尘塞 MI标</a></p>
                    <pre>适用于小米平板, 所有手机适用于小米平板, 所有手机</pre>
                </li>
                <li>
                    <a href="#"><img src="home/images/401.jpg" width="220" height="220" /></a>
                    <p><a href="#">趣味防尘塞 MI标</a></p>
                    <pre>适用于小米平板, 所有手机适用于小米平板, 所有手机</pre>
                </li>
                <li>
                    <a href="#"><img src="home/images/401.jpg" width="220" height="220" /></a>
                    <p><a href="#">趣味防尘塞 MI标</a></p>
                    <pre>适用于小米平板, 所有手机适用于小米平板, 所有手机</pre>
                </li>
            </ul>
        </div>
        
        <!------信息通讯-------->
        <div class="list-title">
        	<p><strong style="border-bottom:solid 2px #f26d7e;">信息通讯</strong></p><a href="#">More</a>
        </div>
        <div class="list-div">
        	<ul>
            	<li>
                    <a href="#"><img src="home/images/502.jpg" width="220" height="220" /></a>
                    <p><a href="#">趣味防尘塞 MI标</a></p>
                    <pre>适用于小米平板, 所有手机适用于小米平板, 所有手机</pre>
                </li>
                <li>
                    <a href="#"><img src="home/images/502.jpg" width="220" height="220" /></a>
                    <p><a href="#">趣味防尘塞 MI标</a></p>
                    <pre>适用于小米平板, 所有手机适用于小米平板, 所有手机</pre>
                </li>
                <li>
                    <a href="#"><img src="home/images/502.jpg" width="220" height="220" /></a>
                    <p><a href="#">趣味防尘塞 MI标</a></p>
                    <pre>适用于小米平板, 所有手机适用于小米平板, 所有手机</pre>
                </li>
                <li>
                    <a href="#"><img src="home/images/502.jpg" width="220" height="220" /></a>
                    <p><a href="#">趣味防尘塞 MI标</a></p>
                    <pre>适用于小米平板, 所有手机适用于小米平板, 所有手机</pre>
                </li>
            </ul>
        </div>
        
        <!------智能设备-------->
        <div class="list-title">
        	<p><strong style="border-bottom:solid 2px #f9ee30;">智能设备</strong></p><a href="#">More</a>
        </div>
        <div class="list-div">
        	<ul>
            	<li>
                    <a href="#"><img src="home/images/401.jpg" width="220" height="220" /></a>
                    <p><a href="#">趣味防尘塞 MI标</a></p>
                    <pre>适用于小米平板, 所有手机适用于小米平板, 所有手机</pre>
                </li>
                <li>
                    <a href="#"><img src="home/images/401.jpg" width="220" height="220" /></a>
                    <p><a href="#">趣味防尘塞 MI标</a></p>
                    <pre>适用于小米平板, 所有手机适用于小米平板, 所有手机</pre>
                </li>
                <li>
                    <a href="#"><img src="home/images/401.jpg" width="220" height="220" /></a>
                    <p><a href="#">趣味防尘塞 MI标</a></p>
                    <pre>适用于小米平板, 所有手机适用于小米平板, 所有手机</pre>
                </li>
                <li>
                    <a href="#"><img src="home/images/401.jpg" width="220" height="220" /></a>
                    <p><a href="#">趣味防尘塞 MI标</a></p>
                    <pre>适用于小米平板, 所有手机适用于小米平板, 所有手机</pre>
                </li>
            </ul>
        </div>
        
        <!------特价商品-------->
        <div class="list-title">
        	<p><strong style="border-bottom:solid 2px #dfdfdf;">特价商品</strong></p><a href="#">More</a>
        </div>
        <div class="list-div">
        	<ul>
            	<li>
                	<label><a href="#">趣味防尘塞 MI标</a></label>
                    <cite>89元<del>109元</del></cite>
                    <dfn>省20元</dfn>
                    <a href="#"><img src="home/images/401.jpg" width="220" height="220" /></a>
                </li>
                <li>
                	<label><a href="#">趣味防尘塞 MI标</a></label>
                    <cite>89元<del>109元</del></cite>
                    <dfn>省20元</dfn>
                    <a href="#"><img src="home/images/401.jpg" width="220" height="220" /></a>
                </li>
                <li>
                	<label><a href="#">趣味防尘塞 MI标</a></label>
                    <cite>89元<del>109元</del></cite>
                    <dfn>省2元</dfn>
                    <a href="#"><img src="home/images/401.jpg" width="220" height="220" /></a>
                </li>
                <li>
                	<label><a href="#">趣味防尘塞 MI标</a></label>
                    <cite>89元<del>109元</del></cite>
                    <dfn>省20元</dfn>
                    <a href="#"><img src="home/images/401.jpg" width="220" height="220" /></a>
                </li>
            </ul>
        </div>
        
    </div>
@endsection

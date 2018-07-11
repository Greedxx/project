@extends('layout.main')
@section('title', 'new Title')
@section('content')
    <!------------main---------------->
	<div class="main">
    	<div class="current-position"><h2><a href="#">首页</a> > <a href="#">环境控制</a></h2></div>
      <div class="pro-detailed" style="padding-top:0px;">
      
          <div class="pro-detailed-left">
			
            <div class="pro-detailed-left-c" style="padding-top:0px;">
                <!--------评价晒单---------->
                <div id="goodsComment">
                	<div class="title"><strong>用户评价</strong><p><a href="#" class="active">很有用</a>|<a href="#">最新</a></p></div>
                    <div class="goodsComment-zj">
                    	<div class="left"><p>96.1<span>%</span></p><pre>五星评价率</pre></div>
                        <div class="right">
                        	<ul class="star">
                            	<li><i class="star5"></i><bdo>1696人</bdo></li>
                                <li><i class="star4"></i><bdo>90人</bdo></li>
                                <li><i class="star3"></i><bdo>5人</bdo></li>
                                <li><i class="star2"></i><bdo>1人</bdo></li>
                                <li><i class="star1"></i><bdo>0人</bdo></li>
                            </ul>
                            <ul class="Impression">
                            	<li>支持国产机</li>
                                <li>性价比高</li>
                                <li>系统流畅</li>
                                <li>功能齐全</li>
                                <li>屏幕大</li>
                                <li>反应快</li>
                                <li>外观漂亮</li>
                            </ul>
                        </div>
                    </div>
                    <div class="goodsComment-c">
                    	<ul>
                        	<li>
                            	<div class="tou-x"><img src="/home/images/hy.gif" width="78" height="78" /><p>行云流水SAGA</p></div>
                                <div class="pl-c">
                                	<div class="pl-c-1"><i class="star5"></i><span>2014-12-1</span></div>
                                    <div class="pl-c-2"><p>产品质量我是说可以 但是我还是给差评 你们不知接不接纳 这个物流速度太慢了整整4天 刚刚才拿到卡 盼到我脖子长了</p></div>
                                    <div class="pl-c-3">
                                    	<p><span>此评价是否有用？</span> <a href="javascript:;">有用(169)</a> <a href="javascript:;">没用(67)</a></p>
                                        <strong>来自于小米网 | <a href="#">回复 (2)</a></strong>
                                    </div>
                                </div>
                            </li>
                            
                           <li>
                            	<div class="tou-x"><img src="/home/images/hy.gif" width="78" height="78" /><p>行云流水SAGA</p></div>
                                <div class="pl-c">
                                	<div class="pl-c-1"><i class="star5"></i><span>2014-12-1</span></div>
                                    <div class="pl-c-2"><p>产品质量我是说可以 但是我还是给差评 你们不知接不接纳 这个物流速度太慢了整整4天 刚刚才拿到卡 盼到我脖子长了</p></div>
                                    <div class="pl-c-3">
                                    	<p><span>此评价是否有用？</span> <a href="javascript:;">有用(169)</a> <a href="javascript:;">没用(67)</a></p>
                                        <strong>来自于小米网 | <a href="#">回复 (2)</a></strong>
                                    </div>
                                </div>
                            </li>
                            
                            <li>
                            	<div class="tou-x"><img src="/home/images/hy.gif" width="78" height="78" /><p>行云流水SAGA</p></div>
                                <div class="pl-c">
                                	<div class="pl-c-1"><i class="star5"></i><span>2014-12-1</span></div>
                                    <div class="pl-c-2"><p>产品质量我是说可以 但是我还是给差评 你们不知接不接纳 这个物流速度太慢了整整4天 刚刚才拿到卡 盼到我脖子长了</p></div>
                                    <div class="pl-c-3">
                                    	<p><span>此评价是否有用？</span> <a href="javascript:;">有用(169)</a> <a href="javascript:;">没用(67)</a></p>
                                        <strong>来自于小米网 | <a href="#">回复 (2)</a></strong>
                                    </div>
                                    <div class="pl-c-4">
                                    	<p><span>官方回复：</span>亲~ 内存卡的换算和计算机上的换算方式是不同的呢 计算机上是按1G=1024M进制算的 而厂家在做的时候是按1G＝1000M做的 所以此类容量的一个大约的计算公式为：标称容量×0.931(单位为G)，得出的数值为一个大约量，只要差的不多均为正常。</p>
                                    </div>
                                </div>
                            </li>
                            
                            <li>
                            	<div class="tou-x"><img src="/home/images/hy.gif" width="78" height="78" /><p>行云流水SAGA</p></div>
                                <div class="pl-c">
                                	<div class="pl-c-1"><i class="star5"></i><span>2014-12-1</span></div>
                                    <div class="pl-c-2"><p>产品质量我是说可以 但是我还是给差评 你们不知接不接纳 这个物流速度太慢了整整4天 刚刚才拿到卡 盼到我脖子长了</p></div>
                                    <div class="pl-c-3">
                                    	<p><span>此评价是否有用？</span> <a href="javascript:;">有用(169)</a> <a href="javascript:;">没用(67)</a></p>
                                        <strong>来自于小米网 | <a href="#">回复 (2)</a></strong>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        
                        <div class="clr10"></div>
                        <div class="fy" style="border:none">
                            <div class="fy-c">
                                <a href="#" class="active">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <span>...</span>
                                <a href="#">94</a>
                                <a href="#">></a>
                                <span>共94页</span>
                                <span>到第</span>
                                <input type="text" value="1" />
                                <span>页</span>
                                <a href="#">确定</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          
          
          <div class="pro-detailed-right">
          	<div class="pro-detailed-right-title"><h3>最近浏览</h3></div>
            <div class="pro-detailed-right-c">
            	<ul class="browse-list">
                	<li><a href="#"><img src="/home/images/g01.jpg" width="80" height="80" /></a></li>
                    <li><a href="#"><img src="/home/images/01.jpg" width="80" height="80" /></a></li>
                    <li><a href="#"><img src="/home/images/00.jpg" width="80" height="80" /></a></li>
                    <li><a href="#"><img src="/home/images/4li.jpg" width="80" height="80" /></a></li>
                </ul>
            	<h3>买过的人还没买了</h3>
            	<ul class="buy-list">
                	<li><a href="#"><img src="/home/images/g01.jpg" width="80" height="80" /></a><p><strong><a href="#">小米120cm USB数据线</a></strong><i>15元</i></p></li>
                    <li><a href="#"><img src="/home/images/01.jpg" width="80" height="80" /></a><p><strong><a href="#">小米120cm USB数据线</a></strong><i>15元</i></p></li>
                    <li><a href="#"><img src="/home/images/00.jpg" width="80" height="80" /></a><p><strong><a href="#">小米120cm USB数据线</a></strong><i>15元</i></p></li>
                    <li><a href="#"><img src="/home/images/big-pro2.jpg" width="80" height="80" /></a><p><strong><a href="#">小米120cm USB数据线</a></strong><i>15元</i></p></li>
                    <li><a href="#"><img src="/home/images/4li.jpg" width="80" height="80" /></a><p><strong><a href="#">小米120cm USB数据线</a></strong><i>15元</i></p></li>
                </ul>
            </div>
          </div>
      </div>
    </div>
@endsection
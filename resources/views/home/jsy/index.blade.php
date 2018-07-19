<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>结算页</title>
    
    <link href="./css/jiesuanye.css" rel="stylesheet"  type="text/css" />

</head>
<body>
	<div id='top'>
		<div id='top-m'>
			
			<span id='top-m-r'>
            
            
                @if(session('userinfo'))
                    <a href="/home/users/{{session('userinfo.id')}}/edit">
                         @if(session('userinfo.status') == 1)   
                         <img src="/images/crown.png" /> <?php echo session('userinfo.username')   ?></a> | <a href="/home/lologin">退出</a>
                         @endif 
                         @if(session('userinfo.status') == 0)
                         <?php echo session('userinfo.username')   ?></a> | <a href="/home/lologin">退出</a>
                         @endif
                @else
                    <a href="/home/login">请登录</a> | <a href="/home/zhuce">免费注册</a>
                @endif
                    <a href="/home/user">我的订单</a> | <a href="javascript:;">服务中心</a>
            
            
            </span>
		</div>
	</div>
	<img id='top-img' src="./images/top.png" alt="">
	<div id='order'>
		 <span id='o-title'>收货人信息</span>
		 <a href='' id='o-add'>新增收货地址</a>
		 <div style='clear:both;'></div>
		 <span id='o-addr'>景水北京<i></i><b>v</b></span>
		 <span id='o-name'>景水</span>
		 <span id='o-addres'>北京 昌平区 六环以内 回龙观育龙教育园区兄弟连</span>
		 <span id='o-tel'>135****2258</span>
		 <div id='o-line'></div>
		 <span id='o-shqd'>送货清单</span>
		 <span id='o-jgsm'>价格说明   <a href="/shopcart">返回修改购物车</a></span>
		 <div id='o-content'>
		    
		     	<img src="./images/pstime.png" alt="">
		
		 	
		 	   <div id='opcon'>

				 	<div class='o-con-d'>
				 		<img class='o-pic' src="./images/odlt.jpg" alt="">
				 		<div class='o-m'>
					 		<span class='o-name'>
					 		   希捷(SEAGATE)2TB 7200转64M SATA3 台式机硬盘(ST2000DM001)
					 		</span>
					 		<span class='o-tui'>7天无理由退货</span>
				 		</div>
				 		<span class='o-price'>￥479.00</span><span class='o-cnt'>x1</span><span class='o-state'>有货</span>
				 	</div>

                    <div class='o-con-d'>
				 		<img class='o-pic' src="./images/odlt.jpg" alt="">
				 		<div class='o-m'>
					 		<span class='o-name'>
					 		   希捷(SEAGATE)2TB 7200转64M SATA3 台式机硬盘(ST2000DM001)
					 		</span>
					 		<span class='o-tui'>7天无理由退货</span>
				 		</div>
				 		<span class='o-price'>￥479.00</span><span class='o-cnt'>x1</span><span class='o-state'>有货</span>
				 	</div>
                  
                    <div class='o-con-d'>
				 		<img class='o-pic' src="./images/odlt.jpg" alt="">
				 		<div class='o-m'>
					 		<span class='o-name'>
					 		   希捷(SEAGATE)2TB 7200转64M SATA3 台式机硬盘(ST2000DM001)
					 		</span>
					 		<span class='o-tui'>7天无理由退货</span>
				 		</div>
				 		<span class='o-price'>￥479.00</span><span class='o-cnt'>x1</span><span class='o-state'>有货</span>
				 	</div>



			 	</div>

		 	</div>	
		 	<div style='clear:both;'></div>	 
		 </div>
		 <div id='o-za'>
		 	 <div id='o-zafei1'>
		 	 	<div class='o-zafei'>￥2528.00</div>
		 	 	<div class='o-zafei'>-￥0.00</div>
		 	 	<div class='o-zafei'>￥0.00</div>
		 	 	<div class='o-zafei'>￥0.00</div>
		 	 </div>
		 	 <div id='o-zafei2'>
		 	 	<div class='o-zafei'>2 件商品，总商品金额：</div>
		 	 	<div class='o-zafei'>返现：</div>
		 	 	<div class='o-zafei'>运费：</div>
		 	 	<div class='o-zafei'>服务费：</div>
		 	 </div>
		 	 <div style='clear:both;'></div>
		 </div>
		 <div id='o-end'>
		 	<div id='o-end1'><span>应付总额：</span> <b>￥2528.00</b></div>
		 	<div id='o-end2'><span>寄送至： 北京 昌平区 六环以内 回龙观育龙教育园区兄弟连</span>&nbsp;&nbsp;<span>收货人：景水 135****2258</span></div>
		 </div>
		 <div id='o-final'>
		 	<a id='o-submit' href=""></a>
		 </div>
	    
</body>
</html>
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
		 <a href='/home/receive' id='o-add'>新增收货地址</a>
		 <div style='clear:both;'></div>

		
		 <span id='o-addr'>{{$data['sname']}}<i></i><b>v</b></span>
		 <span id='o-name'>{{$data['sname']}}</span>
		 <span id='o-addres'>{{$data['area']}} &nbsp; {{$data['address']}} &nbsp; </span>
		 <span id='o-tel'> {{$data['phone']}}  &nbsp; </span>&nbsp;&nbsp;&nbsp;&nbsp;
		 <span>邮编 : {{$data['code']}} </span>


		 <div id='o-line'></div>
		 <span id='o-shqd'>送货清单</span>
		 <span id='o-jgsm'>价格说明   <a href="/shopcart">返回修改购物车</a></span>
		 <div id='o-content'>
		    
		     	<img src="./images/pstime.png" alt="">
               
		 	   <div id='opcon'> 
				 @php
                    $sum = 0;
					$nums = 0;
                @endphp
				
                @foreach(session('cart') as $k =>$v)
				 	<div class='o-con-d'>
				 		<img class='o-pic' src="{{$v['thumb']}}" alt="" width="100">
				 		<div class='o-m'>
					 		<span class='o-name'>
                                {{$v['goods_name']}}
					 		</span>
					 		<span class='o-tui'>型号: {{$v['color']}} &nbsp; {{$v['size']}}</span>
				 		</div>
				 		<span class='o-price'>￥{{$v['price']}}</span><span class='o-cnt'>x{{$v['num']}}</span><span class='o-state'>有货</span>
				 	</div>
				@php
                    $sum += $v['sum'];
					$nums += $v['num'];
                @endphp
                @endforeach	 
			 	</div>
               
				

		 	</div>	 
		 	<div style='clear:both;'></div>	 
		 </div>
		 <div id='o-za'>
		 	 <div id='o-zafei1'>
		 	 	<div class='o-zafei'>￥{{$sum}}</div>
		 	 	<div class='o-zafei'>-￥0.00</div>
		 	 	<div class='o-zafei'>￥0.00</div>
		 	 	<div class='o-zafei'>￥0.00</div>
		 	 </div>
		 	 <div id='o-zafei2'>
		 	 	<div class='o-zafei'>{{$nums}} 件商品，总商品金额：</div>
		 	 	<div class='o-zafei'>返现：</div>
		 	 	<div class='o-zafei'>运费：</div>
		 	 	
		 	 </div>
		 	 <div style='clear:both;'></div>
		 </div>
		 <div id='o-end'>
		 	<div id='o-end1'><span>应付总额：</span> <b>￥{{$sum}}</b></div>
		 	
		 </div>
		 <div id='o-final'>
		 	<a id='o-submit' href="/ordsuccess"></a>
		 </div>
	    
</body>
</html>
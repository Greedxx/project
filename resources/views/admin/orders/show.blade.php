@extends('layout.admins')
@section('title','订单信息')
@section('content')
	<div class="sanshi"></div>
	<div class="container-fluid" style="background: #fff;border-radius: 5px;color: #6699CC">
		<div class="shi"></div>
		<center>
		<div class="row">
			<i class="icol32-cat"></i>&nbsp;
			<span class="g">订单编号 :</span>
			<span class="gg">{{$res[0]->orders_id}}</span>
		</div>
		<hr>


		<div class="row">
			<i class="icol32-cart"></i>&nbsp;
			<span class="g">商品名称 :</span>
			<span class="gg">{{$res[0]['good']->goods_name}}</span>
		</div>
		<hr>

		<div class="row">
			<i class="icol32-photo"></i>&nbsp;
			<span class="g">商品图片 :</span>
			<span class="gg"><img src="{{$res[0]['good']->thumb}}"></span>
		</div>
		<hr>

		<div class="row">
			<i class="icol32-money-yen"></i>&nbsp;
			<span class="g">价格 :</span>
			<span class="gg">{{$res[0]->price}}</span>
		</div>
		<hr>

		<div class="row">
			<i class="icol32-cart-put"></i>&nbsp;
			<span class="g">购买数量 :</span>
			<span class="gg">{{$res[0]->num}}</span>
		</div>
		<hr>
		
		<div class="row">
			<i class="icol32-group"></i>&nbsp;
			<span class="g">联系人 :</span>
			<span class="gg">{{$res[0]['user']->username}}</span>
		</div>
		<hr>

		<div class="row">
			<i class="icol32-house"></i>&nbsp;
			<span class="g">收货地址 :</span>
			<span class="gg">{{$res[0]->addr}}</span>

		</div>
		<hr>

		<div class="row">
			<i class="icol32-phone"></i>&nbsp;
			<span class="g">手机号码 :</span>
			<span class="gg">{{$res[0]['user']->phone}}</span>

		</div>
		<hr>

		<div class="row">
			<i class="icol32-emotion-tongue"></i>&nbsp;
			<span class="g">留言 :</span>
			<span class="gg">{{$res[0]->msg}}</span>

		</div>
		<hr>

		<div class="row">
			<i class="icol32-money-bag"></i>&nbsp;
			<span class="g">购买时间 :</span>
			<span class="gg">{{date('Y-m-d H:i:s',$res[0]->create_time)}}</span>

		</div>
		<hr>

		<div class="row">
			<i class="icol32-money-add"></i>&nbsp;
			<span class="g">支付状态 :</span>
			@if ($res[0]->status == 1)
			<span class="gg">已支付</span>
			@elseif ($res[0]->status == 0)
			<span class="gg">未支付</span>
			@else
			<span class="gg">支付出错</span>
			@endif
		</div>
		<hr>
		
		<div class="row">
			<i class="icol32-lorry"></i>&nbsp;
			<span class="g">物流状态 :</span>
			<span class="gg">
				@if ($res[0]->wuliu_status == 0)
					未发货
				@elseif ($res[0]['wuliulist']->status == 1)
					运输中
				@elseif ($res[0]['wuliulist']->status == 2)
					已签收
				@elseif ($res[0]['wuliulist']->status == 3)
					未评论
				@elseif ($res[0]['wuliulist']->status == 4)
					已评论
				@endif
			</span>
		</div>
		<hr>

		</center>
	</div>
	
@endsection
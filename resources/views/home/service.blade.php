@extends('layout.main')
@section('title', '仙女商城')
@section('content')
    <!------------main---------------->
	<div class="main">

    	 <div class="current-position " style="margin-top: 20px;font-size: 14px;" >
            <h2 style="font-size: 14px">路径  <a href="/" >首页</a>    
                |<a href="/service">"服务指南"</a>
            </h2>
        </div>
        
        <div class="service_k">
        	<div class="service_k_left_menu">
            	<h2><strong>购买指南</strong></h2>
                <ul>
                	<li class="active"><p><a href="#">第一次购买体验</a></p></li>
                    <li><p><a href="#">品质保证原则</a></p></li>
                    <li><p><a href="#">会员申请条件</a></p></li>
                </ul>
            </div>
            <div class="service_k_right">
            	<div class="service_k_right_title"><h2>第一次购买体验</h2></div>
                <div class="service_k_right_w">
                	<p>互联网电视自主研发的创新型科技企业</p>
                </div>
            </div>
        </div>
    </div>
@endsection	
   
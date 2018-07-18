@extends('layout.main')
@section('title', '仙女商城')
@section('content')
    <!------------main---------------->
	<div class="main">

    	 <div class="current-position " style="margin-top: 20px;font-size: 14px;" >
                <h2 style="font-size: 14px ">路径  <a href="/" >首页</a>    
                    |<a href="/service">"服务指南"</a>
                </h2>        
        </div>
        
        <div class="service_k">
        	<div class="service_k_left_menu">
            	<h2><strong>服务指南</strong></h2>
                <ul>
                    @foreach ($content as $k =>$v)
                        @if($k == 0)
                    	<li class="active"><p><a href="javascript:void(0);">{{$v->title}}</a></p></li>
                        @else
                        <li><p><a href="javascript:void(0);">{{$v->title}}</a></p></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div>
             @foreach ($content as $k =>$v)
             @if($k == 0)

                <div class="service_k_right">
                	<div class="service_k_right_title"><h2>{{$v->title}}</h2></div>
                    <div class="service_k_right_w">
                    	{!!$v->content!!}
                    </div>
                </div>
                @else
                <div class="service_k_right" style="display: none">
                    <div class="service_k_right_title"><h2>{{$v->title}}</h2></div>
                    <div class="service_k_right_w">
                        {!!$v->content!!}
                    </div>
                </div>
                @endif   
             @endforeach
            </div>
        </div>
    </div>
@endsection	
@section('js')
<script type="text/javascript">
    var i = 0;
    $('.service_k_left_menu').find('li').click(function(){
        $(this).attr('class','active');
        i = $(this).index();
        $(this).siblings().removeClass();
        $('.service_k').find('.service_k_right').eq(i).attr('style',"display: black");
        $('.service_k').find('.service_k_right').eq(i).siblings().attr('style',"display: none");
    })
  

    

</script>
@endsection 
   
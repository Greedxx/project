@extends('layout.main')
@section('title', '仙女商城')
@section('content')
 <style type="text/css">
     *{-webkit-box-sizing: content-box;
        box-sizing: content-box;}
    .pagination {
        height:50px;
        width:640px;
    }
    .pagination li{
        float: left
    }
</style>
	<div class="main">

        <div class="big-class" style="margin-top: 20px "><h1><a href="/list/?id={{$cateinfo['cate_id']}}&sort={{$arr['sort']}}&keyword={{$arr['keyword']}}">{{$cateinfo['cate_name']}}</a></h1></div>

        <div class="current-position" >
            <h2 style=" font-size:12px; line-height: 12px;">路径:<a href="/">首页</a>    
                {{--dd($arrpath)--}}  
                @if(!empty($arrpath))     
                    @foreach($arrpath as $k => $v)
                        |<a href="/list?id={{$v['cate_id']}}">{{$v['cate_name']}}</a>
                    @endforeach
                @endif
            </h2>
        </div>
        
        <!-- <div class="current-position" style="font-size:20px; line-height: 20px">
            <h2>路径:<a href="/">首页</a>    
                {{--dd($arrpath)--}}  
                @if(!empty($arrpath))     
                    @foreach($arrpath as $k => $v)
                        |<a href="/list?id={{$v['cate_id']}}&sort={{$arr['sort']}}">{{$v['cate_name']}}</a>
                    @endforeach
                @endif
            </h2>
        </div> -->
        <div class="small-class" style="margin-top: -25px ">
        	<p>分类：  <a href="/list" class="active">全部</a>
                    @foreach ($cate as $k => $v)
                        |<a href="/list?id={{$v['cate_id']}}&sort={{$arr['sort']}}">{{$v['cate_name']}}</a>
                    @endforeach
            </p>
        </div>
        <div class="box-hd">
            <div class="filter-lists">
                <ul>
                    <li class="current"><a href="/list/?id={{$cateinfo['cate_id']}}&sort=1&keyword={{$arr['keyword']}}" rel="nofollow">推荐</a>|</li>
                    <li ><a href="/list?id={{$cateinfo['cate_id']}}&sort=2&keyword={{$arr['keyword']}}" rel="nofollow">最新</a>|</li>
                    <li ><a href="/list?id={{$cateinfo['cate_id']}}&sort=3&keyword={{$arr['keyword']}}"nofollow">价格从低到高</a>|</li>
                    <li ><a href="/list?id={{$cateinfo['cate_id']}}&sort=4&keyword={{$arr['keyword']}}"nofollow">价格从高到低</a></li>
                </ul>
            </div>
            
            <div class="more">
                <!-- <a href="javascript:;"><i class="icon-check"></i><p>仅显示有货商品</p></a> -->
            </div>
        </div>
        
        <div class="products-list" id="products-list">
        	<ul>
                @foreach($good as $k =>$v)
                <li >
                    <div class="img" style="background:url({{$v->thumb}}) no-repeat center center ; background-size:100% 100%;"><a href="/good/{{$v->id}}"></a></div>
                    <div class="w">
                    	<div class="left"><p><a href="/good/{{$v->id}}">{{$v->goods_name}}</a></p><span>{{$v->price}}元</span></div>
                        <div class="right"><i class="star5"></i><p>18评价</p></div>
                    </div>
                    <div class="mybtn">
                        <a href="/good/{{$v->id}}" class="mybtn1">立即购买</a>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="clr10"></div>
        </div>
        <div class="fy">
            <div class="fy-c">
                {{$good->appends($arr)->links()}}
            </div>
        </div>
        
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        // alert($);
    $(function(){
        /*------------------------------biankuang-----------------------------------*/  
        $(".box-hd .more a").click(function(){
            if($(this).find("i").attr("class")=="icon-check"){
                $(this).find("i").attr("class","icon-check-active");
            }
            else{
                $(this).find("i").attr("class","icon-check");
            }
        })

        $("#products-list").find("li").hover(function(){
            $(this).addClass("active");
        },function(){
            $(this).removeClass("active");
        })
        
    })

</script>
@endsection
 
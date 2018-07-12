@extends('layout.main')
@section('title', 'new Title')
@section('content')
	<div class="main">
    	
        <div class="big-class" style="margin-top: 20px "><h1>{{$cateinfo['cate_name']}}</h1></div>
        
        <div class="current-position" style="font-size:20px; line-height: 20px">
            <h2><a href="/">当前路径: 首页</a>            
                @foreach($arrpath as $k => $v)
                    |<a href="/list/{{$v['cate_id']}}">{{$v['cate_name']}}</a>
                @endforeach
            </h2>
        </div>
        <div class="small-class">
        	<p>分类：  <a href="#" class="active">全部</a>
                    @foreach ($cate as $k => $v)
                        |<a href="/list/{{$v['cate_id']}}">{{$v['cate_name']}}</a>
                    @endforeach
            </p>
        </div>
        <div class="box-hd">
            <div class="filter-lists">
                <ul>
                    <li class="current"><a href="/list" rel="nofollow">推荐</a>|</li>
                    <li ><a href="/list?sort='new'" rel="nofollow">最新</a>|</li>
                    <li ><a href="/list?sort='price desc' rel="nofollow">价格从高到低</a>|</li>
                    <li ><a href="/list?sort='price asc" rel="nofollow">价格从低到高</a>|</li>
                </ul>
            </div>
            
            <div class="more">
                <!-- <a href="javascript:;"><i class="icon-check"></i><p>仅显示有货商品</p></a> -->
            </div>
        </div>
        
        <div class="products-list" id="products-list">
        	<ul>
                @foreach($good as $k =>$v)
                <li>
                    <div class="img" style="background:url({{$v->thumb}}) no-repeat center center ; background-size:100% 100%;"><a href="/good/{{$v->id}}"></a></div>
                    <div class="w">
                    	<div class="left"><p><a href="/good/{{$v->id}}">{{$v->goods_name}}</a></p><span>{{$v->price}}元</span></div>
                        <div class="right"><i class="star5"></i><p>22264人评价</p></div>
                    </div>
                    <div class="btn">
                    	<a href="products-detailed.html" class="btn1">立即购买</a>
                        <a href="products-detailed.html" class="btn2">加入购物车</a>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="clr10"></div>

             
            <style type="text/css">
                .pagination {
                    height:50px;
                    width:640px;
                }
                .pagination li {
                    width:20px;
                    height:20px;
                }
                
            </style>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                            
   
                    </div>
                </div>
            </div>
            
        </div>
        <div class="fy">
            <div class="fy-c">
               
                {{$good->links()}}
            </div>
        </div>
        
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        // alert($);
    $(function(){
        /*------------------------------排列互选框-----------------------------------*/  
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
 
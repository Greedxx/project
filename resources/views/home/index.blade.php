@extends('layout.main')
@section('title', '仙女商城')
@section('content')
    <style type="text/css">
        *{-webkit-box-sizing: content-box;
        box-sizing: content-box;}
    </style>
    <?php $data = App\Models\admin\Lunbo::where('status',1)->limit(10)->get() ?>
     
   <!------------banner---------------->
    <div id="banner">
        <div class="fullSlide">
            <div class="bd">
                <ul>
                    @foreach ($data as $k =>$v)
                    <li _src="url({{$v->url}})" style="background:#000 center 0 no-repeat width:1240px height:200px;"><a href="#"></a></li>
                     @endforeach

                     <!-- <li _src="url(/home/images/banner.jpg)" style="background:#000 center 0 no-repeat;"><a href="https://shop116998991.taobao.com/"> -->

                </ul>
            </div>
            <div class="hd"><ul></ul></div>
            <span class="prev"></span>
            <span class="next"></span>
        </div>
    </div>   


</html>


    <!------------main---------------->
    <div class="main">
        <!------热门推荐-------->
        <div class="recommend">
            <div class="title"><img src="/home/images/rt.png" /><p>热门商品</p></div>
            <div class="clr20"></div>
            <div class="left">
                <!-- 广告位置1 start-->
            	<div class="img"><a href="#"><img src="/home/images/501.gif" width="619" height="309" /></a></div>
                <!-- 广告位置1 end -->
                <!-- 商品填充处 -->
                @foreach($sale as $k =>$v)
                <div class="img img_309"><p><strong><a href="/good/{{$v->id}}">{{$v->goods_name}}</a></strong><span>{{$v->price}}元</span></p><a href="#"><img src="{{$v->thumb}}" width="220" height="220"/></a></div>
                @endforeach
                <!-- 商品填充处 -->
            </div>
            <div class="right"> 
                <h2><span>TOP 5</span>热销商品</h2>
                <ul class="board-list">
                    @foreach($top as $k =>$v)
                    <li>
                        <span class="item-num top3">{{ $a=$k+1}}</span>
                        <span class="item-info">
                            <span class="item-title"><a href="#">{{$v->goods_name}}</a></span>
                            <span class="item-price">{{$v->price}}元 </span>
                        </span>
                        <span class="item-thumb"><a href="/good/{{$v->id}}"><img src="{{$v->thumb}}" width="70" height="70" /></a></span>
                    </li>
                     @endforeach
                </ul>
            </div>
        </div>
        <!-- 第一个广告 -->
        <?php $data = App\Models\admin\Ad::limit(5)->get()->toArray() ?>
        @foreach($data as $k=>$v)
             @if($k==0)
            <div class="list-ad1">
               
                <a href=""><img src="{{$v['url']}}"></a>
               
            </div>
            @endif
        @endforeach
       
        <!------遍历各分类中商品------->
        @foreach($goods as $k=>$v)
            @if(!empty($v['goods'])&&$v['goods']!="[]")
                <div class="list-title">
                    <p><strong style="border-bottom:solid 2px #54cb00; width: 160px">{{$v['cate_name']}}</strong></p><a href="/list?id={{$v->cate_id}}">More</a>
                </div>
                <div class="list-div">
                    <ul>
                        @foreach($v['goods'] as $kk =>$vv)
                        <li>
                            <a href="/good/{{$vv->id}}"><img src="{{$vv->thumb}}" width="220" height="220" /></a>
                            <p><a href="/good/{{$vv->id}}"></a>{{$vv->goods_name}}</p>
                            <pre>{{$vv->desc}}</pre>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- 隔行放置广告 -->
                <!-- 从第三张广告开始 每间隔一个分类放上一张广告 -->
                <?php $i=$k+2;?>
                @if(!empty($data[$i]))
                    <div class="list-ad1" >
                        <a href=""><img src="{{--$data[$i]['url']--}}"></a>
                    </div>
                @endif
            @endif  
        @endforeach
      

@endsection

@section('js')

<script type="text/javascript" src="/home/js/index.js"></script>
<script type="text/javascript">
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

@endsection
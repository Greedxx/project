@extends('layout.main')
@section('title', '仙女商城')
@section('content')
<style type="text/css">

    *{-webkit-box-sizing: content-box;
    box-sizing: content-box;}

    .img_a{
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }
    .aa{
        position: absolute;
    }

    #ids{
        background-color: rgba(128, 128, 128, 0.3);
        border-radius: 10px;
        bottom: 15px;
        font-size: 0;
        height: 13px;
        left: 50%;
        margin-left: -39px;
        position: absolute;
        text-align: center;
        padding:0px;
    }

    #ids li{

        background: #aaa none repeat scroll 0 0;
        border-radius: 50%;
        height: 0;
        padding-top: 8px;
        width: 8px;
        cursor: pointer;
        display: inline-block;
        margin: 3px;
    }

    #ids .cur{

        background: #ff5000 none repeat scroll 0 0;
    }

</style>



    <div class="main">
       
        <div class="current-position" style="margin-top:35px; ">
            <h2 style=" font-size:16px;font-weight: bold; line-height: 16px;">路径:<a href="/">首页</a>    
                {{--dd($arrpath)--}}  
                @if(!empty($arrpath))     
                    @foreach($arrpath as $k => $v)
                        |<a href="/list?id={{$v['cate_id']}}">{{$v['cate_name']}}</a>
                    @endforeach
                @endif
            </h2>
        </div>

        <div class="goods-detail-info">
            <div class="left">
                <div id="play">
                    <ul  class="img_ul aa">
                        @foreach($goodsimg as $k =>$v)
                            @if($k<=3)
                             <li ><a class="img_a"><img src="{{$v->src}}" width="430px" height="430px"></a></li>
                            @endif
                        @endforeach
                        <ul id="ids">
                            @foreach($goodsimg as $k =>$v)
                                @if($k<=3)
                                <li></li>
                                @endif
                            @endforeach
                        </ul>
                    </ul>
                    
                   
                    <!-- <a href="javascript:void(0)" class="prev_a change_a" title="上一张"><span></span></a>
                    <a href="javascript:void(0)" class="next_a change_a" title="下一张"><span style="display:block;"></span></a> -->
                </div>

                
                <div class="img_hd" style="width: 328px; overflow:hidden;">
                    <ul class="clearfix" style="width: 328px; overflow:hidden;">
           
                        @foreach($goodsimg as $k =>$v)
                            @if($k<=3)
                            <li class="on" ><a class="img_a"><div class="pro-small-pic" style="background:url({{$v->src}});background-size:100% 100%;"></div></a></li>
                            @endif
                        @endforeach
                  </ul>
              </div>
            </div>

            <div class="right">
                <!-- 商品名 -->
                <h1 gid="{{$data->id}}" gsrc="{{$data->thumb}}" >{{$data->goods_name}}</h1>
                <p class="money">¥<span>{{$data->price}}</span></p>
                <p class="comment"><img src="/home/images/x5.gif" /><span>{{count($message)}}人评价<ins>|</ins></span></p>
                <p class="fit"><strong>描述</strong><span>{{$data->desc}}</span></p>
                <div class="styles">
                    <h2>颜色：</h2>
                    
                    
                    
                    <ul class="style-simg" id="gcolor">
                        <!-- <li class="active"><a href="javascript:void(0);"><div class="style-img" style="background:url(/home/images/pro-minsmall-pic.jpg)"></div><i></i></a></li>
                        <li ><a href="#"><div class="style-img" style="background:url(/home/images/pro-minsmall-pic.jpg)"></div><i></i></a></li> -->
                        @foreach($color as $k=>$v)
                        <li ><a href="javascript:void(0);"><div class="style-title">{{$v}}</div></a><i></i></li>
                        @endforeach
                    </ul>
                    <h2>尺寸：</h2>
                    <ul class="style-simg " id="gsize">
                        <!-- <li class="active"><a href="javascript:void(0);"><div class="style-title">165/M</div></a><i></i></li>
                        <li><a href="javascript:void(0);"><div class="style-title">170/L</div></a><i></i></li> -->
                        @foreach($size as $kk=>$vv)
                        <li ><a href="javascript:void(0);"><div class="style-title">{{$vv}}</div></a><i></i></li>
                        @endforeach
                    </ul>
                    
                    
                    <h2>数量：</h2>
                    <div class="tb-amount-widget" >
                        <input type="text"  id="gnum" value="1" readonly  class="input-count"/>
                        <div class="tb-amount-btn">
                            <a href="javascript:void(0)" class="add_btn"></a>
                            <a href="javascript:void(0)" class="min_btn"></a>
                        </div>
                        <span id="kucun">件 库存<b>{{$data->count}}</b>件</span>
                    </div>
                </div>
                <div class="pro-detai-cart">
                    <a href="javascript:void(0);" class="cart"><p>加入购物车</p></a>
                    <!-- 1 是原来是灰色添加变红 2 是原来是红色删除变灰  0 是未登录颜色为灰色先去登陆 -->
                    @if($data['status']==1)
                    <a href="/shoucang/add?uid={{$data['uid']}}&gid={{$data['id']}}" class="collection" style="background-image: url(/home/images/a1.png)"></a>

                    @elseif($data['status']==2)
                    <a href="/shoucang/del?uid={{$data['uid']}}&gid={{$data['id']}}" class="collection" style="background-image: url(/home/images/a.png) "></a>
                    @elseif($data['status']==0)
                    <a href="/home/login" class="collection" style="background-image: url(/home/images/a1.png)"></a>
                    @endif
                </div>
                <div class="service">
                    <dl>
                        <dt>享受服务</dt>
                        <dd class="fqfk"><a href="javascript:void(0);">分期付款</a></dd>
                    </dl>
                    <dl style="margin-left:50px">
                        <dt>享受保障</dt>
                        <dd class="th"><a href="javascript:void(0);">15天退货</a></dd>
                        <dd class="bx"><a href="javascript:void(0);">一年保修</a></dd>
                    </dl>
                </div>
            </div>
      </div>
      <div class="pro-detailed">      
          <div class="pro-detailed-left">
            <ul class="pro-detailed-left-title">
                <li class="active"><a href="javascript:void(0);">详细信息</a></li>
                <li><a href="javascript:void(0);">规格参数</a></li>
                <li><a href="javascript:void(0);">商品评价</a></li>
                <!-- <li><a href="#goodsFaq">商品提问</a></li> -->
                <li><a href="javascript:void(0);">售后服务</a></li>
            </ul>
            <div class="pro-detailed-left-c">
                <!--------详细信息---------->
                <div id="goodsDesc" class="show" >
                    {!!$data->content!!}
                </div>
                <!--------规格参数---------->
                <div id="goodsParam" class="hidden">
                    <div class="title">规格参数</div>
                    <ul>
                        <li><p><span>型号 ： </span>{{$data->type}}</p></li>
                        <li><p><span>内存 ： </span>@foreach($memory as $k=>$v) {{ $v }} @endforeach</p></li>
                        <li><p><span>尺寸 ： </span>@foreach($size as $k=>$v) {{ $v }} @endforeach</p></li>
                        <li><p><span>编号 ： </span>{{$data->goods_no}}</p></li>
                        <li><p><span>颜色分类 ： </span>@foreach($color as $k=>$v) {{ $v }} @endforeach</p></li>
                        <li><p style="white-space:normal;"><span>适用对象 ： </span>通用</p></li>
                    </ul>
                </div>
                <!--------评价晒单---------->

                <div id="goodsComment" class = "hidden">
                    <div class="title"><strong>用户评价</strong><p></p></div>
                    <div class="goodsComment-c" >
                        <ul>
                            @foreach($message as $k =>$v)
                            <li>
                                <div class="tou-x"><img src="{{$v['user']['profile']}}" width="78" height="78" /><p>{{$v['user']['username']}}</p></div>
                                <div class="pl-c">
                                    <div class="pl-c-1"><i class="star5"></i><span>{{ date('Y-m-d H:i:s',$v['created_at'])}}</span></div>
                                    <div class="pl-c-2"><p>用户点评 : {{$v['msg']}}</p></div>
                                    @if(!empty($v['tomsg']))
                                    <div class="pl-c-4">
                                        <p><span>官方回复：</span>{{$v['tomsg']}}</p>
                                    </div>
                                    @endif
                                </div>
                            </li>
                            @endforeach      
                        </ul>
                    </div>
                    <!-- <div class="goodsComment-more"><a href="goodsComment-more.html">查看全部评价 ></a></div> -->
                </div>
                <!--     ------商品提问--------
                <div id="goodsFaq" class = "hidden">
                    <div class="title"><strong>产品提问</strong><p><a href="javascript:void(0);">查看全部 ></a></p></div>
                    <div class="goodsFaq-c">
                        <ul>
                            <li>
                                <div class="question"><i>Q</i><h3>包邮吗</h3></div>
                                <div class="answer"><i>A</i><p>您好，现在是满150元包邮哦~不满150元需要10元邮费哦~</p></div>
                                <div class="use-time"><p>134494448</p><span>2014年09月16日</span></div>
                            </li>
                            <li>
                                <div class="question"><i>Q</i><h3>有客服在吗 现在是8.29了，现在买还包邮吗？我现在买了其他的东西有200多了，我想再买个抱枕但邮寄的地址不是一个？</h3></div>
                                <div class="answer"><i>A</i><p>您好，暂时没有活动了哦，需要订单满150元才包邮的哦，感谢您对小米的支持。</p></div>
                                <div class="use-time"><p>134494448</p><span>2014年09月16日</span></div>
                            </li>
                            <li>
                                <div class="question"><i>Q</i><h3>包邮吗</h3></div>
                                <div class="answer"><i>A</i><p>您好，现在是满150元包邮哦~不满150元需要10元邮费哦~</p></div>
                                <div class="use-time"><p>134494448</p><span>2014年09月16日</span></div>
                            </li>
                            <li>
                                <div class="question"><i>Q</i><h3>有客服在吗 现在是8.29了，现在买还包邮吗？我现在买了其他的东西有200多了，我想再买个抱枕但邮寄的地址不是一个？</h3></div>
                                <div class="answer"><i>A</i><p>您好，暂时没有活动了哦，需要订单满150元才包邮的哦，感谢您对小米的支持。</p></div>
                                <div class="use-time"><p>134494448</p><span>2014年09月16日</span></div>
                            </li>
                        </ul>
                    </div>
                    <div class="faq-input">
                        <span>我要提问</span>
                        <input type="text" value="输入你的提问" onFocus="this.value=''" onBlur="if(!value){value=defaultValue;}">
                        <button type="button">提交</button>
                    </div>
                </div>
                ------商品提问-------- -->
                <!--------售后服务---------->
                <div id="serQue" class = "hidden">
                    <div class="nTab3">
                        <!-- 标题开始 -->
                        <div class="TabTitle">
                          <ul id="myTab0">                     
                            <li class="active" onclick="nTabs(this,0);">常见问题</li>
                            <li class="normal" onclick="nTabs(this,1);">售后服务</li>
                          </ul>
                        </div>
                        <!-- 内容开始 -->
                        <div class="TabContent">
                                <!--常见问题-->
                              <div id="myTab0_Content0" class="intro"  >
                                    <h2>如何挑选商品？</h2>
                                    <p>点击页面上方“加入购物车”按钮或页面下拉时顶部导航上的“加入购物车”按钮将商品加入购物车，再点击页面右上角的“购物车”前往购物车页面进行结算。</p>
                                    
                                    <h2>收藏商品功能</h2>
                                    <p>点击“收藏按钮”后，按钮中的白心亮起,背景由黑色变为黄色代表收藏成功，再次点击取消收藏。您可在“个人中心”中的我的收藏查看所有收藏商品。</p>
                                    
                                    <h2>维修网点销售配件吗？</h2>
                                    <p>所有授权维修网点具备维修手机标配里配件的功能，部分指定授权维修网点可销售标配及部分官网配件，具体销售的产品及价格请以修网点信息为准。</p>
                                    
                                    <h2>退换货办理流程</h2>
                                    <p>您可拨打小米客服中心400-100-5678与客服人员沟通，或登录小米网“我的订单” ->“订单详情”下方点击“申请售后服务”并填写相应信息，小米看到您的申请，会安排工作人员与您进行退换货质量确认并办理相关事宜.</p>
                              </div>
                              <!--售后服务-->
                              <div id="myTab0_Content1" class="intro" >
                                    <p>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货。</p>
                                    <p> 2.退换凭证：用户提供相关订单号。</p>
                                    <p>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</p>
                                    <p>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</p>
                                    <p>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货。</p>
                                    <p> 2.退换凭证：用户提供相关订单号。</p>
                                    <p>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</p>
                                    <p>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</p>
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
                    @foreach($goodsimg as $k =>$v)
                    <li><a href="javascript:void(0);"><img src="{{$v->src}}" width="60" height="60" /></a></li>
                    @endforeach
                </ul>
                <h3>产品推荐</h3>
                <?php $data = \DB::table('goods')->orderBy('count','id')->limit(5)->get();   ?>
                <style type="text/css">
                    .buy-list a{
                        text-align: center;
                    }

                    .buy-list i{
                        position: relative;
                        overflow: hidden;
                        padding: 0 30px;
                        margin: 0 0 8px;
                        text-align: center;
                        color: #E02B41;
                    }
                </style>
                <ul class="buy-list">
                    @foreach($data as $k =>$v)
                    <li><a href="/good/{{$v->id}}"><img src="{{$v->thumb}}" width="80" height="80" /></a><p><strong><a href="/good/{{$v->id}}" class="gname">{{$v->goods_name}}</a></strong><i>{{$v->price}}元</i></p></li>
                    @endforeach
                   
                </ul>
            </div>
          </div>
      </div>
    </div>

@endsection

@section('js')

    <script type="text/javascript">
        
    var i = 1;

    var into = null;

    function moves(){
        into = setInterval(function(){

            shows(i++);
            if(i > 4){
                i=0;
            }

        },2000)
    }

        
    moves();


    //函数的作用是 让第一张图片显示出来 其他的进行隐藏
    function shows(m){
        $('.img_ul li').eq(m).find('img').fadeIn(600);
        $('.img_ul li').eq(m).siblings().find('img').fadeOut(800);
        $('#ids li').eq(m).addClass('cur');
        $('#ids li').eq(m).siblings().removeClass('cur');
    }
    
    shows(0);

        //点击小圆点换图片
    $('#ids li').hover(function(){

        //移动到小圆点上

        //1.让定时器停止
        clearInterval(into);

        //2.让图片显示出来
        i = $(this).index();

        shows(i++);


    },function(){

        //再让图片接着走
        moves();
        if(i > 4){
            i=0;
        }
    });

    $('.on').click(function(){

        //2.让图片显示出来
        i = $(this).index();
        shows(i);
    })


    </script>
    <!-- 点击换图片 -->
    <script type="text/javascript">
        $(".pro-detailed-left-title").find('li').click(function(){
            $(this).attr('class',"active");
            $(this).siblings().removeAttr('class');
            var d = $(this).index();

            $(".pro-detailed-left-c").find('>div').eq(d).attr('class',"show");
            $(".pro-detailed-left-c").find('>div').eq(d).siblings().attr('class',"hidden");
        })
    </script>

    <!-- 购物车css -->
    <script type="text/javascript">
        // alert($.fn.jquery);
        /*.add_btn+
        .min_btn -*/

        //页面数据获取
        color =  $('#gcolor');
        size = $('#gsize');
        statu1 = 0;
        statu2 = 0;
        gscolor = '';
        gssize = '';

        num = parseInt($('#gnum').val());

        $('#gcolor').find('li').click(function(){
            $(this).attr('class','active');
            $(this).siblings().attr('class','');
            gscolor = $(this).find('div').text();
            statu1 = 1;
        });

        $('#gsize').find('li').click(function(){
            $(this).attr('class','active');
            $(this).siblings().attr('class','');
            gssize = $(this).find('div').text();
            statu2 = 1;
        });

        /*添加 减少数子 add_btn min_btn input-count #kucun*/

        $('.add_btn').click(function(){
            num = parseInt($('#gnum').val());
            // 通过库存约束最大数量 
            kucun = parseInt($('#kucun').find('b').text());
            // console.log(kucun);
            if(num<kucun){  
                num ++;
            }
            $('#gnum').val(num);
            console.log(num);
        });

        $('.min_btn').click(function(){
            num = parseInt($('#gnum').val());
            console.log(num);
            console.log(typeof(num));
            if(num > 1){
                num --;
            } else {
                num = 1;
            }
            $('#gnum').val(num);
            // console.log(num);
        });


        //购物车商品的添加
        $('.cart').click(function(){
                     
            if(statu1 && statu2){

                goodsid = $('.right').find('h1').attr('gid');

                console.log(goodsid);
                console.log(gssize);
                console.log(num);
                console.log(gscolor);
                
                // $.ajaxSetup({
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     }
                // });

                //将数据发送给php处理
                $.get('/cartadd',{gid:goodsid,num:num,color:gscolor,size:gssize},function(data){
                   
                    console.log(data);
                    if(data == 1){
                        swal("好的!", "已加入购物车", "success");
                        //需要等待两秒
                        setTimeout(function(){window.location.reload();});
                        
                    }else{
                        alert('加入失败');
                        setTimeout(function(){window.location.reload();});
                    }
                });


            }
        })


  </script>
  <script type="text/javascript">
    $('.collection').click(function(){
        // $(this).attr('href','shoucang/del'); 
        // $(this).attr('background-image','url(/home/images/05.jpg)'); 

        window.location.reload(true); 
    })
    
  </script>
@endsection
    
    
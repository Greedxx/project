@extends('layout.main')

@section('title',$title)

@section('content')
<div class="user_style clearfix">
    <div class="user_center clearfix">
        <div class="left_style">
            <div class="menu_style">
                <div class="user_title">
                    <a href="/home/user">用户中心</a>
                </div>
                <div class="user_Head">
                    <div class="user_portrait">
                        <a href="#" title="修改头像" class="btn_link"></a>
                        <img src="{{session('userinfo.profile')}}">
                        <div class="background_img"></div>
                    </div>
                    <div class="user_name">
                        <p>
                            <span class="name">{{session('userinfo.username')}}</span>
                            <a href="/home/xiu">[修改密码]</a>
                        </p>
                    </div>
                </div>
                <div class="sideMen">
                    <!--菜单列表图层-->
                    <dl class="accountSideOption1">
                        <dt class="transaction_manage">
                            <em class="icon_1"></em>订单管理</dt>
                        <dd>
                            <ul>
                                <li>
                                    <a href="/home/user">我的订单</a>
                                </li>
                                <li>
                                    <a href="/home/receive">收货地址</a>
                                </li>

                            </ul>
                        </dd>
                    </dl>
                    <dl class="accountSideOption1">
                        <dt class="transaction_manage">
                            <em class="icon_2"></em>会员管理</dt>
                        <dd>
                            <ul>
                                <li>
                                    <a href="/home/users/{{session('userinfo.id')}}/edit">用户信息</a>
                                </li>
                                <li>
                                    <a href="/home/keep">我的收藏</a>
                                </li>
                                <li>
                                    <a href="/home/pinglun">我的评论</a>
                                </li>
                            </ul>
                        </dd>
                    </dl>
                </div>
                <script>jQuery(".sideMen").slide({ titCell: "dt", targetCell: "dd", trigger: "click", defaultIndex: 0, effect: "slideDown", delayTime: 300, returnDefault: true });</script>
            </div>
            <!--浏览记录样式-->


        </div>

        <div class="right_style">


            <!--样式-->
            <div class="user_info_p_s  clearfix">
                <!--订单记录-->
                <div class="left_user_cont">
                    <div class="us_Orders left clearfix">
                        <div class="Orders_name">
                            <div class="title_name">
                                <div class="Records">购买记录</div>
                                <div class="right select">
                                    只记录你最近30天的购买记录 </div>
                            </div>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>订单编号</th>
                                    <th>产品名称</th>
                                    <th>数量</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                    <th>收发货</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count = 0;
                                @endphp

                                @foreach($res as $k => $v)

                                @php $count = $k+1;
                                @endphp

                                <tr>
                                    <td>{{$v['orders_id']}}</td>
                                    <td class="img_link">
                                    <center>
                                        <a href="#" class="img">
                                            <img src="{{$v['good']->thumb}}" width="80" height="80">
                                        </a>
                                        <a href="#" class="title">{{$v['good']->goods_name}}</a>
                                    </center>
                                    </td>
                                    <td>{{$v['num']}}</td>
                                    
                                    @if($v['status'] == 0)
                                    <td>未支付</td>
                                    @else
                                    <td>已支付</td>
                                    @endif

                                    <td>
                                        <a href="/home/order/{{$v->id}}" class="View">查看</a>
                                    </td>

                                    <td>
                                    @if ($v->wuliu_status == 0)
                                        未发货
                                    @elseif ($v['wuliulist']->status == 1)
                                        运输中
                                         <a href="/home/queren/{{$v->id}}" class="View">确认收货</a>
                                    @elseif ($v['wuliulist']->status == 2)
                                        已签收
                                        <a href="/home/pinglun" class="View">评论</a>
                                    @endif
                                       
                                    </td>
                                </tr>
                                @endforeach
                              
                            </tbody>
                        </table>
                        <div class="us_jls">共{{$count}}条记录</div>
                    </div>
                </div>

                <!--右侧记录样式-->
                <!-- <div class="right_user_recording">
                    <div class="us_Record">

                        <div id="Record_p" class="Record_p">



                            <div class="title_name">
                                <span class="name left">浏览历史</span>
                                <span class="pageState right">
                                    <span>1</span>/7</span>
                            </div>
                            <div class="hd">
                                <a class="next">&lt;</a>
                                <a class="prev">&gt;</a>
                            </div>
                            <div class="bd">
                                <ul>
                                    <li class="clone">
                                        <div class="p_width">
                                            <div class="pic">
                                                <a href="">
                                                    <img src="/products/P_1.jpg">
                                                </a>
                                            </div>
                                            <div class="title">
                                                <a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a>
                                            </div>
                                            <div class="Purchase_info">
                                                <span class="p_Price">￥32.50</span>
                                                <a href="#" class="Purchase">立即购买</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="p_width">
                                            <div class="pic">
                                                <a href="">
                                                    <img src="/products/P_12.jpg">
                                                </a>
                                            </div>
                                            <div class="title">
                                                <a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a>
                                            </div>
                                            <div class="Purchase_info">
                                                <span class="p_Price">￥32.50</span>
                                                <a href="#" class="Purchase">立即购买</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="p_width">
                                            <div class="pic">
                                                <a href="">
                                                    <img src="/products/P_23.jpg">
                                                </a>
                                            </div>
                                            <div class="title">
                                                <a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a>
                                            </div>
                                            <div class="Purchase_info">
                                                <span class="p_Price">￥32.50</span>
                                                <a href="#" class="Purchase">立即购买</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="p_width">
                                            <div class="pic">
                                                <a href="">
                                                    <img src="/products/P_4.jpg">
                                                </a>
                                            </div>
                                            <div class="title">
                                                <a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a>
                                            </div>
                                            <div class="Purchase_info">
                                                <span class="p_Price">￥32.50</span>
                                                <a href="#" class="Purchase">立即购买</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="p_width">
                                            <div class="pic">
                                                <a href="">
                                                    <img src="/products/P_5.jpg">
                                                </a>
                                            </div>
                                            <div class="title">
                                                <a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a>
                                            </div>
                                            <div class="Purchase_info">
                                                <span class="p_Price">￥32.50</span>
                                                <a href="#" class="Purchase">立即购买</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="p_width">
                                            <div class="pic">
                                                <a href="">
                                                    <img src="/products/P_8.jpg">
                                                </a>
                                            </div>
                                            <div class="title">
                                                <a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a>
                                            </div>
                                            <div class="Purchase_info">
                                                <span class="p_Price">￥32.50</span>
                                                <a href="#" class="Purchase">立即购买</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="p_width">
                                            <div class="pic">
                                                <a href="">
                                                    <img src="/products/P_1.jpg">
                                                </a>
                                            </div>
                                            <div class="title">
                                                <a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a>
                                            </div>
                                            <div class="Purchase_info">
                                                <span class="p_Price">￥32.50</span>
                                                <a href="#" class="Purchase">立即购买</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="p_width">
                                            <div class="pic">
                                                <a href="">
                                                    <img src="/products/P_6.jpg">
                                                </a>
                                            </div>
                                            <div class="title">
                                                <a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a>
                                            </div>
                                            <div class="Purchase_info">
                                                <span class="p_Price">￥32.50</span>
                                                <a href="#" class="Purchase">立即购买</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="clone">
                                        <div class="p_width">
                                            <div class="pic">
                                                <a href="">
                                                    <img src="/products/P_11.jpg">
                                                </a>
                                            </div>
                                            <div class="title">
                                                <a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a>
                                            </div>
                                            <div class="Purchase_info">
                                                <span class="p_Price">￥32.50</span>
                                                <a href="#" class="Purchase">立即购买</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <script type="text/javascript">jQuery("#Record_p").slide({ mainCell: ".bd ul", effect: "leftLoop", vis: 1, autoPlay: false });</script>
                    </div>
                </div> -->

            </div>
        </div>
    </div>
</div>
@endsection
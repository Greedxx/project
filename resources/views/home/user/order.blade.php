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
                                            <a href="#">我的留言</a>
                                        </li>
                                        <li>
                                            <a href="#">我的标签</a>
                                        </li>
                                        <li>
                                            <a href="#">我的推荐</a>
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
        </div>
                  <table class="td-void order-tb">
                                    <colgroup>
                                        <col class="number-col">
                                            <col class="consignee-col">
                                                <col class="amount-col">
                                                    <col class="status-col">
                                                        <col class="operate-col">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="ordertime-cont">
                                                    <div class="time-txt">
                                                        
                                                        <b>
                                                        </b>
                                                        <span class="blank">
                                                        </span>
                                                    </div>
                                                    
                                                </div>
                                                <div class="order-detail-txt ac">
                                                    订单信息
                                                </div>
                                            </th>
                                            <th>
                                                收货人
                                            </th>
                                            <th>
                                                金额
                                            </th>
                                            <th>
                                                <div class="deal-state-cont" id="orderState">
                                                    <div class="state-txt">
                                                        全部状态
                                                        <b>
                                                        </b>
                                                        <span class="blank">
                                                        </span>
                                                    </div>
                                                   
                                                </div>
                                            </th>
                                            <th>
                                                操作
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="tb-43244043248">
                                        <tr class="tr-th">
                                            <td colspan="5">
                                                <span class="gap">
                                                </span>
                                                <span class="dealtime" title="2016-11-01 23:43:57">
                                                    2016-11-01 23:43:57
                                                </span>
                                                <input type="hidden" id="datasubmit-43244043248" value="2016-11-01 23:43:57">
                                                <span class="number">
                                                    订单号：
                                                    <a name="orderIdLinks" id="idUrl43244043248" target="_blank" 
                                                    clstag="click|keycount|orderinfo|order_num">
                                                        43244043248
                                                    </a>
                                                </span>
                                                <div class="tr-operate">
                                                    <span class="order-shop">
                                                        <span class="shop-txt" style="color:pink">
                                                           仙女商城
                                                        </span>
                                                      
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                      
                                        <tr class="tr-bd" id="track43244043248" oty="0,1,70">
                                            <td style='padding:0px;'>
                                                <!-- 每一种商品 -->
                                                <div style="padding:22px 0;border-collapse:collapse;">
                                                    收货信息:
                                                </div>
                                              
                                               
                                            </td>
                                            <!-- 订单的其它内容 -->
                                            <td>
                                                <div style="height:30px">
                                                   收货人:
                                                </div>

                                                <div style="height:30px;width: 180px">
                                                   联系方式:
                                                </div>
                                            </td>
                                            <td>
                                                <div class="amount">
                                                    <span>
                                                        总额 ￥229.70
                                                    </span>
                                                    <br>
                                                    <strong>
                                                        应付
                                                    </strong>
                                                    <br>
                                                    <strong>
                                                        ￥129.70
                                                    </strong>
                                                    <br>
                                                   
                                                </div>
                                            </td>
                                            <td>
                                                <div class="status">
                                                    <span class="order-status ftx-04">
                                                        正在出库
                                                    </span>
                                                    <br>
                                                    <span class="order-status ftx-04">
                                                        已支付
                                                    </span>
                                                   
                                                </div>
                                            </td>
                                            <td>
                                                <div class="operate">
                                                    <div id="pay-button-43244043248" _baina="0">
                                                    </div>
                                                    <a class="a-link order-cancel" href="javascript:void(0);" _oid="43244043248"
                                                    _passkey="42BA3A2A715A28F4540B508F726F0E0E" _url="new/cancelOrder.html?1&amp;cancalText=0&amp;isHaveGiftOrder=0&amp;status=0">
                                                        取消订单
                                                    </a>
                                                    <br>
                                                    <a class="J-reminder" href="https://order.jd.com/center/list.action?search=0&amp;d=1&amp;s=4096#"
                                                    data-orderid="43244043248">
                                                        催单
                                                    </a>
                                                    <br>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- 其它内容结束 -->
                                    </tbody>
                                </table>
                
        
    </div>
</div>
@endsection                        
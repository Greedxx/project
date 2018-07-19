@extends('layout.main')
@section('title', '仙女商城')
@section('css')
<link rel="stylesheet" type="text/css" href="/css/finish.css">
@endsection

@section('content')
<div class="w main" style="margin-top: 200px ; margin-bottom: 300px;">
    <div class="m m3 msop">
        <div class="mt" id="success_tittle"><s class="icon-succ02"></s>
            <h3 class="ftx-02">感谢您，订单提交成功！</h3>
        </div>
        <div class="mc" id="success_detail">
            <input type="hidden" id="loadSuccessFlag" value="ok">
            <!-- 加載成功標識  -->
            <input type="hidden" id="skuIds" value="1832201">
            <div class="btn-area mb10"> <a class="btn-ordershow" href="http://order.jd.com/center/list.action" clstag="pageclick|keycount|trade_201602181|31">查看订单</a>
                <a class="btn-buyagain ml10" href="http://cart.jd.com/cart/dynamic/reBuyForOrderCenter.action?wids=1832201&amp;nums=1&amp;rid=1478856930554" clstag="pageclick|keycount|trade_201602181|32"> <i></i>
                    再次购买</a>
            </div>
            <ul class="list-order">
                <li class="li-st">
                    <div class="fore1">订单号：<a href="http://order.jd.com/center/itemPage.action?orderid=44392478919&amp;PassKey=869D978B2C2CD34F0349D28270FA8950">44392478919</a>
                    </div>
                    <!-- 货到付款 -->
                    <div class="fore2">货到付款：<strong class="ftx-01">799.00元</strong>
                    </div>
                    <div class="fore3">京东快递 &nbsp; 送货时间:    <strong class="ftx-01">预计11月13日（周日）送达,双十一期间促销火爆，可能影响送货时效，请谅解。</strong>
                        &nbsp;</div>
                </li>
            </ul>
            <!-- 在线支付按钮  -->
            <div id="bookDiv"></div>

            <div class="d-tips"> <span class="d-tips-cont">
                <i></i>
                   重要提醒：本平台不会以
                <span class="ftx-01">任何理由</span>
                ，要求您点击 <span class="ftx-01">任何网址链接</span>
                进行退款操作。点此查看京东平台“ <a class="ftx-05" target="_blank" href="http://www.jd.com/news.aspx?id=22399">谨防诈骗公告声明</a>
                ”</span>
            </div>
        </div>
        <div class="qr-code">
            <a class="code" href="javascript:void(0)">
              
            </a>
            <a class="sao02" href="javascript:void(0)"></a>
        </div>
    </div>
    <div class="o-mb">完成支付后，您可以： <a href="/" clstag="pageclick|keycount|trade_201602181|33">继续购物</a>&nbsp;&nbsp
    </div>
</div>


@endsection
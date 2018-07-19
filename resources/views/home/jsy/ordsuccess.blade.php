@extends('layout.main')
@section('title', '仙女商城')
@section('css')
<link rel="stylesheet" type="text/css" href="/css/finish.css">
@endsection

@section('content')
<div class="w main" style="margin-top: 50px ; margin-bottom: 300px;">
    <div class="m m3 msop">
        <div class="mt" id="success_tittle"><s class="icon-succ02"></s>
            <h3 class="ftx-02">感谢您，订单提交成功！</h3>
            
        </div>
        <div class="mc" id="success_detail">
            <input type="hidden" id="loadSuccessFlag" value="ok">
            <!-- 加載成功標識  -->
            <input type="hidden" id="skuIds" value="1832201">
            <div class="btn-area mb10"> <a class="btn-ordershow" href="/home/user">查看订单</a>
                <a class="btn-buyagain ml10" href="/"> <i></i>
                    再次购买</a>
            </div>
            <ul class="list-order">
                <li class="li-st">
                    <div class="fore1">订单号：{{$order_id}}
                    </div>
                    <!-- 货到付款 -->
                    <div class="fore2">货到付款：<strong class="ftx-01">{{$sums}}.00元</strong>
                    </div>
                    <div class="fore3">魔仙快递 &nbsp; 送货时间:    <strong class="ftx-01">预计11月13日（周日）送达,促销期间火爆，可能影响送货时效，请谅解。</strong>
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
    
</div>


@endsection
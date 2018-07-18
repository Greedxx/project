<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="_token" content="{{ csrf_token() }}"/>
<title>购物车页面</title>

<link href="/bs/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/bs/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/home/js/jquery-1.7.1.min.js"></script>
<script> var $jq = jQuery.noConflict(true); </script>
<!-- <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>  -->

<script type="text/javascript" src="/bs/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/home/js/Public.js"></script>
<script src="/js/jquery.cookie.js" type="text/javascript"></script>
<!-- <script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script> -->
<!-- <script src="/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script> -->
<script src="/js/footer.js" type="text/javascript"></script>
<script src="/layer/layer.js" type="text/javascript"></script>




<link href="/css/shopcart_style.css" rel="stylesheet" type="text/css" />



<link rel="stylesheet" type="text/css" href="/admins/css/hang.css">
<link href="/css/common.css" rel="stylesheet" type="text/css" />
<link href="/css/user_style.css" rel="stylesheet" type="text/css" />
<link href="/home/css/base.css" rel="stylesheet" type="text/css" />
<link href="/home/css/index.css" rel="stylesheet" type="text/css" />


<link href="/home/css/pro-list.css" rel="stylesheet" type="text/css" />
<link href="/home/css/user.css" rel="stylesheet" type="text/css" />
<link href="/home/css/pro-detailed.css" rel="stylesheet" type="text/css" />             

</head>

<style type="text/css">
    *{-webkit-box-sizing: content-box;
    box-sizing: content-box;}
</style>

<body>
    <!------------top---------------->
    <div class="top">
        <div class="top-c">
    
            <div class="top-right">
                <p>嗨，欢迎来到仙女商城</p>
                @if(session('userinfo'))
                    <p><a href="/home/users/{{session('userinfo.id')}}/edit"><?php echo session('userinfo.username')   ?></a> | <a href="/home/lologin">退出</a></p>
                @else
                    <p><a href="/home/login">请登录</a> | <a href="/home/zhuce">免费注册</a></p>
                @endif
                <p><a href="/home/user">我的订单</a> | <a href="javascript:;">服务中心</a></p>
            </div>
        </div>
    </div>

    <!------------myheader---------------->
    <div class="myheader">
        <div class="logo"><a href="/"><img src="/home/images/logo.png" width="190" /></a></div>

        <div class="myheader-right">

            <?php  
                if (empty($arr)){ $arr['id']=0;$arr['sort']=4; $arr['keyword']=" ";}   
                if (isset($arr['keyword']) || array_key_exists('keyword', $arr))
                { }
                else {$arr['keyword']=""; }  
            ?>

            <form action="/list?id={{$arr['id']}}&sort={{$arr['sort']}}" method="get">
                <div class="search-section">
                    <div class="keyword"><input name="keyword"  type="text"  value="<?php $arr['keyword'] ?>" placeholder="请输入商品名称" onFocus="this.value=''" onBlur="if(!value){value=defaultValue;}"/></div>
                    <input type="submit" class="mybtn"  value="">
                </div>
            </form>
            
             
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="/home/js/Public.js"></script>
    
    <!------------myheader-wrap---------------->
    <?php 
        $data = App\Models\Cate::where('pid',0)->limit(5)->get(); 
        $cate = App\Models\Cate::getCates();
        // dump($cate);
    ?>
    <div class="myheader-wrap">
        <div class="mynavwrap">
            <div id="mynav">
                <div class="mynavbar myclearfix">

                    <a class="current" href="/">首页</a>
                    @foreach ($data as $k =>$v)
                    <a href="/list?id={{$v['cate_id']}}">{{$v['cate_name']}}</a>
                    @endforeach
                    <a href="/service">服务帮助</a>
                    <!-- <a href="/content">评测推荐<em class="sale"></em></a> -->
                </div>
                                                            
                <div class="pros subpage">
                    <h2>全部商品分类</h2>
                    <ul class="prosul myclearfix" id="proinfo" style="display:none">
                       @foreach ($cate as $k =>$v)
                        <li>

                            <h3><a href="/list?id={{$v['cate_id']}}">{{$v['cate_name']}}</a> </h3>

                                
                                @foreach ($v['sub'] as $k2 =>$v2)
                                <a href="/list?id={{$v2['cate_id']}}">{{--$v2['cate_name']--}}</a>
 
                                    <div class="prosmore hide">
                                        @foreach ($v['sub'] as $kk =>$vv)
                                        <span><em><a href="/list?id={{$vv['cate_id']}}">{{$vv['cate_name']}}</a></em></span>
                                        <!-- <span><em class="morehot"><a class="morehot" href="#">电锁门禁</a></em></span> -->
                                        @endforeach
                                    </div>

                                 @endforeach

                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>






<div class="wushi"></div>

<div class="catbox">
	@if(session('cart'))
    <table id="cartTable">
        <thead>
            <tr>
                <th>
                    <label>
                        <input class="check-all check" type="checkbox" />&nbsp;全选</label>
                </th>
                <th>商品</th>
                <th>单价</th>
                <th>数量</th>
                <th>小计</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
			@foreach (session('cart') as $k => $v)
            <tr>
                <td class="checkbox1">
                    <input class="check-one check" type="checkbox" style="">
                </td>
                <td class="goods">
                    <img src="{{$v['thumb']}}" alt="" />
                    <span>{{$v['goods_name']}}</span>
                </td>
                <td class="price">{{$v['price']}}</td>
                <td class="count">
                    <span class="reduce">-</span>
                    <input class="count-input" type="text" value="{{$v['num']}}" />
                    <span class="add">+</span>
                </td>
                <td class="subtotal">{{ $v['sum']}}</td>
                <td class="operation">
                    <span class="delete" key="{{$k}}">删除</span>
                </td>
			</tr>
			@endforeach
		
		
		

 
        </tbody>
    </table>
    <div class="foot" id="foot">
        <label class="fl select-all">
            <input type="checkbox" class="check-all check" />&nbsp;全选</label>
        <a class="fl delete" id="deleteAll" href="javascript:;">删除</a>
        <div class="fr closing">结 算</div>
        <div class="fr total">合计：￥
            <span id="priceTotal">0.00</span>
        </div>
        <div class="fr selected" id="selected">已选商品
            <span id="selectedTotal">0</span>件
            <span class="arrow up">︽</span>
            <span class="arrow down">︾</span>
        </div>
        <div class="selected-view">
            <div id="selectedViewList" class="clearfix">
                <div>
                    <img src="images/1.jpg">
                    <span>取消选择</span>
                </div>
            </div>
            <span class="arrow">◆
                <span>◆</span>
            </span>
        </div>
	</div>
	
	<!-- Js 部分-->
	<script type="text/javascript">

    $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
/**
 * Created by an.han on 13-12-17.
 */
window.onload = function () {
    if (!document.getElementsByClassName) {
        document.getElementsByClassName = function (cls) {
            var ret = [];
            var els = document.getElementsByTagName('*');
            for (var i = 0, len = els.length; i < len; i++) {

                if (els[i].className.indexOf(cls + ' ') >=0 || els[i].className.indexOf(' ' + cls + ' ') >=0 || els[i].className.indexOf(' ' + cls) >=0) {
                    ret.push(els[i]);
                }
            }
            return ret;
        }
    }

    var table = document.getElementById('cartTable'); // 购物车表格
    var selectInputs = document.getElementsByClassName('check'); // 所有勾选框
    var checkAllInputs = document.getElementsByClassName('check-all') // 全选框
    var tr = table.children[1].rows; //行
    var selectedTotal = document.getElementById('selectedTotal'); //已选商品数目容器
    var priceTotal = document.getElementById('priceTotal'); //总计
    var deleteAll = document.getElementById('deleteAll'); // 删除全部按钮
    var selectedViewList = document.getElementById('selectedViewList'); //浮层已选商品列表容器
    var selected = document.getElementById('selected'); //已选商品
    var foot = document.getElementById('foot');

    // 更新总数和总价格，已选浮层
    function getTotal() {
		var seleted = 0;
		var price = 0;
		var HTMLstr = '';
		for (var i = 0, len = tr.length; i < len; i++) {
			if (tr[i].getElementsByTagName('input')[0].checked) {
				tr[i].className = 'on';
				seleted += parseInt(tr[i].getElementsByTagName('input')[1].value);
				price += parseFloat(tr[i].cells[4].innerHTML);
				HTMLstr += '<div><img src="' + tr[i].getElementsByTagName('img')[0].src + '"><span class="del" index="' + i + '">取消选择</span></div>'
			}
			else {
				tr[i].className = '';
			}
		}
	
		selectedTotal.innerHTML = seleted;
		priceTotal.innerHTML = price.toFixed(2);
		selectedViewList.innerHTML = HTMLstr;
	
		if (seleted == 0) {
			foot.className = 'foot';
		}
	}

    // 计算单行价格
    function getSubtotal(tr) {
        var cells = tr.cells;
        var price = cells[2]; //单价
        var subtotal = cells[4]; //小计td
        var countInput = tr.getElementsByTagName('input')[1]; //数目input
        var span = tr.getElementsByTagName('span')[1]; //-号
        //写入HTML
        subtotal.innerHTML = (parseInt(countInput.value) * parseFloat(price.innerHTML)).toFixed(2);
        //如果数目只有一个，把-号去掉
        if (countInput.value == 1) {
            span.innerHTML = '';
        }else{
            span.innerHTML = '-';
        }
    }

    // 点击选择框
    for(var i = 0; i < selectInputs.length; i++ ){
        selectInputs[i].onclick = function () {
            if (this.className.indexOf('check-all') >= 0) { //如果是全选，则吧所有的选择框选中
                for (var j = 0; j < selectInputs.length; j++) {
                    selectInputs[j].checked = this.checked;
                }
            }
            if (!this.checked) { //只要有一个未勾选，则取消全选框的选中状态
                for (var i = 0; i < checkAllInputs.length; i++) {
                    checkAllInputs[i].checked = false;
                }
            }
            getTotal();//选完更新总计
        }
    }

    // 显示已选商品弹层
    selected.onclick = function () {
        if (selectedTotal.innerHTML != 0) {
            foot.className = (foot.className == 'foot' ? 'foot show' : 'foot');
        }
    }

    //已选商品弹层中的取消选择按钮
    selectedViewList.onclick = function (e) {
        var e = e || window.event;
        var el = e.srcElement;
        if (el.className=='del') {
            var input =  tr[el.getAttribute('index')].getElementsByTagName('input')[0]
            input.checked = false;
            input.onclick();
        }
    }

    //为每行元素添加事件
    for (var i = 0; i < tr.length; i++) {
        //将点击事件绑定到tr元素
        tr[i].onclick = function (e) {
            var e = e || window.event;
            var el = e.target || e.srcElement; //通过事件对象的target属性获取触发元素
            var cls = el.className; //触发元素的class
            var countInout = this.getElementsByTagName('input')[1]; // 数目input
            var value = parseInt(countInout.value); //数目
            //通过判断触发元素的class确定用户点击了哪个元素
            switch (cls) {
                case 'add': //点击了加号
                    countInout.value = value + 1;
                    getSubtotal(this);
                    break;
                case 'reduce': //点击了减号
                    if (value > 1) {
                        countInout.value = value - 1;
                        getSubtotal(this);
                    }
                    break;
                case 'delete': //点击了删除
                    var id = $(this).find(".delete").attr("key");
                    
                    $.get('/getdel',{id:id},function(data){
                        if(data == 0){
                            alert('删除成功');
                            location.reload(true);
                        }else{
                            alert('删除失败');
                            location.reload(true);
                        }
                    });


            }
            getTotal();
        }
        // 给数目输入框绑定keyup事件
        tr[i].getElementsByTagName('input')[1].onkeyup = function () {
            var val = parseInt(this.value);
            if (isNaN(val) || val <= 0) {
                val = 1;
            }
            if (this.value != val) {
                this.value = val;
            }
            getSubtotal(this.parentNode.parentNode); //更新小计
            getTotal(); //更新总数
        }
    }

    // 点击全部删除
    deleteAll.onclick = function () {
        if (selectedTotal.innerHTML != 0) {
            var ids = Array();
            $(":checked").parents('tr').find('.delete').each(function(i){
                var id = $(this).attr('key');
                ids[i] = id;
            });

            $.get('/getsdel',{ids:ids},function(data){
                        if(data == 0){
                            alert('删除成功');
                            location.reload(true);
                        }else{
                            alert('删除失败');
                            location.reload(true);
                        }
                    });
            
            
        } else {
            alert('请选择商品！');
        }
        getTotal(); //更新总数
    }

    // 默认全选
    checkAllInputs[0].checked = true;
    checkAllInputs[0].onclick();
}

	











	




	</script>
	<!-- Js 结尾-->


	@else
		<center>
		<h1>您还没有商品加入购物车</h1>
		</center>
	@endif
</div>



<div class="yibai"></div><div class="yibai"></div>


<div class="footer">
        <div class="a01">
            <div class="a001">
                <div class="a0001"><img src="/home/images/footer/01.png"><p>顺丰包邮</p></div>
                <div class="a0001"><img src="/home/images/footer/02.png"><p>100+ 城市次日到</p></div>
                <div class="a0001"><img src="/home/images/footer/03.png"><p>7天无理由退货</p></div>
                <div class="a0001"><img src="/home/images/footer/04.png"><p>15天换货保障</p></div>
                <div class="a0001"><img src="/home/images/footer/08.png"><p>上门快修</p></div>
                <div class="a0001"><img src="/home/images/footer/06.png"><p>230+ 线下体验店</p></div>
                <div class="a0001"><img src="/home/images/footer/07.png"><p>远程支持服务</p></div>
                <div class="a0001"><img src="/home/images/footer/05.png"><p>1年免费保修</p></div>
            </div>
            <div class="a002">
                <p class="riqi">周一至周日 7：30-24：00</p>
                <a href="" class="dianhua">400-788-3333</a>
                <div class="zaixiankefu"><img src="/home/images/footer/09.png"><p class="kefu1">在线客服</p></div>
            </div>  
            
        </div>
        <?php $data = App\Models\admin\Links::limit(9)->get()->toArray() ?>
        <div class="b02">
            <div class="b001">
                @foreach($data as $k=>$v)

                    @if($k==0)
                        <a href="{{$v['url']}}" class="b0001">{{$v['lname']}}</a>
                    @else
                        <a href="{{$v['url']}}" class="b0001">|&nbsp;{{$v['lname']}}</a>
                    @endif

                @endforeach 
            </div>
            
            <div class="b002">
                <a href="" class="b0002">©2018 Meizu Telecom Equipment Co.</a>
                <a href="" class="b0002">粤ICP备13003602号-2</a>
                <a href="" class="b0002">合字B2-20170010</a>
                <a href="" class="b0002">营业执照</a>
                <a href="" class="b0002">法律声明</a>
                <a href="" class="b00002">粤公网安备 44049102496009</a>
            </div>
        </div>
    </div>




</body>

</html>





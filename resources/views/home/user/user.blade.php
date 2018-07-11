@extends('layout.homeuser')

@section('title',$title)

@section('content')
   <!--样式-->
     <div class="user_info_p_s  clearfix">
       <!--订单记录-->
       <div class="left_user_cont">
     <div class="us_Orders left clearfix">
  <div class="Orders_name">
   <div class="title_name">
   <div class="Records">购买记录</div>
   <div class="right select">
   只记录你最近30天的购买记录   </div>
   </div>   
  </div>
  <table>
  <thead>
  <tr>
   <th>产品名称</th>
   <th>数量</th>
   <th>状态</th>
   <th>操作</th>
   </tr>
  </thead>
  <tbody>
   <tr>
    <td class="img_link">
    <a href="#" class="img"><img src="/products/p_58.jpg" width="80" height="80"></a>
  <a href="#" class="title">雅诗兰黛（Estee Lauder）弹性紧实柔肤眼霜15ml(又名弹性紧实眼霜)（提拉紧致 保湿补水 淡化细纹）</a>
  </td>
  <td>2</td>
  <td>完成</td>
  <td><a href="#" class="View">查看</a></td>
   </tr>
    <tr>
    <td class="img_link">
    <a href="#" class="img" title="山东红富士苹果"><img src="/products/p_2.jpg" width="80" height="80"></a>
     <i class="icon-copy"></i>
    <a href="#" class="img" title="进口澳洲苹果"><img src="/products/p_3.jpg" width="80" height="80"></a>
     <i class="icon-copy"></i>
    <a href="#" class="img" title="进口水果"><img src="/products/p_4.jpg" width="80" height="80"></a>
  </td>
  <td>2</td>
  <td>完成</td>
  <td><a href="#" class="View">查看</a></td>
   </tr>
     <tr>
    <td class="img_link">
    <a href="#" class="img" title="山东红富士苹果"><img src="/products/p_2.jpg" width="80" height="80"></a>
     <i class="icon-copy"></i>
    <a href="#" class="img" title="进口水果"><img src="/products/p_24.jpg" width="80" height="80"></a>
  </td>
  <td>2</td>
  <td>完成</td>
  <td><a href="#" class="View">查看</a></td>
   </tr>
   </tbody>
  </table>
   <div class="us_jls">共2条记录</div>
  </div>
    </div>
      <!--右侧记录样式-->
    <div class="right_user_recording">
    <div class="us_Record">

    <div id="Record_p" class="Record_p">



      <div class="title_name"><span class="name left">浏览历史</span><span class="pageState right"><span>1</span>/7</span></div>
        <div class="hd"><a class="next">&lt;</a><a class="prev">&gt;</a></div>
            <div class="bd">
                <ul >
                <li class="clone">
                        <div class="p_width">
                    <div class="pic"><a href=""><img src="/products/P_1.jpg"></a></div> 
                    <div class="title"><a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a></div>
                    <div class="Purchase_info"><span class="p_Price">￥32.50</span> <a href="#" class="Purchase">立即购买</a></div>
                </div>  
                    </li>
                <li >
                <div class="p_width">
                    <div class="pic"><a href=""><img src="/products/P_12.jpg"></a></div>  
                    <div class="title"><a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a></div>
                    <div class="Purchase_info"><span class="p_Price">￥32.50</span> <a href="#" class="Purchase">立即购买</a></div>
                </div>    
                </li>
                    <li >
                        <div class="p_width">
                    <div class="pic"><a href=""><img src="/products/P_23.jpg"></a></div>  
                    <div class="title"><a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a></div>
                    <div class="Purchase_info"><span class="p_Price">￥32.50</span> <a href="#" class="Purchase">立即购买</a></div>
                </div>  
                    </li>
                    <li >
                        <div class="p_width">
                    <div class="pic"><a href=""><img src="/products/P_4.jpg"></a></div> 
                    <div class="title"><a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a></div>
                    <div class="Purchase_info"><span class="p_Price">￥32.50</span> <a href="#" class="Purchase">立即购买</a></div>
                </div>              
                    </li>
                    <li>
                        <div class="p_width">
                    <div class="pic"><a href=""><img src="/products/P_5.jpg"></a></div> 
                    <div class="title"><a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a></div>
                    <div class="Purchase_info"><span class="p_Price">￥32.50</span> <a href="#" class="Purchase">立即购买</a></div>
                </div>              
                    </li>
                        <li>
                        <div class="p_width">
                    <div class="pic"><a href=""><img src="/products/P_8.jpg"></a></div> 
                    <div class="title"><a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a></div>
                    <div class="Purchase_info"><span class="p_Price">￥32.50</span> <a href="#" class="Purchase">立即购买</a></div>
                </div>        
                    </li>
                        <li >
                        <div class="p_width">
                    <div class="pic"><a href=""><img src="/products/P_1.jpg"></a></div> 
                    <div class="title"><a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a></div>
                    <div class="Purchase_info"><span class="p_Price">￥32.50</span> <a href="#" class="Purchase">立即购买</a></div>
                </div>  
                    </li>
                        <li>
                        <div class="p_width">
                    <div class="pic"><a href=""><img src="/products/P_6.jpg"></a></div> 
                    <div class="title"><a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a></div>
                    <div class="Purchase_info"><span class="p_Price">￥32.50</span> <a href="#" class="Purchase">立即购买</a></div>
                </div>  
                    </li>
                    <li class="clone" >
                <div class="p_width">
                    <div class="pic"><a href=""><img src="/products/P_11.jpg"></a></div>  
                    <div class="title"><a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a></div>
                    <div class="Purchase_info"><span class="p_Price">￥32.50</span> <a href="#" class="Purchase">立即购买</a></div>
                </div>    
                </li></ul></div>            
         </div>
         <script type="text/javascript">jQuery("#Record_p").slide({ mainCell:".bd ul",effect:"leftLoop",vis:1,autoPlay:false });</script>
      </div>
       </div> 
     </div>
@endsection
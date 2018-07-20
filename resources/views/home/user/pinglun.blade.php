
@extends('layout.main')

@section('title',$title)

@section('content')
<div class="user_style clearfix">
  <div class="user_center clearfix">
    <div class="left_style">
      <div class="menu_style">
      <div class="user_title"><a href="/home/user">用户中心</a></div>
      <div class="user_Head">
      <div class="user_portrait">
      <a href="#" title="修改头像" class="btn_link"></a> <img src="{{session('userinfo.profile')}}">
      <div class="background_img"></div>
      </div>
          <div class="user_name">
            <p><span class="name">{{session('userinfo.username')}}</span><a href="/home/xiu">[修改密码]</a></p>
          </div>           
      </div>
      <div class="sideMen">
     <!--菜单列表图层-->
      <dl class="accountSideOption1">
      <dt class="transaction_manage"><em class="icon_1"></em>订单管理</dt>
      <dd>
        <ul>
          <li> <a href="/home/user">我的订单</a></li>
          <li> <a href="/home/receive">收货地址</a></li>
        </ul>
      </dd>
      </dl>
      <dl class="accountSideOption1">
      <dt class="transaction_manage"><em class="icon_2"></em>会员管理</dt>
      <dd>
        <ul>
          <li><a href="/home/users/{{session('userinfo.id')}}/edit">用户信息</a></li>
          <li><a href="/home/keep">我的收藏</a></li>
          <li><a href="#">我的留言</a></li>
          <li><a href="#">我的标签</a></li>
          <li><a href="#">我的推荐</a></li>
          <li><a href="/home/pinglun">我的评论</a></li>
        </ul>
      </dd>
      </dl>
      </div>
        <!-- <script>jQuery(".sideMen").slide({titCell:"dt", targetCell:"dd",trigger:"click",defaultIndex:0,effect:"slideDown",delayTime:300,returnDefault:true});</script> -->
      </div>
   <!--浏览记录样式-->
    
   
    </div>
    <style type="text/css">
      
      .zhengti1{

      }
    </style>
    <div class="you_pinglun">
      <div class="zhengti1">
        <div class="pl">
          <ul>
            <li>我的评论</li>
          </ul>
        </div>
          
          <div class="xiangxi_pinglun">
            <!-- <div class="gsc">共评论：10条</div> -->
            @foreach($xinxi as $k =>$v)
            <div class="wdpl">
                <div class="pltp">
                  <img src="{{$v['thumb']}}">
                </div>
                <div class="plmc">
                  {{$v['goods_name']}}
                </div>
                 @if(empty($v['pinglun']))
                  <div class="neirong">
                  <textarea  rows="4" cols="100" placeholder="请输入评论内容..."></textarea>
                  <button class="button pinglun" style="vertical-align:middle" uid="{{session('userinfo.id')}}" gid="{{$v['id']}}" ><span>发表评论</span></button>
                  </div>
                  @else
                  <div class="neirong">
                  <textarea rows="4" cols="100" readonly>{{$v['pinglun']['msg']}}</textarea>
                  </div>
                  <!-- <textarea rows="4" cols="100" readonly>{{$v['pinglun']['tomsg']}}</textarea> -->
                  @endif
                
            </div>
            @endforeach
          
        </div>
        
      </div>
  
    </div>
  </div>
</div>


@endsection

@section('js')
<script type="text/javascript">

  $('.pinglun').click(function(){
    uid = $(this).attr('uid');
    gid = $(this).attr('gid');
    message = $(this).parent().find('textarea').val();
    $.get('/ajaxtao/msgadd',{uid:uid,gid:gid,msg:message},function(data){
      if(data==1){
        window.location.reload();
      }else{
        alert('评论失败');
      }
    })
  })

</script>
@endsection
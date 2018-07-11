@extends('layout.admins')
@section('title','留言回复')
@section('content')
<div class="wushi"></div>
<div class="mws-panel grid_8" >
    


    <div class="mws-panel-header">
        <span>消息内容</span>
    </div>
    <div class="mws-panel-body no-padding" >
    <div class="shi"></div>
    <center>
        <ul class="messagess">
            @foreach ($res as $k=>$v)
                @if( $v->msg )
                <li title=".icon-user" class="message-left">
                    <i class="icon-user"></i>

                    <span class="message-tou-user">用户 {{$v['user']->username}} 说:</span>
                    
                    <span claass="message-mesg" >{{$v->msg }}</span>
                </li>
                @endif

                <hr>
                @if( $v->tomsg )
                <li title=".icon-user" class="message-right" >
                   
                    <span claass="message-mesg" >{{$v->tomsg }}</span>
                    <span  class="message-tou-admin"> :管理员回复</span>
                   
                    <i class="icon-user"></i>
                </li>
                @endif
            @endforeach
        </ul>
        </center>
    </div>      
    </div>
<div class="yibai"></div>
<div class="yibai"></div>
<div class="yibai"></div>
<div class="mws-panel grid_8" style="width:60%;margin-left:280px;">
    

    @if(!$res[0]->tomsg)
    <div class="mws-panel-header">
        <span>消息回复</span>
    </div>
    
    <div class="mws-panel-body no-padding" style="">
        <form action="/admin/message/{{$id}}" method="post" class="mws-form" enctype="multipart/form-data" style="">

                <div class="mws-form-row ">
                    <label class="mws-form-label"><span style="font-weight:blod;">回复</span> 用户:</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" value="{{$res[0]['user']->username}}" style="width:120px;" disabled="disabled">
                    </div>
                </div>
               
    
                <div class="mws-form-row ">
                    <label class="mws-form-label">消息回复 :</label>
                    <div class="mws-form-item">
                        <textarea name="tomsg" rows="5" cols="60"></textarea> 
                    </div>
                </div>
                {{csrf_field()}}
                {{method_field('PUT')}}
            <div class="mws-button-row">
                
                <a href="/admin/message" class="btn btn-danger">返回</a>
                <input type="submit" class="btn btn-success" value="提交" style="float: right">
            </div>
        </form>
    </div>  
    @endif
</div>


@endsection

@section('js')
<script type="text/javascript">
  
    $('.mws-form-message').fadeOut(3000);

    
</script>
@endsection
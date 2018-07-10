@extends('layout.admins')
@section('title','留言回复')
@section('content')
<div class="wushi"></div>
<div class="mws-panel grid_8" >
    


    <div class="mws-panel-header">
        <span>消息内容</span>
    </div>
    <div class="mws-panel-body no-padding" style="">
    <div class="shi"></div>
        <ul>
            <li title=".icon-user">
                <i class="icon-user"></i>
                <h3>xx说: xxx</h3>
            </li>
            <li title=".icon-user">
                <i class="icon-user"></i>
                <h3>xx说: xxx</h3>
            </li>
            <li title=".icon-user">
                <i class="icon-user"></i>
                <h3>xx说: xxx</h3>
            </li>
            <li title=".icon-user">
                <i class="icon-user"></i>
                <h3>xx说: xxx</h3>
            </li>
        </ul>
    </div>      
</div>
<div class="yibai"></div>
<div class="yibai"></div>
<div class="yibai"></div>
<div class="mws-panel grid_8" style="width:60%;margin-left:280px;">
    


    <div class="mws-panel-header">
        <span>消息回复</span>
    </div>
    <div class="mws-panel-body no-padding" style="">
        <form action="/admin/content" method="post" class="mws-form" enctype="multipart/form-data" style="">

                <div class="mws-form-row ">
                    <label class="mws-form-label">用户</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="name" style="width:120px;" disabled="disabled">
                    </div>
                </div>


                <div class="mws-form-row ">
                    <label class="mws-form-label">消息回复 :</label>
                    <div class="mws-form-item">
                        <textarea name="desc" rows="5" cols="90"></textarea> 
                    </div>
                </div>
            
            <div class="mws-button-row">
                
                <a href="/admin/message" class="btn btn-danger">返回</a>
                <input type="submit" class="btn btn-success" value="提交" style="float: right">
            </div>
        </form>
    </div>      
</div>


@endsection

@section('js')
<script type="text/javascript">
  
    $('.mws-form-message').fadeOut(3000);

    
</script>
@endsection
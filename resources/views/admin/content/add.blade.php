@extends('layout.admins')

@section('title',$title)

@section('content')
<script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
</script>
<div class="mws-panel grid_8">
    
    <!-- 信息提醒 stat-->
    @if(session('success'))
    <div class="mws-form-message success">
        {{session('success')}}
    </div>
    @endif
    @if(session('error'))
    <div class="mws-form-message error">
        {{session('error')}}
    </div>
    @endif
    @if(session('info'))
    <div class="mws-form-message info">
        {{session('info')}}
    </div>
    @endif
    <script src="/js/jquery.js"></script>
    <script>
        // setTimeout(function(){
        //     $('.mws-form-message').remove();
        // },3000)
        $('.mws-form-message').fadeOut(3000);
    </script>
    <!-- 信息提醒 end -->

    <div class="mws-panel-header">
        <span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">
            @if (count($errors) > 0)
                <div class="mws-form-message error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style='font-size:16px;list-style:none'>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form action="/admin/content" method='post' class="mws-form" enctype='multipart/form-data'>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <div class="mws-form-col-2-6 " class="small">
                        <label class="mws-form-label">选择类别</label>
                        <select name='type'>
                            <option value="1" selected>服务指南</option>
                            <option value="2">商品评测</option>
                        </select>
                    </div>
                </div>

                <div class="mws-form-row">
                    <div class="mws-form-col-2-6 " class="small">
                        <label class="mws-form-label">是否发布</label>
                        <select name='type'>
                            <option value="1" selected>发布</option>
                            <option value="0">不发布</option>
                        </select>
                    </div>
                </div>

                <div class="mws-form-row ">
                    <label class="mws-form-label">内容小标</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='name'>
                    </div>
                </div>

                 <div class="mws-form-row">
                    <label class="mws-form-label">关键字</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='keywords'>
                    </div>
                </div>

                <div class="mws-form-row ">
                    <label class="mws-form-label">内容标题</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='title'>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">作者</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='zuozhe'>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">编辑人</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='editor'>
                    </div>
                </div>

                <div class="mws-form-row ">
                    <label class="mws-form-label">内容描述</label>
                    <div class="mws-form-item">
                        <textarea name='desc' rows="2"  cols="100" ></textarea> 
                    </div>
                </div>
            
                <div class="mws-form-row">
                    <label class="mws-form-label">商品详情</label>
                    <div class="mws-form-item">
                        <script id="editor" name="content"  type="text/plain" style="width:900px;height:600px;"></script>
                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                {{csrf_field()}}
                <a href="/admin/content" class="btn btn-danger" >返回</a>
                <input type="submit" class="btn btn-success" value="提交" style="float: right">
            </div>
        </form>
    </div>      
</div>


@endsection

@section('js')
<script type="text/javascript">
    /*setTimeout(function(){
        $('.mws-form-message').remove();
    },3000)*/

    $('.mws-form-message').fadeOut(5000);

</script>
@endsection
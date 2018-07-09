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
        <form action="/admin/goods" method='post' class="mws-form" enctype='multipart/form-data'>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <div class="mws-form-col-2-8">
                        <label class="mws-form-label">选择类别</label>
                        <select name='cate_id'>
                            @foreach($arr as $k=>$v)
                            {{ $n=substr_count($v->path,',') }}
                            <option value = "{{$v->cate_id}}">{{str_repeat('&nbsp;',$n*5)}}|-- {{ $v->cate_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <input type="hidden" class="small" name='goods_no' value="{{$goods_no}}">
                <div class="mws-form-row ">
                    <label class="mws-form-label">商品名称</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='goods_name'>
                    </div>
                </div>

                <div class="mws-form-row ">
                    <label class="mws-form-label">商品尺寸</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='size'>
                    </div>
                </div>

                <div class="mws-form-row ">
                    <label class="mws-form-label">商品颜色</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='color'>
                    </div>
                </div>

                <div class="mws-form-row ">
                    <label class="mws-form-label">商品型号</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='type'>
                    </div>
                </div>

                <div class="mws-form-row ">
                    <label class="mws-form-label">内存大小</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='memory'>
                    </div>
                </div>

              
                <div class="mws-form-row">
                    <label class="mws-form-label">商品价格</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='price'>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品总数</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='count'>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品状态</label>
                    <div class="mws-form-cols">
                        <div class="mws-form-col-2-6">
                        </div>
                        <span class=" " style=" width:200px;margin-left: 20px">
                            <input type="radio"  name='status' value="1" checked>上架
                            <input type="radio"  name='status' value="0" >不上架
                        </span>
                    </div>
                </div>
                  <div class="mws-form-row">
                    <label class="mws-form-label">商品描述</label>
                    <div class="mws-form-item">
                        <textarea name="desc" row="2" cols="90"></textarea>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">列表用单张图片</label>
                    <div class="mws-form-item">
                        <!-- <input type="file" class="small" name='profile'> -->

                        <input type="file" name='thumb' class="fileinput-preview" style=" width:400px; padding-right: 84px;" readonly="readonly"  placeholder="无文件">
                    </div>
                </div>
                 <div class="mws-form-row">
                    <label class="mws-form-label">商品轮播用组图</label>
                    <div class="mws-form-item">
                        <!-- <input type="file" class="small" name='profile'> -->

                        <input type="file" name='img[]' class="fileinput-preview" style=" width:400px; padding-right: 84px;" readonly="readonly"  multiple placeholder="无文件">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品详情</label>
                    <div class="mws-form-item">
                        <script id="editor" name="content"  type="text/plain" style="width:800px;height:600px;"></script>
                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                {{csrf_field()}}
                <a href="/admin/goods" class="btn btn-danger" >返回</a>
                <input type="submit" class="btn  btn-success" value="提交" style="float: right">
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
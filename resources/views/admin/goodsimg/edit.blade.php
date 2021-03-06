@extends('layout.admins')

@section('title',$title)

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{$title}}</span>
    </div>

    <div class="mws-panel-body no-padding">
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
                $('.mws-form-message').fadeOut(3000);
            </script>
            <!-- 信息提醒 end -->
            @if (count($errors) > 0)
                <div class="mws-form-message error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style='font-size:16px;list-style:none'>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form action="/admin/goodsimg/{{$gid}}/guan/{{$id}}" method='post' class="mws-form" enctype='multipart/form-data'>
            <div class="mws-form-inline">
                
                <!-- 该商品组 gid -->
                <input type="hidden" value="{{$gid}}" name ="gid">

                <div class="mws-panel-body"><h2><label>所属图组  </label>{{App\Models\Goods::select('goods_name')->where('id',$gid)->first()->goods_name }}</h2></div>

                <div class="mws-form-row ">
                    <label class="mws-form-label">图片排序号</label>
                    <div class="mws-form-item">
                        <input type="txt" name="sort" value="{{$data->sort}}">
                    </div>
                </div>
                
                <div class="mws-form-row ">
                    <label class="mws-form-label">原图</label>
                    <div class="mws-form-item">
                        <img src="{{$data->src}}" alt="{{$data->src}}" width="600px">

                    </div>
                </div>

                <div class="mws-form-row ">
                    <label class="mws-form-label">图片是否前台显示</label>
                    <div class="mws-form-item">
                        <input type="radio" name="statu" @if($data->statu == 0) checked="checked" @endif value="0">不显示
                        <input type="radio" name="statu" value="1" @if($data->statu ==1) checked="checked" @endif>显示

                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">图片上传</label>
                    <div class="mws-form-item">
                        <!-- <input type="file" class="small" name='profile'> -->

                        <input type="file" name='src' class="fileinput-preview" style=" width:400px; padding-right: 84px;" readonly="readonly"  placeholder="无文件">

                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <a href="/admin/goodsimg/{{$gid}}/guan" class="btn btn-danger" >返回</a>
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
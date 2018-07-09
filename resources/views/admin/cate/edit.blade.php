@extends('layout.admins')
@section('title',$title)
@section('content')
<div class="mws-panel grid_8">
    <!-- 信息提醒 stat-->
    @if (count($errors) > 0)
        <div class="mws-form-message error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style='font-size:16px;list-style:none'>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
    <script src="/js/jquery.js"></script>
    <script>
        // setTimeout(function(){
        //     $('.mws-form-message').remove();
        // },3000)
        $('.mws-form-message').fadeOut(3000);
    </script>
    <!-- 信息提醒 end -->
    
    <div class="mws-panel-header">
        <span><i class="icon-ok"></i> 修改类名</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form id="mws-validate" class="mws-form" action="/admin/cate/{{$cate->cate_id}}" method="post" novalidate="novalidate">
            {{ csrf_field() }}
            <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">修改名字
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="cate_name" value="{{$cate->cate_name}}" class="required email large">
                    </div>
                </div>
            </div>
            <div class="mws-button-row">          
                <a href="/admin/cate" class="btn btn-danger" >返回</a>
                <input type="submit" class="btn btn-success" style="float:right;">
            </div>
            {{method_field('PUT')}}
        </form>
    </div>      
</div>
@endsection
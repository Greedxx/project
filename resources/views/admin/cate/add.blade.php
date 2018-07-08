@extends('layout.admins')
@section('title',$title)
@section('content')
<div class="sanshi"></div>
<div class="mws-panel grid_8">

   @include('layout.error')
        
    <div class="mws-panel-header">
        <span><i class="icon-ok"></i> 添加</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form id="mws-validate" class="mws-form" action="/admin/cate" method="post" novalidate="novalidate">
            {{ csrf_field() }}
            <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">选择父类</label>
                    <div class="mws-form-item">
                        
                        <select name = 'pid' class="form-control">
                            <option value="0">添加顶级分类</option>
                            @foreach($cate as $k=>$v)
                            {{ $n=substr_count($v->path,',') }}
                              <option  @if(!empty($id ==$v->cate_id)) selected @endif value="{{$v->cate_id}}">{{str_repeat('&nbsp;',$n*5)}}|--{{ $v->cate_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">添加子类名称
                    </label>
                    <div class="mws-form-item ">
                        <input type="text" name="cate_name" class="required email large" >
                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                <input type="submit" class="btn btn-danger" >
                <a href="/admin/cate" class="btn btn-success" style="float:right;">返回</a>
            </div>
        </form>
    </div>      
</div>
@endsection
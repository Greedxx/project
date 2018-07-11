@extends('layout.admins')

@section('title',$title)


@section('content')
<div class="mws-panel grid_8">
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
    	<form action="/admin/admin/{{$res->aid}}" method='post' class="mws-form" >
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="vname" value='{{$res->vname}}'>
    				</div>
    			</div>
                <div class="mws-form-row">
                    <label class="mws-form-label">状态</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">

                            <li><input type="radio" name='buff' value='1' @if($res->buff == '1') checked='checked' @endif> <label>开启</label></li>


                            <li><input type="radio" name='buff' value='0'  @if($res->buff == '0') checked='checked' @endif> <label>关闭</label></li>

                        </ul>
                    </div>
                </div>
                <div class="mws-button-row">
                {{csrf_field()}}
              {{method_field('PUT')}}
                <input type="submit" class="btn btn-success" value="修改">
            </div>
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


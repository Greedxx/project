@extends('layout.admins')

@section('title','修改厂商')

@section('content')
			<div class="wushi"></div>

            @if (count($errors) > 0)
                <div class="mws-form-message error">
                    <ul>
                        @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

			<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-magic"></i> 修改厂商</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <div class="wizard-nav wizard-nav-horizontal">
                        	<ul>
                    
                        		<li data-wzd-id="wzd_1chldfu33d7iua1b25_1" class="current">
                        			<span><i class="icol-delivery"></i> 物流厂商信息</span>
                        		</li>
                        	
                        	</ul>
                    
                        </div>

                        <form id="mws-wizard-form" class="mws-form wizard-form wizard-form-horizontal" action="/admin/wuliu/{{$res->id}}" method="post">
                            
                            
                            <fieldset id="step-2" class="mws-form-inline" data-wzd-id="wzd_1chldfu33d7iua1b25_1" style="display: block;">

                                <div class="mws-form-row">
                                    <label class="mws-form-label">ID</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="id" class="required large" disabled="disabled" value="{{$res->id}}" />
                                    </div>
                                </div>

                                <div class="mws-form-row">
                                    <label class="mws-form-label">修改厂商名称 <span class="required">*</span></label>
                                    <div class="mws-form-item">
                                        <input type="text" name="cname" class="required large" value="{{$res->cname}}" />
                                    </div>
                                </div>

                            </fieldset>
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                        <div class="mws-button-row">
                        		
                        	<button class="btn btn-danger">添加</button>
                        	
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

    $('.mws-form-message').fadeOut(3000);

    
</script>
@endsection

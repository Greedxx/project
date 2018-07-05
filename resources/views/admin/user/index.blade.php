@extends('layout.admins')
@section('title',$title)
@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-ok"></i> 添加</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form id="mws-validate" class="mws-form" action="form_elements.html" novalidate="novalidate">
            <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">选择父类</label>
                    <div class="mws-form-item">
                        <input type="text" name="reqField" class="required large">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">添加子类名称
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="emailField" class="required email large">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">URL 添加</label>
                    <div class="mws-form-item">
                        <input type="text" name="urlField" class="required url large">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">Digit 添加</label>
                    <div class="mws-form-item">
                        <input type="text" name="ageField" class="required digits large">
                    </div>
                </div>        
            </div>
            <div class="mws-button-row">
                <input type="submit" class="btn btn-danger">
            </div>
        </form>
    </div>      
</div>
@endsection
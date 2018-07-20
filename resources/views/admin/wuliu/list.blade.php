@extends('layout.admins')
@section('title','发货列表')
@section('content')

<div class="wushi"></div>

@if(session('delete'))
    <div class="mws-form-message warning" style="height: 30px;">
        {{session('delete')}}
    </div>
@endif

@if(session('success'))
    <div class="mws-form-message success" style="height: 30px;">
        {{session('success')}}
    </div>
@endif

@if (count($errors) > 0)
    <div class="mws-form-message error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="mws-panel-body no-padding">

    

    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">

    <form action="/admin/wuliulist" method="get">
        <div id="DataTables_Table_1_length" class="dataTables_length">
            <label>
                显示
                <select size="1" name="num" aria-controls="DataTables_Table_1">
                  
                    <option value="10" @if($arr['num'] == 10)  selected="selected" @endif>
                        10
                    </option>

                    <option value="25" @if($arr['num'] == 25)   selected="selected" @endif>
                        25
                    </option>

                    <option value="50" @if($arr['num'] == 50)   selected="selected" @endif>
                        50
                    </option>

                    <option value="100" @if($arr['num'] == 100)   selected="selected" @endif>
                        100
                    </option>

                </select>
                条
            </label>
        </div>
        <div class="dataTables_filter" id="DataTables_Table_1_filter">
            <label>
                搜索订单:
                <input type="text" name='keywords' aria-controls="DataTables_Table_1">
                
            </label>
            <input type="submit" class="btn btn-info" value="提交">
        </div>
        
    </form>

    
        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
        aria-describedby="DataTables_Table_1_info">

            <thead>
                <tr role="row">

                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                    style="width: 30px;">
                        ID
                    </th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                    style="width: 500px;">
                        订单号
                    </th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                    style="width: 200px;">
                        物流厂商
                    </th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                    style="width: 200px;">
                        订单编号
                    </th>


                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                    style="width: 40px;">
                        支付状态
                    </th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                    style="width: 40px;">
                        物流状态
                    </th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                    style="width: 40px;">
                        订单详情
                    </th>



                </tr>
            </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
                @foreach ($res as $k=>$v)
                
                <tr class="odd">
                    <td class="sorting_1">
                        <center>
                        {{$v->id}}
                        </center>
                    </td>
                    <td class=" ">
                        <center>
                        {{$v->orders_id}}
                        </center>
                    </td>
                    <td class=" ">
                        <center>
                        <center>
                        @if ($v->wuliu_status != 0)
                            {{$v['wuliulist']->cname}}
                        @else
                            <span style="color:red;">未发货</span>
                        @endif
                        </center>
                    </td>
                        </center>
                    </td>
                    <td class=" ">
                        <center>
                        @if ($v->wuliu_status != 0)
                            {{$v['wuliulist']->danhao}}
                        @else
                            <span style="color:red;">未发货</span>
                        @endif
                        </center>
                    </td>
                   
                    <td class=" ">
                        <center>
                       @if ($v->status == 1)
                            <span style="color:green;">已支付</span>
                       @else 
                            <span style="color:red;">未支付</span>
                       @endif
                        </center>
                        
                    </td>
                    <td class=" ">
                        <center>
                        @if ($v->wuliu_status == 0)
                            未发货
                        @elseif ($v['wuliulist']->status == 1)
                            运输中
                        @elseif ($v['wuliulist']->status == 2)
                            已签收,未评论
                        @elseif ($v['wuliulist']->status == 3)
                            已评论
                            
                        @endif


                        </center>
                    </td>
                    <td class="">
                        <center>
                        @if ($v->wuliu_status == 0)
                        <a  vid="{{$v->id}}"  vod="{{$v->orders_id}}"  class="btn btn-info  btn-lg mws-form-dialog-mdl-btn">发货</a>
                        @else
                        <button  class="btn btn-danger btn-lg tuihuo">退货</button>
                        @endif
                        </center>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    <div class="dataTables_paginate paging_full_numbers" id="paginate">{{$res->appends($arr)->links()}}</div>

    </div>
</div>

                <div class="mws-panel grid_4" style="display:none" >
              
                    
                        <div class="mws-panel-content">
                            
                            <div id="mws-form-dialog">

                                <form id="mws-validate" class="mws-form" action="/admin/wuliulist/fahuo" method="post">

                                    <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
                                    
                                    <div class="mws-form-inline">
                                        <div class="mws-form-row">
                                            <label class="mws-form-label">订单ID</label>
                                            <div class="mws-form-item">
                                                <input type="text" class="required" name="did" id="did" readonly>
                                            </div>
                                        </div>

                                        <div class="mws-form-row">
                                            <label class="mws-form-label">商品编号</label>
                                            <div class="mws-form-item">
                                                <input type="text"  class="required email" id="oid" disabled="disabled">
                                            </div>
                                        </div>

                                        <div class="mws-form-row">
                                            <label class="mws-form-label">物流厂商</label>
                                            <div class="mws-form-item">
                                                <select class="required" name="cangshang">
                                                    <option disabled="disabled" >请选择厂商</option>
                                                @foreach ($list as $k=>$v)
                                                    <option>{{$v->cname}}</option>
                                                @endforeach    
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="mws-form-row">
                                            <label class="mws-form-label">快递单号</label>
                                            <div class="mws-form-item">
                                                <input type="text"  name="dingdan" class="required email" placeholder="请填写快递单号">
                                            </div>
                                        </div>
                                        {{csrf_field()}}
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div> 

                </div>
@endsection

@section('js')
<script type="text/javascript">

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.tuihuo').click(function(){
            var id = $(this).parents('tr').find('td').eq(0).text().trim();
            $.post('/admin/wuliulist/status',{id:id},function(data){
                if(data == 1){
                    alert('退货成功');
                    window.location.reload();
                }
            });
            
        });

         if( $.fn.dialog ) {
            $("#mws-jui-dialog").dialog({
                autoOpen: false,
                title: "填写快递单号",
                modal: true,
                width: "640",

                buttons: [{
                    text: "Close Dialog",
                    click: function () {
                        $(this).dialog("close");
                    }
                }]
            });

            $(".mws-form-dialog-mdl-btn").bind("click", function (event) {
                
                var vid = $(this).attr('vid');
                var vod = $(this).attr('vod');

                $('#did').val(vid);
                $('#oid').val(vod);
            
                $("#mws-form-dialog").dialog("option", {
                    modal: true,
                }).dialog("open");
                event.preventDefault();
           
                
            });

            $("#mws-form-dialog").dialog({
                autoOpen: false,
                title: "填写快递单号",
                modal: true,
                width: "640",
                buttons: [{
                    text: "提交",
                    click: function () {
                        
                        $(this).find('form#mws-validate').submit();
                    }
                }]
            });
        }
    

    $('.mws-form-message').fadeOut(3000);

    
</script>
@endsection





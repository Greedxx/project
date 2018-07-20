@extends('layout.admins')
@section('title','订单列表')
@section('content')

<div class="wushi"></div>

@if(session('delete'))
    <div class="mws-form-message warning" style="height: 30px;">{{session('delete')}}
    </div>
@endif

<div class="mws-panel-body no-padding">

    

    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">

	<form action="/admin/orders" method="get">
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
                    style="width: 300px;">
                        订单号
                    </th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                    style="width: 200px;">
                        用户
                    </th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                    style="width: 300px;">
                        商品名
                    </th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                    style="width: 300px;">
                        收货地址
                    </th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                    style="width: 100px;">
                        支付状态
                    </th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                    style="width: 100px;">
                        物流状态
                    </th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                    style="width: 150px;">
                        订单详情
                    </th>



                </tr>
            </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
            	@foreach ($res as $k=>$v)
				
                <tr class="odd">
                    <td class="  sorting_1">
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
                         {{$v['user']->username}}
                        </center>
                    </td>
                    <td class=" ">
                        <center>
                        {{$v['good']->goods_name}}
                        </center>
                    </td>
                    <td class=" ">
                        <center>
                        {{$v->addr}}
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
                            已签收,为评论
                        @elseif ($v['wuliulist']->status == 3)
                            已评论
                     
                        @endif
                        </center>
                    </td>
                    <td class="">
                        <center>
            
                        <a href="/admin/orders/{{$v->id}}" class="btn btn-info  btn-lg">详情</a>
                        
                        <div style="display: inline-block;">
                        <form action="/admin/orders/{{$v->id}}"  method='post'>
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                            <input  type='submit' value ="删除" class="btn btn-danger btn-lg"></input>
                       
                        </form>
                        </div>

                        </center>

                    </td>
                </tr>
        		@endforeach
            </tbody>
        </table>

    <div class="dataTables_paginate paging_full_numbers" id="paginate">{{$res->appends($arr)->links()}}</div>

<!--         <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
      
            <a tabindex="0" class="first paginate_button paginate_button_disabled"
            id="DataTables_Table_1_first">
                First
            </a>
            <a tabindex="0" class="previous paginate_button paginate_button_disabled"
            id="DataTables_Table_1_previous">
                Previous
            </a>
        
            <span>
                <a tabindex="0" class="paginate_active">
                    1
                </a>
                <a tabindex="0" class="paginate_button">
                    2
                </a>
                <a tabindex="0" class="paginate_button">
                    3
                </a>
                <a tabindex="0" class="paginate_button">
                    4
                </a>
                <a tabindex="0" class="paginate_button">
                    5
                </a>
            </span>
            <a tabindex="0" class="next paginate_button" id="DataTables_Table_1_next">
                Next
            </a>
            <a tabindex="0" class="last paginate_button" id="DataTables_Table_1_last">
                Last
            </a>
        </div> -->

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





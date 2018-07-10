@extends('layout.admins')
@section('title','留言列表')
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

<div class="mws-panel-body no-padding">

    

    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">

	<form action="/admin/wuliu" method="get">
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
                搜索用户名:
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
                    style="width: 50px;">
                        ID
                    </th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                    style="width: 100px;">
                        用户名
                    </th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                    style="width: 100px;">
                        商品名
                    </th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                    style="width: 250px;">
                        留言信息
                    </th>


                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                    style="width: 50px;">
                        操作
                    </th>

                </tr>
            </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
            	@foreach ($res as $k=>$v)
				
                <tr class="odd">
                    <td class="  sorting_1" style="">
                        <center>
                        {{$v->id}}
                        </center>
                    </td>
                    <td class=" ">
                        <center>
                        {{$v->cname}}
                        </center>
                    </td>
                    <td class=" ">
                        <center>
                        {{$v->cname}}
                        </center>
                    </td>
                    <td class=" ">
                        <center>
                        {{$v->cname}}
                        </center>
                    </td>

                    <td class="">
                        
                        <center>
                        
                        <a href="/admin/message/huifu" class="btn btn-info  btn-lg">回复</a>
                        
                        <div style="display: inline-block;">
                        <form action="/admin/wuliu/{{$v->id}}"  method='post'>
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                            <input  type='submit' value ="删除" class="btn btn-danger btn-lg"></input>
                       
                        </form>
                        </div>
                        </center>
                    </td>
                        
                    </td>
                </tr>
        		@endforeach
            </tbody>
        </table>

    <div class="dataTables_paginate paging_full_numbers" id="paginate">{{$res->appends($arr)->links()}}</div>

    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    
    $('.mws-form-message').fadeOut(3000);

    
</script>
@endsection





@extends('layout.admins')

@section('title',$title)

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
            {{$title}}
        </span>
    </div>

    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
            <form action="/admin/goods" method='get'>
                
                <div id="DataTables_Table_1_length" class="dataTables_length">
                    <label>
                        显示
                        <select name="num" size="1" aria-controls="DataTables_Table_1">

                            <option value="10" @if($arr['num'] == 10)   selected="selected" @endif>
                                10
                            </option>
                            <option value="20" @if($arr['num'] == 20)   selected="selected" @endif>
                                20
                            </option>
                            <option value="30" @if($arr['num'] == 30)   selected="selected" @endif>
                                30
                            </option>
                            
                        </select>
                        条数据
                    </label>
                </div>
                <div class="dataTables_filter" id="DataTables_Table_1_filter">
                    <label>
                        商品id:
                        <input type="text" name='id' value="{{$arr['id']}}" aria-controls="DataTables_Table_1">
                    </label>
                    <label>
                        商品编号:
                        <input type="text" name='goods_no' value="{{$arr['goods_no']}}" aria-controls="DataTables_Table_1">
                    </label>
                    <label>
                        厂商型号:
                        <input type="text" name='type' value="{{$arr['type']}}" aria-controls="DataTables_Table_1">
                    </label>
                    <label>
                        商品名称:
                        <input type="text" name='goods_name' value="{{$arr['goods_name']}}" aria-controls="DataTables_Table_1">
                    </label>
                    
                    <button class='btn btn-info'>搜索</button>
                    <a href="/admin/goods/create" class='btn btn-success'>添加商品</a>

                </div>
            </form>


            <style>
                .txt{
                    border:1px solid #ddd;
                    overflow: hidden;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                    text-align: center;
                }
            </style>
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th rowspan="1" colspan="1" class=".txt" style="width: 10px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            ID
                        </th>

                        <th class=""  rowspan="1" colspan="1" class=".txt" style="width: 60px;" >
                            分类
                        </th>

                        <th class=""  rowspan="1" colspan="1" class=".txt" style="width: 60px;" >
                            品牌
                        </th>

                        <th rowspan="1" colspan="1" class=".txt" style="width: 10px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            商品编号
                        </th>

                        <th rowspan="1" colspan="1" class=".txt" style="width: 10px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            厂商型号
                        </th>

                        <th  class = "" rowspan="1" colspan="1"   aria-label="Platform(s): activate to sort column ascending">
                            品名
                        </th>

                         <th  class = ".txt" rowspan="1" colspan="1" width="120px" >
                            图片
                        </th>
                       
                        <th   class = ".txt" rowspan="1" colspan="1" width="120px">
                            定价
                        </th>
                       
                        <th class="sorting txt" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1"  aria-label="Platform(s): activate to sort column ascending" width="50px">
                            库存
                        </th>
                        <th class="sorting txt" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1"  aria-label="Platform(s): activate to sort column ascending" width="50px">
                            销量
                        </th>
                         <th rowspan="1" colspan="1"  aria-label="Platform(s): activate to sort column ascending" width="50px">
                            状态
                        </th>
                        <th 
                        rowspan="1" colspan="1"  >
                           操作
                        </th>
                        <!--  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1"  aria-label="Platform(s): activate to sort column ascending">
                            添加时间
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1"  aria-label="Platform(s): activate to sort column ascending">
                            更新时间
                        </th> -->
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">

                    @foreach($data as $k => $v)

                    <tr class="@if($k % 2 == 1)  odd   @else even  @endif">

                        <td class="">
                            {{$v->id}}
                        </td>

                        <td class=" ">
                            {{$v->cate_id}}
                        </td>

                        <td class=" ">
                            {{$v->brand_id}}
                        </td>

                        <td class=" ">
                            {{$v->goods_no}}
                        </td>

                        <td class=" ">
                            {{$v->type}}
                        </td>

                        <td class=" txt">
                            {{$v->goods_name}}
                        </td>
                            
                        <td class=" ">
                            <center><img src="{{$v['thumb']}}" alt="" width='120px'></center>
                        </td>

                        <td class="txt">
                            {{$v['price']}}
                        </td>

                        <td class="txt">
                            {{$v['count']}}
                        </td>

                        <td class="txt">
                            {{$v['sum']}}
                        </td>

                        <td class="txt">
                            @if($v['status']==0)
                                未上架
                            @else
                                已上架
                            @endif
                        </td>

                         <td class="txt">
                            
                             @if($v['status']==0)
                            <a href="/admin/goods/{{$v->id}}/edit" class='btn btn-success' id="kai" statu='0' va="{{$v['status']}}">上架</a>
                            @else
                            <a href="/admin/goods/{{$v->id}}/edit" class='btn btn-danger' id="kai" statu='1' va="{{$v['status']}}">下架</a>
                            @endif

                            <a href="/admin/goods/{{$v->id}}/edit" class='btn btn-info'>信息修改</a>

                            <a href="/admin/goodsimg/{{$v->id}}/guan" class='btn btn-info'>组图修改</a>

                            <form action="/admin/goods/{{$v->id}}" method='post' style='display:inline'>
                                
                                {{csrf_field()}}

                                {{method_field('DELETE')}}
                                <button href="" class='btn btn-warning'>删除</button>

                            </form>               
                        </td>

                        <!--  <td class=" ">
                            {{$v['created_at']->format('y年m月n日 H时i分s秒')}}
                        </td>
                        <td class=" ">
                            {{$v['updated_at']->format('y年m月n日 H时i分s秒')}}
                        </td> -->
                    </tr>
                 
                    @endforeach
               
                </tbody>
            </table>
            <div class="dataTables_paginate paging_full_numbers" style="" id="paginate">
                <nav aria-label="Page navigation">
                {{ $data->appends($arr)->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    // alert('$');
                               
     $('#kai').click(function(){
        va =  $('#kai').attr('value');
        aid =  $('#kai').attr('aid');
        console.log(va);

        $.post('/admin/taoajax',{vname:va,aid:aid},function(data){
            console.log(data);
            if(data==1){
                $('#kai').attr('value',"0");
                $('#kai').attr('class',"btn btn-success");
                $('#kai').html('开启');
                alert('开启成功');
            }else if(data == 0){
                $('#kai').attr('value',"1");
                $('#kai').attr('class',"btn btn-danger");
                $('#kai').html('禁用');
                alert('禁用成功');
            }
        });
     });
   </script>

@endsection
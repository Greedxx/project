@extends('layout.admins')

@section('title',$title)

@section('content')

<style>
    .txt{
        border:1px solid #ddd;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        text-align: center;
    }
</style>

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
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th rowspan="1" colspan="1" class="txt" style="width: 10px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            ID
                        </th>

                        <th class=""  rowspan="1" colspan="1" class="txt" style="width: 60px;" >
                            分类
                        </th>

                        <th rowspan="1" colspan="1" class="txt" style="width: 10px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            商品编号
                        </th>

                        <th rowspan="1" colspan="1" class="txt" style="width: 10px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            厂商型号
                        </th>

                        <th  class = "" rowspan="1" colspan="1"   aria-label="Platform(s): activate to sort column ascending">
                            品名
                        </th>

                         <th  class = ".txt" rowspan="1" colspan="1"  >
                            图片
                        </th>
                       
                        <th   class = ".txt" rowspan="1" colspan="1" >
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
                        rowspan="1" colspan="1" width="px" >
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
                        {{--dd($data)--}}
                    @foreach($data as $k => $v)

                    <tr class="@if($k % 2 == 1)  odd   @else even  @endif">

                        <td class="">
                            {{$v->id}}
                        </td>

                        <td class=" ">
                            {{$v['cate']['cate_name'] OR "未分类"}}
                        </td>

                        <td class="txt">
                            {{$v->goods_no}}
                        </td>

                        <td class="txt">
                            {{$v->type}}
                        </td>

                        <td class=" txt">
                            {{$v->goods_name}}
                        </td>
                            
                        <td class=" ">
                            <center><img src="{{$v['thumb']}}" alt="{{$v['thumb']}}" width="90px"></center>
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

                        <td class="txt cc" >
                            @if($v['status']==0)
                                未上架
                            @else
                                已上架
                            @endif
                        </td>

                         <td class="txt">
                            
                            @if($v['status'] == 1 )
                            <a href="javascript:void(0)" class='btn btn-danger kai' " gid="{{$v->id}}"  value="0">下架</a>
                            @else
                            <a href="javascript:void(0)" class='btn btn-success kai'  gid="{{$v->id}}"  value="1">上架</a>
                            @endif

                            <a href="/admin/goods/{{$v->id}}/edit" class='btn btn-info'>信息修改</a>

                            <a href="/admin/goodsimg/{{$v->id}}/guan" class='btn btn-info'>组图修改</a>

                            <form action="/admin/goods/{{$v->id}}" method='post' style='display:inline'>
                                
                                {{csrf_field()}}

                                {{method_field('DELETE')}}
                                <button onclick="if(confirm('确定删除?')==false)return false;" class='btn btn-warning'>删除</button>

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
            <!-- ajax -->
            <script src="/js/jquery-3.2.1.min.js" ></script>
            <script type="text/javascript">
            // alert($);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
           
             $('.kai').click(function(){
                aa = $(this);
                st =  $(this).attr('value');
                gid =  $(this).attr('gid');
                console.log(typeof(st));
                console.log(st);
                console.log(typeof(gid));
                console.log(gid);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.post('/admin/ajaxtao/gstatus',{gid:gid,status:st},function(data){
                    console.log(typeof(data));
                    console.log(data);
                    if(data === '1' ){
                        aa.attr('value',0);
                        aa.attr('class',"btn btn-danger kai");
                        aa.text('下架');
                        aa.parents('tr').find('.cc').text('已上架');
                    } else if(data === '0'){
                        aa.attr('value',1);
                        aa.attr('class',"btn btn-success kai");
                        aa.text('上架');
                        aa.parents('tr').find('.cc').text('已下架');
                    } else {
                        alert('操作失败');
                    }
                });
             });
            </script>
            <!-- AJAX e -->

            <!-- 暂不与其他人样式冲突 -->
            <style>
            .pagination {
                clear: both;
                color: #7d7d7d;
                font-size: 12px;
                overflow: hidden;
                padding-top: 0px;
                padding-bottom: 0px;
                border-top: 1px #dfdfdf solid;
                FONT-FAMILY: "Microsoft Yahei";
                float: right;
                list-style: none;
                margin:0px;
             }
            .pagination li{
                float: left;
                color: #7d7d7d;
                font-size: 12px;
                font-weight: bold;
                padding: 7px 12px;
                margin-right: 8px;

             }
            .pagination li:hover{
                cursor: pointer;
             }
            .pagination .active{
                background-color: #88a9eb;
                color: #323232;
                border: none;
                background-image: none;
                box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
            }
            .pagination .disabled{
                    color: #666666;
                    cursor: default;
            }
            </style>

            
            <div class="dataTables_paginate paging_full_numbers" style="" id="paginate">
                {{ $data->appends($arr)->links() }}
               
            </div>
        </div>
    </div>
</div>

@endsection
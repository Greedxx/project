@extends('layout.admins')

@section('title',$title)

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
              {{$gname['goods_name']}} {{$title}}
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

                   <a class="btn btn-success" href="/admin/goods">返回上一级</a>

                   <a class="btn btn-info" href="/admin/goodsimg/{{$gid}}/guan/create">添加信息</a>

                </div>
            </form>


            <style>
                .txt{
                    border:1px solid #ddd;
                    overflow: hidden;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                }
            </style>
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" class=".txt" style="width: 60px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            图片编号
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="3"  style="width:260px;" aria-label="Platform(s): activate to sort column ascending">
                            图片
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width:100px;" class=".txt" aria-label="Platform(s): activate to sort column ascending">
                            图片排序
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width:100px;" aria-label="Platform(s): activate to sort column ascending">
                            图片轮播状态
                        </th>   
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="2" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">
                           操作
                        </th>
                    </tr>
                </thead>
                <style type="texts">
                    .texts{
                        text-align: center;
                        vertical-align:middle;
                    }
                </style>
                <tbody role="alert" aria-live="polite" aria-relevant="all">

                    @foreach($data as $k => $v)

                    <tr class="@if($k % 2 == 1)  odd   @else even  @endif" align="center" valign="middle" >

                        <td class=".texts">
                            {{$v->id}}
                        </td>

                        <td   colspan="3" >
                            <center><img src="{{$v->src}}" alt="" width='240px'></center>
                        </td>

                        <td class=".texts">
                            <!-- ajax 修改排序值 -->
                            {{$v->sort}}
                        </td>

                        <td class=".aa">
                            @if($v->statu==1)
                            已展示
                            @else
                            未展示
                            @endif
                        </td>  

                         <td class=".texts" colspan="2">

                             @if($v->statu==1)
                            <a href="/admin/goodsimg/{{$gid}}/guan/{{$v->id}}/edit" va="{{$v->statu}}" class='btn btn-warning'>关闭</a>
                            @else
                            <a href="/admin/goodsimg/{{$gid}}/guan/{{$v->id}}/edit" va="{{$v->statu}}" class='btn btn-success'>开启</a>
                            @endif

                            <a href="/admin/goodsimg/{{$gid}}/guan/{{$v->id}}/edit" class='btn btn-info'>修改</a>

                            <form action="/admin/goodsimg/{{$gid}}/guan/{{$v->id}}" method='post' style='display:inline'>
                                
                                {{csrf_field()}}

                                {{method_field('DELETE')}}
                                <button href="" class='btn btn-danger'>删除</button>

                            </form>
                            
                        </td>
                    </tr>
                 
                    @endforeach
               
                </tbody>
            </table>



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
@extends('layout.admins')

@section('title',$title)

@section('content')

<div class="mws-panel grid_8">

    <!-- 信息提醒 stat-->
    @if(session('success'))
    <div class="mws-form-message success">
        {{session('success')}}
    </div>
    @endif
    @if(session('error'))
    <div class="mws-form-message error">
        {{session('error')}}
    </div>
    @endif
    @if(session('info'))
    <div class="mws-form-message info">
        {{session('info')}}
    </div>
    @endif
    <script src="/js/jquery.js"></script>
    <script>
        // setTimeout(function(){
        //     $('.mws-form-message').remove();
        // },3000)
        $('.mws-form-message').fadeOut(3000);
    </script>
    <!-- 信息提醒 end -->
    
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
            {{$title}}
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
            <form action="/admin/content" method='get'>
                
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
                        标题:
                        <input type="text" name='title' value="{{$arr['title']}}" aria-controls="DataTables_Table_1">
                    </label>
                    <label>
                        关键字:
                        <input type="text" name='keywords' value="{{$arr['keywords']}}" aria-controls="DataTables_Table_1">
                    </label>
                    <button class='btn btn-info'>搜索</button>
                    <a href="/admin/content/create" class='btn btn-success'>添加文章</a>
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
                        <th  role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" class=".txt" style="width: 10px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            ID
                        </th>
                        <th role="columnheader" rowspan="1" colspan="1" class=".txt" style="width: 30px;" aria-label="Browser: activate to sort column ascending">
                            文章类型
                        </th>
                        <th rowspan="1" colspan="1" class=".txt" style="width: 50px;">
                            关键字
                        </th>
                         <th owspan="1" colspan="1" class=".txt" style="width: 300px;">
                            标题
                        </th>

                        <th rowspan="1" colspan="1"  >
                            状态
                        </th>
                        
                        <th rowspan="1" colspan="1"  >
                            点击数
                        </th>
                     
                        <th rowspan="1" colspan="1"  >
                            排序值
                        </th>

                        <th rowspan="1" colspan="1"  >
                            添加时间
                        </th>
                        <th rowspan="1" colspan="1"  >
                            更新时间
                        </th>

                        <th rowspan="1" colspan="1" style="width: 120px;" aria-label="CSS grade: activate to sort column ascending">
                           操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">

                    @foreach($data as $k => $v)

                    <tr class="@if($k % 2 == 1)  odd   @else even  @endif">
                        <td class="">
                            {{$v->id}}
                        </td>
                        <td class=" ">
                            {{$v->type}}
                        </td>
                        <td class=" ">
                            {{$v->keywords}}
                        </td>
                        <td class=" ">
                            {{$v->title}}
                        </td>           
                        <td class=" ">
                            {{$v->status}}
                        </td>
                        <td class=" ">
                            {{$v->count}}
                        </td>
                        <td class=" ">
                            {{$v->sort}}
                        </td>
                        <td class=" ">
                            {{$v->created_at}}
                        </td>
                        <td class=" ">
                             {{$v->updated_at}}
                        </td>
                         <td class=" ">
                            <a href="/admin/content/{{$v->id}}/edit" class='btn btn-info'>修改</a>
                            <form action="/admin/content/{{$v->id}}" method='post' style='display:inline'>
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button href="" class='btn btn-warning'>删除</button>
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
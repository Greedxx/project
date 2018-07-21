@extends('layout.admins')

@section('title',$title)

@section('content')

<div class="mws-panel grid_8">

     <style>
        .text{
            border:1px solid #ddd;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            text-align: center;
        }
    </style>

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
                        小标:
                        <input type="text" name='name' value="{{$arr['name']}}" aria-controls="DataTables_Table_1">
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
                    text-align: center;
                }
            </style>
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" class="text" style="width: 58px;" >
                            文章类型
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" class=".txt" style="width: 45px;">
                            小标
                        </th>
                         <th owspan="1" colspan="1" class="txt" style="width:180px;">
                            标题
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"  >
                            状态
                        </th>
                        
                <!--         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"  >
                            点击数
                        </th> -->
                     
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"  >
                            排序值
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"  style="width:67px">
                            添加时间
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"  style="width:67px">

                            更新时间
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                           操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">

                    @foreach($data as $k => $v)

                    <tr class="odd">
                        <td class="text">
                            {{$v->id}}
                        </td>
                        <td class="text">
                            @if($v->type==1) 服务帮助
                            @elseif($v->type==2) 商品推荐
                            @else 其他
                            @endif 
                        </td>
                        <td class="text">
                            {{$v->name}}
                        </td>
                        <td class="text">
                            {{$v->title}}
                        </td>           

                        <td class="text">
                            @if($v->status ==1) 已展现
                            @else  未展现
                            @endif
                        </td>
                       <!--  <td class="text">
                            {{$v->count}}
                        </td> -->
                        <td class="text sort1" >
                            {{$v->sort}}
                        </td>
                        <td  >
                            {{$v->created_at->format('y年m月n日 H时i分s秒')}}
                        </td>
                        <td >
                             {{$v->updated_at->format('y年m月n日 H时i分s秒')}}

                        </td>
                         <td class="text">
                            <a href="/admin/content/{{$v->id}}/edit" class='btn btn-info'>修改</a>
                            <form action="/admin/content/{{$v->id}}" method='post' style='display:inline'>
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button onclick="if(confirm('确定删除?')==false)return false;" class='btn btn-warning'>删除</button>
                            </form>
                            
                        </td>
                    </tr>
                    @endforeach
               
                </tbody>

            </table>


            <div class="dataTables_paginate paging_full_numbers" style="" id="paginate">
                {{ $data->appends($arr)->links() }}
               
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<!-- <script src="/Validate/dist/jquery.validate.min.js"></script>
<script src="/Validate/dist/localization/messages_zh.js"></script> -->
<script type="text/javascript">
    $('.sort1').on("dblclick",function(e){

        va = $(this);

        val = $(this).html().trim();

        $(this).off('dblclick');

        id = $(this).parent().find('td').first().text().trim();

        $(this).empty();

        va.append('<input type="text" id="bb"  width="10px" nValidate="{number:true}"> ');

        $("#bb").focus();

        $("#bb").select();

        $("#bb").blur(function(){
            //获取输入的val2
            val2 =$(this).val().trim();

            //对val2判断
            if(!val2){
                 va.html(val);
             }else{
               
                if(val != val2){

                     $.get('/admin/ajaxtao/csort',{id:id,val:val2},function(data){
                        // console.log(data);
                        if(data == 1){
                            va.html(val2);
                             $('.sort1').bind('dblclick');
                        }else{
                            va.html(val);
                            $('.sort1').bind('dblclick');
                        }               
                     })

                }else{

                    va.html(val);
                    $('.sort1').bind('dblclick');
                    
                }

            }

        })
    })
</script>
@endsection
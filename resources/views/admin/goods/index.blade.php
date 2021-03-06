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
                   <!--  <label>
                        厂商型号:
                        <input type="text" name='type' value="{{$arr['type']}}" aria-controls="DataTables_Table_1">
                    </label> -->
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
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"   style="width:10px">
                            ID
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"  style="width:40px">
                            分类
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width:50px">
                            商品编号
                        </th>

                      <!--   <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width:50px">
                            厂商型号
                        </th> -->

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width:50px">
                            品名
                        </th>


                         <th  class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"  style="width:50px">

                            图片
                        </th>
                       
                    <!--     <th   class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"  style="width:50px">
                            定价
                        </th> -->
                       
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width:50px">
                            库存
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width:50px">
                            销量
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width:50px">
                            状态
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"  style="width:50px">
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

                    <tr class="odd">

                        <td class="  sorting_1">
                            {{$v->id}}
                        </td>

                        <td class=" ">
                            {{$v['cate']['cate_name'] OR "未分类"}}
                        </td>

                        <td class="txt">
                            {{$v->goods_no}}
                        </td>

                      <!--   <td class="txt">
                            {{$v->type}}
                        </td> -->
                        <td class=" txt">
                            {{$v->goods_name}}
                        </td>
                            
                        <td >
                            <center><img src="{{$v['thumb']}}" alt="{{$v['thumb']}}" width="90px"></center>
                        </td>

                       <!--  <td class="txt">
                            {{$v['price']}}
                        </td> -->

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

                            <a href="/admin/goods/{{$v->id}}/edit" class='btn btn-info'>修改</a>

                            <a href="/admin/goodsimg/{{$v->id}}/guan" class='btn btn-info'>组图</a>

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
           

            
            <div class="dataTables_paginate paging_full_numbers" style="" id="paginate">
                
                {{ $data->appends($arr)->links() }}
                
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
@extends('layout.admins')
<meta name="csrf-token" content="{{ csrf_token() }}">
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

            <form action="/admin/admin" method='get'>
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
                        关键字:
                        <input type="text" name='search'  value="{{$arr['search']}}" aria-controls="DataTables_Table_1">
                    </label>

                    <button class='btn btn-info'>搜索</button>
                </div>
            </form>





            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 198px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 266px;" aria-label="Browser: activate to sort column ascending">
                            用户名
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">
                           状态
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">
                           操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">

                    @foreach($res as $k => $v)

                    <tr class="@if($k % 2 == 1)  odd   @else even  @endif ">
                        <td class="">
                            {{$v->aid}}
                        </td>
                        <td class="vname">
                            {{$v->vname}}
                        </td>
                       
                    
                         <td class=" ">
                           @if($v->buff == '1')
                               <div class="btn btn-success kai" aid="{{$v->aid}}" value="0" >开启</div>

                            @else
                                <div class="btn btn-danger kai" aid="{{$v->aid}}" value="1" >禁用</div>
                            @endif
                            <script src="/js/jquery-3.2.1.min.js" ></script>
                               <script type="text/javascript">
                                // alert('$');
                               
                                 $('.kai').click(function(){
                                    tt = $(this);
                                    va =  $(this).attr('value');
                                    aid =  $(this).attr('aid');
                                    console.log(va);
                                    $.post('/admin/ajaxkai',{vname:va,aid:aid},function(data){
                                        console.log(data);
                                        if(data==1){
                                            tt.attr('value',"0");
                                            tt.attr('class',"btn btn-success kai");
                                            tt.html('开启');
                                            alert('开启成功');
                                        }else if(data == 0){
                                            tt.attr('value',"1");
                                            tt.attr('class',"btn btn-danger kai");
                                            tt.html('禁用');
                                            alert('禁用成功');
                                        }
                                    });
                                 });
                               </script>
                            
                        </td>
                         <td class=" ">
                            <a href="/admin/admin/{{$v->aid}}/edit" class='btn btn-info'>修改</a>
                            <form action="/admin/admin/{{$v->aid}}" method='post' style='display:inline'>
                                
                                {{csrf_field()}}

                                {{method_field('DELETE')}}
                                <button href="" class='btn btn-warning'>删除</button>

                            </form>
                        </td>
                    </tr>
                 
                    @endforeach
               
                </tbody>
            </table>

            <div class="dataTables_info" id="DataTables_Table_1_info">
                Showing 1 to 10 of 57 entries
            </div>

            <style>
                .pagination li{
                    float: left;
                    height: 20px;
                    padding: 0 10px;
                    display: block;
                    font-size: 12px;
                    line-height: 20px;
                    text-align: center;
                    cursor: pointer;
                    outline: none;
                    background-color: #444444;


                  
                    text-decoration: none;
                    border-right: 1px solid #232323;
                    border-left: 1px solid #666666;
                    border-right: 1px solid rgba(0, 0, 0, 0.5);
                    border-left: 1px solid rgba(255, 255, 255, 0.15);
                    -webkit-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                    -moz-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                    box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                }

                .pagination li a{
                      color: #fff;
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

                #paginate ul{
                    
                    margin:0px;
                }
            </style>


            <div class="dataTables_paginate paging_full_numbers" id="paginate">

                 {{ $res->appends($arr)->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
<!-- @section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.vname').dblclick(function(){
        //获取用户名
        var tv = $(this).text().trim();
        var inp = $('<input type="text" />');
        $(this).empty();
        //插入input
        $(this).append(inp);
        inp.val(tv);
        inp.focus();
        inp.select();

        var tds = $(this);

        inp.blur(function(){

            var tvs = $(this).val();

            var ids = $(this).parents('tr').find('td').eq(0).text().trim();

            // console.log(ids);

            //发送ajax
            $.post('/admin/ajaxuser',{vname:tvs,ids:ids},function(data){

                // console.log(data);

                if(data == '1'){

                    tds.text(tvs);

                    alert('修改成功');
                } else {

                    tds.text(tv);

                    alert('修改失败');
                }

            })
        })
    })  

</script>
@endsection -->

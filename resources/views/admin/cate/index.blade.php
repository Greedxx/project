    @extends('layout.admins')
    @section('title',$title)
    @section('content')
    <div class="mws-panel grid_8">
        
       <!-- 信息提醒 stat-->
        @if (count($errors) > 0)
            <div class="mws-form-message error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style='font-size:16px;list-style:none'>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
            <span><i class="icon-table"></i> 类别浏览</span>
        </div>

        <div class="mws-panel-body no-padding">
            <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper"  >
                <form action="/admin/cate/" method="get">    

                    <div id="DataTables_Table_1_length" class="dataTables_length">
                        <label>
                            显示
                            <select name="num" size="1" >

                                <option value="10" @if($data['num'] == 10)   selected="selected" @endif>
                                    10
                                </option>
                                <option value="20" @if($data['num'] == 20)   selected="selected" @endif>
                                    20
                                </option>
                                <option value="30" @if($data['num'] == 30)   selected="selected" @endif>
                                    30
                                </option>
                                
                            </select>
                            条数据
                        </label>
                    </div>

                    <div class="dataTables_filter" id="DataTables_Table_0_filter">

                        <label>查询分类: <input type="text"  value="{{$data['cate_name']}}" name="cate_name"></label>

                        <button class="btn btn-primary btn-small" >查询</button>

                         <label><a href="/admin/cate/create" class="btn btn-primary btn-small">添加分类</a></label>
                    </div>
                </form>
                <table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr role="row">
                            <th   style="width: 50px;text-align: center;">分类id</th>
                            <th   style="width: 120px;text-align: center;">分类名称</th>
                            <th   style="width: 120px;text-align: center;">父ID</th>
                            <th   style="width: 120px;text-align: center;">父路径</th>
                            <th   style="width: 260px;text-align: center;">操作</th>
                        </tr>
                    </thead>             
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                        @foreach($cate as $k=>$v)
                        <tr  class="@if($k % 2 == 1)  odd   @else even  @endif">
                            <td style="width: 50px;text-align: center;">{{ $v->cate_id}}</td>
                            <td style="width: 50px;">{{str_repeat('&nbsp;',substr_count($v->path,',')*5)}}|-- {{ $v->cate_name}}</td>
                            <td style="width: 50px;text-align: center;">{{ $v->pid}}</td>
                            <td style="width: 50px;text-align: center;">{{ $v->path}}</td>
                            <td style="width: 50px;text-align: center;">
                                <a href="/admin/cate/{{$v->cate_id}}/create/" class="btn btn-primary btn-small">添加</a>
                                &nbsp;&nbsp;
                                <a href="/admin/cate/{{$v->cate_id}}/edit/" class="btn btn-success btn-small">修改</a>
                                &nbsp;&nbsp;
                                <form action="/admin/cate/{{$v->cate_id}} " style="display: inline" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" id="delete" class="btn btn-danger btn-small delete">删除</button>
                                    {{ method_field('DELETE') }}
                                    
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    <script type="text/javascript">
                            $('.delete').click(function(){
                                if(!confirm('确认要删除数据吗?')){
                                    return false;
                                }
                            })
                    </script>
                </table>
                
                 <div class="dataTables_paginate paging_full_numbers" id="paginate">

                    {{ $cate->appends($data)->links() }}
                   
                </div>
            </div>
        </div>
    </div>
    @endsection
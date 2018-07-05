    @extends('layout.admins')
    @section('title',$title)
    @section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i> 类别浏览</span>
        </div>
        <div class="mws-panel-body no-padding">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><div id="DataTables_Table_0_length" class="dataTables_length"><label>Show <select size="1" name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div class="dataTables_filter" id="DataTables_Table_0_filter">
                <label><button type="button" class="btn btn-primary btn-small">添加分类</button></label>
            </div><table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 206px;">分类名称</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 262px;">分类路径</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 246px;">父ID</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 176px;">父路径</th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 176px;">操作</th>

                    </tr>
                </thead>
                
            <tbody role="alert" aria-live="polite" aria-relevant="all">
                <tr class="odd">
                    <td class=" sorting_1">Gecko</td>
                    <td class=" ">Mozilla 1.1</td>
                    <td class=" ">Win 95+ / OSX.1+</td>
                    <td class=" ">1.1</td>
                    <td class=" ">
                        <button type="button" class="btn btn-primary btn-small">添加</button>
                        &nbsp;&nbsp;
                        <button type="button" class="btn btn-success btn-small">删除</button>
                        &nbsp;&nbsp;
                        <button type="button" class="btn btn-danger btn-small">修改</button>
                    </td>
                </tr>
                <tr class="even">
                    <td class=" sorting_1">Gecko</td>
                    <td class=" ">Mozilla 1.2</td>
                    <td class=" ">Win 95+ / OSX.1+</td>
                    <td class=" ">1.2</td>
                    <td class=" ">
                        <button type="button" class="btn btn-primary btn-small">添加</button>
                        &nbsp;&nbsp;
                        <button type="button" class="btn btn-success btn-small">删除</button>
                        &nbsp;&nbsp;
                        <button type="button" class="btn btn-danger btn-small">修改</button>
                    </td>
                </tr>
            </tbody></table><div class="dataTables_info" id="DataTables_Table_0_info">Showing 11 to 20 of 57 entries</div><div class="dataTables_paginate paging_two_button" id="DataTables_Table_0_paginate"><a class="paginate_enabled_previous" tabindex="0" role="button" id="DataTables_Table_0_previous" aria-controls="DataTables_Table_0">Previous</a><a class="paginate_enabled_next" tabindex="0" role="button" id="DataTables_Table_0_next" aria-controls="DataTables_Table_0">Next</a></div></div>
        </div>
    </div>
    @endsection
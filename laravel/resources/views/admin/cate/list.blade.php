<link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="/admin/css/style.css">
<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>

<div class="box-header with-border">
    <h3 class="box-title">分类管理</h3>
</div>
<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">

        <!--工具栏-->
        <div class="pull-left">
            <div class="form-group form-inline">
                <div class="btn-group">
                    <button type="button" class="btn btn-default" title="新建" ><a href="/admin/cateadd" class="fa fa-file-o">新建</a></button>
                    <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                </div>
            </div>
        </div>
        <div class="box-tools pull-right">

        </div>
        <!--工具栏/-->

        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="sorting_asc">分类ID</th>
                <th class="sorting">分类名称</th>
                <th class="sorting">上级分类</th>
                <th class="sorting">添加时间</th>
                <th class="sorting">是否显示</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($info as $k=>$v)
            <tr cate_id="{{$v['cate_id']}}">
                <td>{{$v['cate_id']}}</td>
                <td>
                    {{ str_repeat("|--",$v['level']) }}
                    {{$v['cate_name']}}
                </td>
                <td> 
                    @if($v['p_id']==0)
                            顶级分类
                    @else
                    @foreach($cate as $key=>$value)
                        @if($v['p_id']==$value['cate_id'])
                        
                            {{$value['cate_name']}}
                        
                        @endif
                        @endforeach
                    @endif
                </td>
                <td>{{date('Y-m-d H:i:s',$v['cate_time'])}}</td>
                <td class="cate_show">
                    @if($v['cate_show']==1)
                        显示
                    @elseif($v['cate_show']==2)
                        不显示
                    @endif

                </td>
                <td class="text-center">
                    <button type="button" class="del btn btn-danger">删除</button>
                    <button type="button" class="btn btn-success"><a href="/admin/cateupd/{{$v['cate_id']}}" style="color:white">修改</a></button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <!--数据列表/-->
    </div>
    <!-- 数据表格 /-->
</div>
<script>
    $(document).on('click','.del',function(){
        var cate_id=$(this).parents('tr').attr('cate_id');
        $.ajax({
            url: "{{'/admin/del'}}",
            type: 'post',
            data: {cate_id:cate_id},
            dataType: 'json',
            success: function (res) {
                if(res.code=='200'){
                    alert('删除完毕');
                    window.location.href="{{'/admin/cate'}}"
                }else{
                    alert(res.msg);
                }
            }
        });
    })
//即点即改
    $(document).on('click','.cate_show',function(){
        var cate_id=$(this).parents('tr').attr('cate_id');
        $.ajax({
            url: "{{'/admin/updateshow'}}",
            type: 'post',
            data: {cate_id:cate_id},
            dataType: 'json',
            success: function (res) {
                if(res.code=='200'){
                    window.location.href=""
                }else{
                    alert(res.msg);
                }
            }
        });
    });
</script>


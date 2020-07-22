<link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="/admin/css/style.css">
<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>

<div class="box-header with-border">
    <h3 class="box-title">配送管理</h3>
</div>
<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">

        <!--工具栏-->
        <div class="pull-left">
            <div class="form-group form-inline">
                <div class="btn-group">
                    <button type="button" class="btn btn-default" title="新建" ><a href="/admin/modeadd" class="fa fa-file-o">新建</a></button>
                    <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                </div>
            </div>
        </div>
        <!--工具栏/-->
        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="sorting_asc">ID</th>
                <th class="sorting">配送方式</th>
                <th class="sorting">添加时间</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($res as $k=>$v)
            <tr mode_id="{{$v['id']}}">
                <td>{{$v['id']}}</td>
                <td>
                    {{$v['mode_name']}}
                </td>
                <td>{{date('Y-m-d H:i:s',$v['brand_time'])}}</td>
                <td class="text-center">
                    <button type="button" class="del btn btn-danger">删除</button>
                    <button type="button" class="btn btn-warning"><a href="/admin/modeupd/{{$v['id']}}" style="color:white">修改</a></button>
                </td>
            </tr>
            @endforeach

            <div class="pull-right paginate">
                {{ $res->links() }}
            </div>

            </tbody>
        </table>
        <!--数据列表/-->
    </div>
    <!-- 数据表格 /-->
</div>
<script>
    $(document).on('click','.del',function(){
        var mode_id=$(this).parents('tr').attr('mode_id');
        $.ajax({
            url: "{{'/admin/modedel'}}",
            type: 'post',
            data: {mode_id:mode_id},
            dataType: 'json',
            success: function (res) {
                if(res.code=='200'){
                    alert('删除完毕');
                    window.location.href="{{'/admin/mode'}}"
                }else{
                    alert(res.msg);
                }
            }
        });
    })
</script>


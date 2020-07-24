<link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="/admin/css/style.css">
<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <div class="box-header with-border">
        <h3 class="box-title">权限列表</h3>
    </div>
<div class="pull-left">
        <div class="form-group form-inline">
            <div class="btn-group">
                <a href="/admin/power/create" class="btn btn-default" title="添加">
                    <i class="fa fa-file-o"></i>添加权限
                </a>
                <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
            </div>
        </div>
    </div>
    <div class="box-body">

        <!-- 数据表格 -->
        <div class="table-box">
            <!--数据列表-->
            <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                <tr>
                    <th class="sorting_asc">权限ID</th>
                    <th class="sorting">权限名称</th>
                    <th class="sorting">url地址</th>
                    <th class="sorting">添加时间</th>
                    <th class="text-center">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($res as $k=>$v)
                <tr>
                    <td>{{$v->power_id}}</td>
                    <td>{{$v->power_name}}</td>
                    <td>{{$v->power_url}}</td>
                    <td>{{date("Y-m-d H:i:s",$v->power_time)}}</td>
                    <td class="text-center">
                        <a href="{{url('/admin/power/upd/'.$v->power_id)}}" class="btn bg-olive btn-xs">修改</a>
                        <button type="button" data-id="{{$v->power_id}}" id="del" class="btn btn-danger btn-xs">删除</button>
                    </td> 
                </tr>
                @endforeach
                <tr>
                    <td colspan="6">{{$res->links()}}</td>
                </tr>
                </tbody>
            </table>
            <!--数据列表/-->
        </div>
        <!-- 数据表格 /-->
    </div>
<script>
$(document).on("click","#del",function(){
    var power_id=$(this).data("id");
    $.ajax({
        url:"/admin/power/del",
        data:{"power_id":power_id},
        dataType:"json",
        success:function(res){
            if(res.code==000000){
                alert(res.msg);
                location.href="/admin/power/list";
            }else{
                alert(res.msg);
            }
        }
    })
})
</script>

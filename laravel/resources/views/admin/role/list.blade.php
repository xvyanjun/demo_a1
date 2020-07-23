<link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="/admin/css/style.css">
<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <div class="box-header with-border">
        <h3 class="box-title">角色列表</h3>
    </div>

    <div class="box-body">

        <!-- 数据表格 -->
        <div class="table-box">
            <!--数据列表-->
            <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                <tr>
                    <th class="sorting_asc">角色ID</th>
                    <th class="sorting">角色名称</th>
                    <th class="sorting">添加时间</th>
                    <th class="text-center">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($res as $k=>$v)
                <tr>
                    <td>{{$v->role_id}}</td>
                    <td>{{$v->role_name}}</td>
                    <td>{{date("Y-m-d H:i:s",$v->role_time)}}</td>
                    <td class="text-center">
                        <a href="{{url('/admin/role/upd/'.$v->role_id)}}" class="btn bg-olive btn-xs">修改</a>
                        <button type="button" data-id="{{$v->role_id}}" id="del" class="btn btn-danger btn-xs">删除</button>
                        <a href="{{url('/admin/role/content/'.$v->role_id)}}" class="btn bg-olive btn-xs">赋权限</a>
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
//软删除
$(document).on("click","#del",function(){
    var role_id=$(this).data("id");
    $.ajax({
        url:"/admin/role/del",
        data:{"role_id":role_id},
        dataType:"json",
        success:function(res){
            if(res.code==000000){
                alert(res.msg);
                location.href="/admin/role/list";
            }else{
                alert(res.msg);
            }
        }
    })
})

</script>

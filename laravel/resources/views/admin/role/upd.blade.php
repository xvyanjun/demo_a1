<link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="/admin/css/style.css">
<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- 正文区域 -->
<section class="content">
    <div class="box-body">
        <!--tab页-->
        <div class="nav-tabs-custom">
            <!--tab头-->
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#home" data-toggle="tab">角色添加</a>
                </li>
            </ul>
            <!--tab头/-->
            <!--tab内容-->
            <div class="tab-content">
                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                        <div class="col-md-2 title">角色名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" id="role_name" value="{{$res->role_name}}" placeholder="角色名称" value="">
                        </div>

                    </div>
                </div>
                
            </div>
            <!--tab内容/-->
            <!--表单内容/-->
        </div>

    </div>
    <div class="btn-toolbar list-toolbar">
        <a ng-click="submit()" data-toggle="modal" data-id="{{$res->role_id}}" class="btn btn-danger">提交</a>
    </div>

</section>
<!-- 正文区域 /-->
<script>
$(document).on("click",".btn-danger",function(){
    var role_name=$("#role_name").val();
    var role_id=$(this).data("id");
    var data={};
    data.role_name=role_name;
    data.role_id=role_id;
    $.ajax({
        url:"/admin/role/updAdd",
        data:data,
        dataType:"json",
        success:function(res){
            // alert(res);
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
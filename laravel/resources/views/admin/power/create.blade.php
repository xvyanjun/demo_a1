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
                    <a href="#home" data-toggle="tab">权限添加</a>
                </li>
            </ul>
            <!--tab头/-->
            <!--tab内容-->
            <div class="tab-content">
                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                        <div class="col-md-2 title">权限名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" id="power_name" placeholder="权限名称" value="">
                        </div>

                        <div class="col-md-2 title">url地址</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" id="power_url"  placeholder="url地址" value="">
                        </div>

                    </div>
                </div>
                
            </div>
            <!--tab内容/-->
            <!--表单内容/-->
        </div>

    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" ng-click="save()"><i class="fa fa-save"></i>保存</button>
        <a ng-click="submit()" data-toggle="modal" class="btn btn-danger">提交</a>
    </div>

</section>
<!-- 正文区域 /-->
<script>
$(document).on("click",".btn-danger",function(){
    var power_name=$("#power_name").val();
    var power_url=$("#power_url").val();
    var data={};
    data.power_name=power_name;
    data.power_url=power_url;
    $.ajax({
        url:"/admin/power/add",
        data:data,
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
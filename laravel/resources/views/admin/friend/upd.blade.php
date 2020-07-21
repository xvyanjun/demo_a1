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
                    <a href="#home" data-toggle="tab">友情修改</a>
                </li>
            </ul>
            <!--tab头/-->
            <!--tab内容-->
            <div class="tab-content">
                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                        <div class="col-md-2 title">盟友名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" id="f_name" placeholder="盟友名称" value="{{$res->f_name}}">
                        </div>

                        <div class="col-md-2 title">盟友url</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" id="f_url" placeholder="盟友url" value="{{$res->f_url}}">
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
        <a ng-click="submit()" data-toggle="modal" data-id="{{$res->f_id}}" class="btn btn-danger">提交</a>
    </div>

</section>
<!-- 正文区域 /-->
<script>
$(document).on("click",".btn-danger",function(){
    var f_id=$(this).data("id");
    var f_name=$("#f_name").val();
    var f_url=$("#f_url").val();
    var data={};
    data.f_url=f_url;
    data.f_name=f_name;
    data.f_id=f_id;
    $.ajax({
        url:"/admin/friend/updAdd",
        data:data,
        dataType:"json",
        success:function(res){
            // alert(res);
            if(res.code==000000){
                alert(res.msg);
                location.href="/admin/friend/list";
            }else{
                alert(res.msg);
            }
        }
    })
})
</script>
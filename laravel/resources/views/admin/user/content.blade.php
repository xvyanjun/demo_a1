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
                    <a href="#home" data-toggle="tab">赋予角色</a>
                </li>
            </ul>
            <!--tab头/-->
            <!--tab内容-->
            <div class="tab-content">
                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                        <div>赋予角色</div>
                        <div class="col-md-10 data">
                            <input type="checkbox" name="role_id" id="role_id" value="1">组长
                            <input type="checkbox" name="role_id" id="role_id" value="2">总监
                            <input type="checkbox" name="role_id" id="role_id" value="3">经理
                            <input type="checkbox" name="role_id" id="role_id" value="4">员工
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
        <a ng-click="submit()" data-toggle="modal" id="tj" data-id="{{$res->admin_id}}" class="btn btn-danger">提交</a>
    </div>

</section>
<!-- 正文区域 /-->
<script>
	$(document).on("click","#tj",function(){
		var admin_id=$(this).data("id");
        var role_id=[];
		$("input[name='role_id']:checked").each(function(i){
            role_id[i]=$(this).val();
        });
        // console.log(p_id);exit;
        
		var data={};
		data.role_id=role_id;
		data.admin_id=admin_id;
		$.ajax({
			url:"/admin/user/contentAdd",
			data:data,
			dataType:"json",
			success:function(res){
                // alert(res);
				if(res.code==000000){
                    alert(res.msg);
					location.href="/admin/user/list";
				}else{
                    alert(res.msg);
                }
			}
		})

	})
</script>
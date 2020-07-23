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
                    <a href="#home" data-toggle="tab">赋予权限</a>
                </li>
            </ul>
            <!--tab头/-->
            <!--tab内容-->
            <div class="tab-content">
                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        <div>
                            <h4 style="color: red;"><input type="checkbox" name="power_id" id="ding_id" class="ding_id" value="999999999">所有权限</h4>
                            <br>
                            @foreach($power as $k=>$v)
                                <span style="display:inline-block">
                                    <div class="form-group form-check" style="margin:0 10px;">
                                        <input type="checkbox" class="form-check-input power_id" id="exampleCheck1" value="{{$v['power_id']}}">
                                        <label class="form-check-label" for="exampleCheck1">{{$v['power_name']}}</label>
                                    </div>
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
                
            </div>
            <!--tab内容/-->
            <!--表单内容/-->
        </div>

    </div>
    <div class="btn-toolbar list-toolbar">
        <a ng-click="submit()" data-toggle="modal" id="tj" data-id="{{$res->role_id}}" class="btn btn-danger">提交</a>
    </div>

</section>
<!-- 正文区域 /-->
<script>
    $(document).ready(function(){
        var i = 0;
        $("span").each(function()
        {
            i++;
            if (i%4==0)
            {
                $(this).after("<br/>");
            }
        });
    });

    $(document).on("click","input[type='checkbox'].power_id",function(){
            $("input[type='checkbox']#ding_id").prop('checked',false);
    });
    $(document).on("click","input[type='checkbox']#ding_id",function(){
            $('input[type="checkbox"].power_id').prop('checked',false);
    });

	$(document).on("click","#tj",function(){
		var role_id=$(this).data("id");
        var power_id=[];
		$("input[name='power_id']:checked").each(function(i){
            power_id[i]=$(this).val();
        });
        // console.log(p_id);exit;
        
		var data={};
		data.role_id=role_id;
		data.power_id=power_id;
		$.ajax({
			url:"/admin/role/contentAdd",
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
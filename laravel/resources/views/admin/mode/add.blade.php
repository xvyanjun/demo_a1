<link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="/admin/css/style.css">
<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/admin/plugins/jQuery/jquery.uploadify.js"></script>
<link rel="stylesheet" href="/admin/plugins/jQuery/uploadify.css">
<style>
    .show img {
        width:  200px;
        height: 200px;
    }
    .show video {
        width:  240px;
        height: 150px;
    }
</style>
<!-- 正文区域 -->
<section class="content">

    <div class="box-body">

        <!--tab页-->
        <div class="nav-tabs-custom">

            <!--tab头-->
            <ul class="nav nav-tabs">

                <li class="active">
                    <a href="#home" data-toggle="tab">品牌信息</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">
                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                        <div class="col-md-2 title">配送方式</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" name="mode_name" id="mode_name"  ng-model="entity.name"  placeholder="配送方式" value="">
                        </div>

                    </div>
                </div>

            </div>
            <!--tab内容/-->
            <!--表单内容/-->
        </div>
    </div>
    <div class="btn-toolbar list-toolbar">
        <button type="button" id="add" class="btn btn-success">提交</button>
    </div>

</section>
<!-- 正文区域 /-->
<script>
    $(document).on('click','#add',function(){
        var mode_name=$("#mode_name").val();
        if(mode_name==''){
            alert('未填写配送方式');
            return false;
        }
        $.ajax({
            url: "{{'/admin/modeadds'}}",
            type: 'post',
            data: {mode_name:mode_name,},
            dataType: 'json',
            success: function (res) {
                if(res.code=='200'){
                    window.location.href="{{'/admin/mode'}}"
                }else{
                    alert(res.msg);
                }
            }
        });
    })
</script>


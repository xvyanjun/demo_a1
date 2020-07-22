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
                    <a href="#home" data-toggle="tab">sku属性值添加</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                        <div class="col-md-2 title">属性值名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  id='val_name' ng-model="entity.name"  placeholder="属性值名称" value="">

                        </div>
                        <span id='val_name_t'></span>
                    </div>
                </div>
                
            </div>
            <!--tab内容/-->
            <!--表单内容/-->

        </div>

    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" ng-click="save()" id='tj'><i class="fa fa-save"></i>添加属性值</button>
    </div>
    <span id='th_t'></span>
</section>
<script>
    $(function(){
      $(document).on('click','#tj',function(){
        var val_name=$("#val_name").val();
        var zz=/^[a-z A-Z 0-9 \w \u4e00-\u9fa5]{1,}$/;
        var f1=false;
        if(!zz.test(val_name)){
            $("#val_name_t").html('<find>属性值中文数字字母下划线至少一位|</find>');
            f1=false;
        }else{
            $("#val_name_t").html('');
            f1=true;
        }
        if(f1==true){
            $.ajax({
              url:'/sku_val/sku_val_tje',
              type:'post',
              dataType:'json',
              data:{'val_name':val_name},
              success:function(rc){
                if(rc.a1==0){
                    location.href='/sku_val/sku_val_zse';
                }
                console.log(rc.a2);
              }
            });
        }
        console.log(val_name);
      });
    });
</script>
<!-- 正文区域 /-->

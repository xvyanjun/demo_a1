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
                    <a href="#home" data-toggle="tab">sku属性添加</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                        <div class="col-md-2 title">属性名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  id='attr_name' ng-model="entity.name"  placeholder="属性名称" value="">

                        </div>
                        <span id='attr_name_t'></span>
                    </div>
                </div>
                
            </div>
            <!--tab内容/-->
            <!--表单内容/-->

        </div>

    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" ng-click="save()" id='tj'><i class="fa fa-save"></i>添加属性</button>
    </div>
    <span id='th_t'></span>
</section>
<script>
    $(function(){
      $(document).on('click','#tj',function(){
        var attr_name=$("#attr_name").val();
        var zz=/^[a-z A-Z 0-9 \w \u4e00-\u9fa5]{1,}$/;
        var f1=false;
        if(!zz.test(attr_name)){
            $("#attr_name_t").html('<find>属性名中文数字字母下划线至少一位|</find>');
            f1=false;
        }else{
            $("#attr_name_t").html('');
            f1=true;
        }
        if(f1==true){
            $.ajax({
              url:'/sku_name/sku_name_tje',
              type:'post',
              dataType:'json',
              data:{'attr_name':attr_name},
              success:function(rc){
                if(rc.a1==0){
                    location.href='/sku_name/sku_name_zse';
                }
                console.log(rc.a2);
              }
            });
        }
        console.log(attr_name);
      });
    });
</script>
<!-- 正文区域 /-->

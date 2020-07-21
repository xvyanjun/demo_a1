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
                    <a href="#home" data-toggle="tab">导航修改</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        <input type="hidden" id='nav_id' value="{{$xxi['nav_id']}}">
                        <div class="col-md-2 title">导航名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  id='nav_name' ng-model="entity.name"  placeholder="导航名称" value="{{$xxi['nav_name']}}">

                        </div>
                        <span id='nav_name_t'></span>
                        <div class="col-md-2 title">url</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.licenseNumber" id='nav_url'  placeholder="跳转地址" value="{{$xxi['nav_url']}}">
                        </div>
                        <span id='nav_url_t'></span>
                        <div class="col-md-2 title">是否显示</div>
                        <div class="col-md-10 data">
                           <input type="radio" name='nav_show' {{$xxi['nav_show']=='1'?'checked':''}} value='1'>显示
                           <input type="radio" name='nav_show' {{$xxi['nav_show']=='2'?'checked':''}} value='2'>隐藏
                        </div>
                    </div>
                </div>
                
            </div>
            <!--tab内容/-->
            <!--表单内容/-->

        </div>

    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" ng-click="save()" id='xg'><i class="fa fa-save"></i>确认修改</button>
    </div>

</section>
<script>
    $(function(){
//-----------------------------------------------------------------
      $(document).on('click','#xg',function(){
        var nav_name=$("#nav_name").val();
        var nav_url=$("#nav_url").val();
        var nav_show=$("[name='nav_show']:checked").val();
        var nav_id=$("#nav_id").val();
        var zz=/^[a-z A-Z 0-9 \u4e00-\u9fa5]{1,}$/;
        var f1=false;
        if(!zz.test(nav_name)){
            $("#nav_name_t").html('<find>名称中文数字字母下划线至少一位|</find>');
            f1=false;
        }else{
            $("#nav_name_t").html('');
            f1=true;
        }
        var f2=false;
        if(nav_url==''){
            $("#nav_url_t").html('<find>url不能为空|</find>');
            f2=false;
        }else{
            $("#nav_url_t").html('');
            f2=true;
        }
        if(f1==true&&f2==true){
            $.ajax({
              url:'nav_xge',
              type:'post',
              dataType:'json',
              data:{'nav_name':nav_name,'nav_url':nav_url,'nav_show':nav_show,'nav_id':nav_id},
              success:function(cy){
                if(cy.a1==0){
                    location.href='/nav/nav_zse';
                }
                console.log(cy.a2);
              }
            });
        }
        console.log(nav_name,nav_url,nav_show);
      });
//-----------------------------------------------------------------

//-----------------------------------------------------------------

//-----------------------------------------------------------------

//-----------------------------------------------------------------

//-----------------------------------------------------------------
    });
</script>
<!-- 正文区域 /-->

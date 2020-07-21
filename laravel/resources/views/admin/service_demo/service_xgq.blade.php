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
                    <a href="#home" data-toggle="tab">咨讯修改</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">
                <input type="hidden" id='service_id' value="{{$xxi['service_id']}}">
                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                        <div class="col-md-2 title">标题</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  id='service_title' ng-model="entity.name"  placeholder="标题" value="{{$xxi['service_title']}}">

                        </div>
                        <span id='service_title_t'></span>
                        <div class="col-md-2 title">副标题</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.licenseNumber" id='service_titles'  placeholder="副标题" value="{{$xxi['service_titles']}}">
                        </div>
                        <span id='service_titles_t'></span>
                        <div class="col-md-2 title">内容</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.licenseNumber" id='service_text'  placeholder="内容" value="{{$xxi['service_text']}}">
                        </div>
                        <span id='service_text_t'></span>
                        <div class="col-md-2 title">权重</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.licenseNumber" id='service_sort'  placeholder="权重" value="{{$xxi['service_sort']}}">
                        </div>
                        <span id='service_sort_t'></span>
                        <div class="col-md-2 title">是否显示</div>
                        <div class="col-md-10 data">
                           <input type="radio" name='service_show' {{$xxi['service_show']=='1'?'checked':''}} value='1'>显示
                           <input type="radio" name='service_show' {{$xxi['service_show']=='2'?'checked':''}} value='2'>隐藏
                        </div>
                    </div>
                </div>
                
            </div>
            <!--tab内容/-->
            <!--表单内容/-->

        </div>

    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" ng-click="save()" id='xg'><i class="fa fa-save"></i>修改咨讯文章</button>
    </div>
    <span id='th_t'></span>
</section>
<script>
    $(function(){
      $(document).on('click','#xg',function(){
        var service_title=$("#service_title").val();
        var service_titles=$("#service_titles").val();
        var service_text=$("#service_text").val();
        var service_sort=$("#service_sort").val();
        var service_show=$("[name='service_show']:checked").val();
        var service_id=$("#service_id").val();
        var zz=/^[a-z A-Z 0-9 \w \u4e00-\u9fa5]{1,}$/;
        var f1=false;
        if(!zz.test(service_title)){
            $("#service_title_t").html('<find>标题中文数字字母下划线至少一位|</find>');
            f1=false;
        }else{
            $("#service_title_t").html('');
            f1=true;
        }
        var f2=false;
        if(!zz.test(service_titles)){
            $("#service_titles_t").html('<find>副标题中文数字字母下划线至少一位|</find>');
            f2=false;
        }else{
            $("#service_titles_t").html('');
            f2=true;
        }
        var f3=false;
        if(service_text==''){
            $("#service_text_t").html('<find>内容中文数字字母下划线至少一位|</find>');
            f3=false;
        }else{
            $("#service_text_t").html('');
            f3=true;
        }
        var f4=false;
        var zz2=/^\d{1,}$/;
        if(!zz2.test(service_sort)||service_sort<=0){
            $("#service_sort_t").html('<find>权重最小为一|</find>');
            f4=false;
        }else{
            $("#service_sort_t").html('');
            f4=true;
        }
        if(f1==true&&f2==true&&f3==true&&f4==true){
            $.ajax({
              url:'service_xge',
              type:'post',
              dataType:'json',
              data:{'service_title':service_title,'service_titles':service_titles,'service_text':service_text,'service_sort':service_sort,'service_show':service_show,'service_id':service_id},
              success:function(rc){
                if(rc.a1==0){
                    location.href='/service/service_zse';
                }
                console.log(rc.a2);
              }
            });
        }
        console.log(service_title,service_titles,service_text,service_sort,service_show,service_id);
      });
    });
</script>
<!-- 正文区域 /-->

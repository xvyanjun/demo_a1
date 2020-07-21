<link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="/admin/css/style.css">

<link rel="stylesheet" href="/js/uploadify/uploadify.css">

<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>

<script src="/js/uploadify/jquery.js"></script>
<script src="/js/uploadify/jquery.uploadify.js"></script>


<script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- 正文区域 -->
<section class="content">
<form action="/slide/slide_xge" method="post" enctype="multipart/form-data" id='fm'>
  <div>
    <div class="box-body">
        <!--tab页-->
        <div class="nav-tabs-custom">
            <input type="hidden" name="slide_id" value="{{$xxi['slide_id']}}">
            <input type="hidden" name="slide_img_y" value="{{$xxi['slide_img']}}">
            <!--tab头-->
            <ul class="nav nav-tabs">

                <li class="active">
                    <a href="#home" data-toggle="tab">轮播图修改</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        
                        <div class="col-md-2 title">图片跳转url</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  id='slide_url' name='slide_url' ng-model="entity.name"  placeholder="url" value="{{$xxi['slide_url']}}">

                        </div>
                        <span id='slide_url_t'></span>
                        <div class="col-md-2 title">图片</div>
                        <div class="col-md-10 data">
                            <img src="{{$xxi['slide_img']}}" width="50" height="50">
                        </div>
                        <div class="col-md-2 title">选择图片</div>
                        <div class="col-md-10 data">
                            <input type="file" name='slide_img' id='slide_img'> 
                        </div>
                        <span id='slide_img_t'></span>
                        <div class="col-md-2 title">权重</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.licenseNumber" id='slide_weight' name='slide_weight'  placeholder="权重" value="{{$xxi['slide_weight']}}">
                        </div>
                        <span id='slide_weight_t'></span>
                        <div class="col-md-2 title">是否显示</div>
                        <div class="col-md-10 data">
                            <input type="radio" name='slide_show' {{$xxi['slide_show']=='1'?'checked':''}} value='1'>显示
                           <input type="radio" name='slide_show' {{$xxi['slide_show']=='2'?'checked':''}} value='2'>隐藏
                        </div>
                           
                        </div>
                    </div>
                </div>
                
            </div>
            <!--tab内容/-->
            <!--表单内容/-->

        </div>

    </div>
    <div class="btn-toolbar list-toolbar">
        <input type="submit" class="btn btn-primary" ng-click="save()" id='tj' value='修改轮播图'>
        <!-- <button class="btn btn-primary" ng-click="save()" id='tj'><i class="fa fa-save"></i>添加轮播图</button> -->
    </div>
    <span id='th_t'></span>
</form>
</section>
<script>
    $(function(){
//-----------------------------------------------------------------
      $(document).on('submit','#fm',function(){
        var slide_url=$("#slide_url").val();
        // var slide_img=$("#slide_img").val();
        var slide_weight=$("#slide_weight").val();
        var slide_show=$("[name='slide_show']:checked").val();
        var f1=false;
        if(slide_url==''){
            $("#slide_url_t").html('<find>url不能为空|</find>');
            f1=false;
        }else{
            $("#slide_url_t").html('');
            f1=true;
        }
        // var f2=false;
        // if(slide_img==''){
        //     $("#slide_img_t").html('<find>请选择图片|</find>');
        //     f2=false;
        // }else{
        //     $("#slide_img_t").html('');
        //     f2=true;
        // }
        var f3=false;
        var zz2=/^\d{1,}$/;
        if(!zz2.test(slide_weight)||slide_weight<=0){
            $("#Silde_weight_t").html('<find>权重最小为一|</find>');
            f3=false;
        }else{
            $("#slide_weight_t").html('');
            f3=true;
        }
        if(f1==true&&f3==true){
          return true;
        }else{
          return false; 
        }
        console.log(slide_url,slide_img,slide_sort,slide_show);
        
      });
//-----------------------------------------------------------------

//-----------------------------------------------------------------

//-----------------------------------------------------------------

//-----------------------------------------------------------------

//-----------------------------------------------------------------
    });
</script>
<!-- 正文区域 /-->

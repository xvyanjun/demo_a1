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
<form action="/admin/brandupdate" method="post" enctype="multipart/form-data" id='fm'>
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

                        <input type="hidden" name="brand_id" value="{{$brand['brand_id']}}">

                        <div class="col-md-2 title">品牌名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" name="brand_name" id="brand_name"  ng-model="entity.name"  placeholder="品牌名称" value="{{$brand['brand_name']}}">
                        </div>

                        <div class="col-md-2 title">品牌图片</div>
                        <div class="col-md-10 data">
                            <input type="file" class="form-control" name="brand_img" id="brand_image"  ng-model="entity.name">
                        </div>

                        <div class="col-md-2 title">现在logo图</div>
                        <div class="col-md-10 data">
                            <img src="../../{{$brand['brand_img']}}" width="80" height="40">
                        </div>

                        <div class="col-md-2 title">url</div>
                        <div class="col-md-10 data">
                            <input type="text" id="url" ng-model="entity.name" name="url" class="form-control" placeholder="品牌地址" value="{{$brand['brand_url']}}">
                        </div>
                    </div>
                </div>

            </div>
            <!--tab内容/-->
            <!--表单内容/-->
        </div>
    </div>
    <div class="btn-toolbar list-toolbar">
        <button type="submit" id="add" class="btn btn-success">修改</button>
    </div>

</section>
</form>
<!-- 正文区域 /-->

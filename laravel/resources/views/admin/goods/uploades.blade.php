<link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="/admin/css/style.css">
<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/admin/plugins/jQuery/jquery.uploadify.js"></script>
<link rel="stylesheet" href="/admin/plugins/jQuery/uploadify.css">
<form action="/admin/goods/uploadesadd" method="post" enctype="multipart/form-data" id='fm'>
    <!-- 正文区域 -->
    <section class="content">

        <div class="box-body">

            <!--tab页-->
            <div class="nav-tabs-custom">

                <!--tab头-->
                <ul class="nav nav-tabs">

                    <li class="active">
                        <a href="#home" data-toggle="tab">商品相册</a>
                    </li>
                </ul>
                <!--tab头/-->

                <!--tab内容-->
                <div class="tab-content">
                    <!--表单内容-->
                    <div class="tab-pane active" id="home">
                        <div class="row data-type">
                            <div class="col-md-2 title">商品相册</div>
                            <div class="col-md-10 data">
                                <input type="file" class="form-control" name="goods_imgs[]" multiple="multiple"   ng-model="entity.name">
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane active" id="home">
                        <div class="row data-type">
                            <div class="col-md-2 title">选择商品</div>
                            <div class="col-md-10 data">
                                <select class="form-control" name="goods_id" ng-model="entity.name">
                                    @foreach($goods as $k=>$v)
                                        <option value="{{$v['goods_id']}}">{{$v['goods_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <!--tab内容/-->
                <!--表单内容/-->
            </div>
        </div>
        <div class="btn-toolbar list-toolbar">
            <button type="submit" id="add" class="btn btn-success">提交</button>
        </div>

    </section>
</form>
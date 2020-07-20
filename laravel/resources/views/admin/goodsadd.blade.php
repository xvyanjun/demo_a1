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
                    <a href="#home" data-toggle="tab">商品信息</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                        <div class="col-md-2 title">商品名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  ng-model="entity.name"  placeholder="商品名称" value="">
                        </div>

                        <div class="col-md-2 title">营业执照号</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.licenseNumber"   placeholder="营业执照号" value="">
                        </div>

                        <div class="col-md-2 title">税务登记证号</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.taxNumber"   placeholder="税务登记证号" value="">
                        </div>

                        <div class="col-md-2 title">组织机构代码证</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.orgNumber"  placeholder="组织机构代码证" value="">
                        </div>

                        <div class="col-md-2 title">法定代表人</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.legalPerson"   placeholder="法定代表人" value="">
                        </div>

                        <div class="col-md-2 title">法定代表人身份证号</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.legalPersonCardId"   placeholder="法定代表人身份证号" value="">
                        </div>

                        <div class="col-md-2 title">开户行名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.bankName" placeholder="开户行名称" value="">
                        </div>

                        <div class="col-md-2 title">开户行支行</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" ng-model="entity.bankNameBranch"  placeholder="开户行支行" value="">
                        </div>

                        <div class="col-md-2 title">银行账号</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  ng-model="entity.bankCode"  placeholder="银行账号" value="">
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
        <a ng-click="submit()" data-toggle="modal" class="btn btn-danger">提交</a>
    </div>

</section>
<!-- 正文区域 /-->

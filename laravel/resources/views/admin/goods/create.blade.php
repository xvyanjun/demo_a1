<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商品编辑</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
  
    <link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/admin/css/style.css">
	<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- 富文本编辑器 -->
	<link rel="stylesheet" href="/admin/plugins/kindeditor/themes/default/default.css" />
	<script charset="utf-8" src="/admin/plugins/kindeditor/kindeditor-min.js"></script>
	<script charset="utf-8" src="/admin/plugins/kindeditor/lang/zh_CN.js"></script>
</head>
<body class="hold-transition skin-red sidebar-mini" >

            <!-- 正文区域 -->
            <section class="content">
                <div class="box-body">
                    <!--tab页-->
                    <div class="nav-tabs-custom">
                        <!--tab头-->
                        <ul class="nav nav-tabs">                       		
                            <li class="active">
                                <a href="#home" data-toggle="tab">商品基本信息</a>                                                        
							</li>                          
                        </ul>
                        <!--tab头/-->
						<form class="sui-form form-horizontal" action="{{url('/admin/goods/add')}}" method="post" enctype="multipart/form-data">
                		@csrf
                        <!--tab内容-->
                        <div class="tab-content">
                            <!--表单内容-->
                            <div class="tab-pane active" id="home">
                                <div class="row data-type">
								   <div class="col-md-2 title">商品名称</div>
		                           <div class="col-md-10 data">
		                               <input type="text" class="form-control" name="goods_name"  placeholder="商品名称" value="">
		                           </div>                                  
								   <div class="col-md-2 title">商品分类</div>
								   <div class="col-md-10 data">
		                              <select class="form-control" name="cate_id" id="cate_id">
										  <option value="">--请选择--</option>
										  @foreach($cate as $k=>$v)
										  <option value="{{$v->cate_id}}" class="cate_id">{{ str_repeat("|--",$v['level']) }}{{$v->cate_name}}</option>
										  @endforeach
									  </select>
		                            </div>	                              
		                          	  
		                           
		                           <div class="col-md-2 title">品牌</div>
		                           <div class="col-md-10 data" id="brand_list">
		                              <select class="form-control" name="brand_id">
									  <option value="">--请先选择分类--</option>
										  {{--@foreach($brand as $k=>$v)--}}
										  {{--<option value="{{$v->brand_id}}">{{$v->brand_name}}</option>--}}
										  {{--@endforeach--}}
									  </select>
		                           </div>
		
								   <div class="col-md-2 title">库存</div>
		                           <div class="col-md-10 data">
		                               <input type="text" class="form-control" name="goods_stock"  placeholder="库存" value="">
								   </div>

								   <div class="col-md-2 title">图片</div>
		                           <div class="col-md-10 data">
		                               <input type="file" class="form-control" name="goods_img"  placeholder="库存" value="">
		                           </div>
		                           
		                           <div class="col-md-2 title">价格</div>
		                           <div class="col-md-10 data">
		                           	   <div class="input-group">
			                          	   <span class="input-group-addon">¥</span>
			                               <input type="text" class="form-control" name="goods_price"  placeholder="价格" value="">
		                           	   </div>
		                           </div>
		                           
		                           <div class="col-md-2 title editer">商品介绍</div>
                                   <div class="col-md-10 data editer">
                                       <textarea name="content"  style="width:800px;height:400px;visibility:hidden;" ></textarea>
                                   </div>
								   
								   <div class="col-md-2 title">是否显示</div>
		                           <div class="col-md-10 data">
									   <input type="radio" value="1" name="goods_show" checked>是
									   <input type="radio" value="2" name="goods_show">否
		                           </div>
								   
		                           <div class="col-md-2 title rowHeight2x">包装列表</div>
		                           <div class="col-md-10 data rowHeight2x">
		                               
		                           	<textarea rows="4"  class="form-control" name="goods_pack" placeholder="包装列表"></textarea>
		                           </div>
		                           
		                           <div class="col-md-2 title rowHeight2x">售后服务</div>
		                           <div class="col-md-10 data rowHeight2x">
		                               <textarea rows="4"  class="form-control" name="goods_service" placeholder="售后服务"></textarea>
		                           </div>                        
                                  
                                    
                                </div>
                            </div>
							
                        </div>
                        <!--tab内容/-->
						<!--表单内容/-->
                    </div>  	
                   </div>
                  <div class="btn-toolbar list-toolbar">
					  <input type="submit" class="btn btn-primary" ng-click="setEditorValue();save()" value="保持">
				      <!-- <a href="submit" class="btn btn-primary" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>保存</a> -->
				      <button class="btn btn-default" ng-click="goListPage()">返回列表</button>
				  </div>
				  </form>
			</section>
				 

        <!-- 正文区域 /-->
<script type="text/javascript">
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="content"]', {
			allowFileManager : true
		});
	});

	$(document).on("change","#cate_id",function(){
        var cate_id=$(".cate_id:selected").val();
//        console.log(cate_id);
        $.ajax({
            url: "{{'/admin/goods/brand_list'}}",
            type: 'post',
            data: {cate_id:cate_id},
            dataType: 'html',
            success: function (res) {
                $("#brand_list").html(res);
            }
        });
    });
</script>
</body>
</html>

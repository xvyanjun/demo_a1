<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商品属性添加</title>
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
 <!--tab内容-->
 <div class="tab-content">

<!--表单内容-->
<div class="tab-pane active" id="home">
    <div class="row data-type">

        <div class="col-md-2 title">商品名称</div>
        <div class="col-md-10 data">
            <select name="" id="goods_id" class="form-control">
                <option value="">--请选择--</option>
                @foreach($goods as $K=>$v)
                    <option value="{{$v->goods_id}}">{{$v->goods_name}}</option>
                @endforeach
            </select>
        </div>
        <div id="dd" num={{sizeof($shop_name)}}></div>
        @foreach($shop_name as $k=>$v)
        <input type="hidden" class="col-md-10 data" id="attr_id_{{$k+1}}" attr_id="{{$v->attr_id}}" value="{{$v->attr_name}}">
        <div class="col-md-2 title">{{$v->attr_name}}</div>
        <div class="col-md-10 data">
            <select name="sku" id="val_id_{{$k+1}}">
            <option value="">--请选择--</option>
            @foreach($v['a'] as $Kk=>$vv)
                <option value="{{$vv->val_id}}" class="val_id">{{$vv->val_name}}</option>
            @endforeach
            </select>
        </div>
        @endforeach

        <div class="col-md-2 title">商品库存</div>
		    <div class="col-md-10 data">
		        <input type="text" class="form-control" id="goods_stroe"  placeholder="库存" value="">
        </div>
        <div class="col-md-2 title">价格</div>
		    <div class="col-md-10 data">
		        <input type="text" class="form-control" id="price"  placeholder="价格" value="">
		</div>
    </div>
    
</div>

</div>
<!--tab内容/-->

 <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" ng-click="save()" id='tj'><i class="fa fa-save"></i>添加属性</button>
</div>
</body>
</html>
<script>
    $(document).on("click","#tj",function(){
       var num=$("#dd").attr("num");
       var sku="";
       for(var i=1;i<=num;i++){
           var attr_id=$("#attr_id_"+i).attr("attr_id");
           var val_id=$("#val_id_"+i+">option:checked").val();
           if(!val_id==""){
                sku=sku+'['+attr_id+':'+val_id+'],';
           }
       }
       var cd=sku.length;
       sku=sku.substr(0,cd-1);
       //获取商品id
       var goods_id=$("#goods_id").val();
      //获取库存
      var goods_stroe=$("#goods_stroe").val();
      //获取价格
      var price=$("#price").val();
      var data={};
      data.sku=sku;
      data.goods_id=goods_id;
      data.goods_stroe=goods_stroe;
      data.price=price;
      $.ajax({
          url:"/admin/skug/skuAdd",
          data:data,
          dataType:"json",
          success:function(res){
            //   alert(res.msg);
            if(res.code==000000){
                alert(res.msg);
                location.href="/admin/skug/list";
            }else{
                alert(res.msg);
            }
          }
      })
    })
</script>
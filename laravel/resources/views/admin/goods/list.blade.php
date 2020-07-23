<link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="/admin/css/style.css">
<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <div class="box-header with-border">
        <h3 class="box-title">商品列表</h3>
    </div>

    <div class="box-body">

        <!-- 数据表格 -->
        <div class="table-box">
            <!--数据列表-->
            <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                <tr>
                    <th class="sorting_asc">商品ID</th>
                    <th class="sorting">商品名称</th>
                    <th class="sorting">品牌</th>
                    <th class="sorting">分类</th>
                    <th class="sorting">库存</th>
                    <th class="sorting">图片</th>
                    <th class="sorting">价格</th>
                    <th class="sorting">商品介绍</th>
                    <th class="sorting">是否显示</th>
                    <th class="sorting">包装列表</th>
                    <th class="sorting">售后服务</th>
                    <th class="sorting">时间</th>
                    <th class="text-center">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($res as $k=>$v)
                <tr goods_id="{{$v->goods_id}}">
                    <td>{{$v->goods_id}}</td>
                    <td>{{$v->goods_name}}</td>
                    <td>{{$v->brand_name}}</td>
                    <td>{{$v->cate_name}}</td>
                    <td>
                        <span id="stock">{{$v->goods_stock}}</span>
                    </td>
                    <td><img src="/{{$v->goods_img}}" width="80" height="60"></td>

                    <td>
                        <span id="price">{{$v->goods_price}}</span>
                    </td>
                    <td title="{{$v->content}}">{{mb_substr($v->content,0,6)}}</td>
                    <td id="eva_jd" goods_id="{{$v->goods_id}}">{{$v->goods_show?"是":"否"}}</td>
                    <td title="{{$v->goods_pack}}">{{mb_substr($v->goods_pack,0,6)}}</td>
                    <td title="{{$v->goods_service}}">{{mb_substr($v->goods_service,0,6)}}</td>
                    <td>{{date("Y-m-d H:i:s",$v->goods_time)}}</td>
                    <td class="text-center">
                        <a href="{{url('/admin/goods/upd/'.$v->goods_id)}}" class="btn bg-olive btn-xs">修改</a>
                        <button type="button" data-id="{{$v->goods_id}}" id="del" class="btn btn-danger btn-xs">删除</button>
                    </td> 
                </tr>
                @endforeach
                <tr>
                    <td colspan="13">{{$res->links()}}</td>
                </tr>
                </tbody>
            </table>
            <!--数据列表/-->
        </div>
        <!-- 数据表格 /-->
    </div>
<script>
//软删除
$(document).on("click","#del",function(){
    var goods_id=$(this).data("id");
    $.ajax({
        url:"/admin/goods/del",
        data:{"goods_id":goods_id},
        dataType:"json",
        success:function(res){
            if(res.code==000000){
                alert(res.msg);
                location.href="/admin/goods/list";
            }else{
                alert(res.msg);
            }
        }
    })
})

//是否显示的即点即改
$(document).on("click","#eva_jd",function(){
    var _this=$(this);
    var goods_id=_this.attr("goods_id");
    var goods_show=_this.text();
    if(goods_show=="是"){
        _this.text("否");
    }else{
        _this.text("是");
    }
    if(goods_show=="是"){
        goods_show='2';
    }else{
        goods_show='1';
    }
    $.get(
        "/admin/goods/ajaxshow",
        {goods_id:goods_id,goods_show:goods_show},
        function(res){
            if(res.code==00000){
                if(goods_show=="是"){
                    goods_show.text("否");
                }else{
                    goods_show.text("是");
                }
            }
        },"json"
    )
    // console.log(goods_show);
})

//极点技改商品库存
$(document).on("click","#stock",function(){
    var goods_stock=$(this).text();
    $(this).parent().html("<input type='text' class='input_name' value="+goods_stock+">");
})
$(document).on("blur",".input_name",function(){
    var _this=$(this);
    var goods_stock=_this.val();
    //获取id值
    var goods_id=_this.parents("tr").attr("goods_id");
    // console.log(goods_id);
    $.get(
        "/admin/goods/ajaxname",
        {goods_id:goods_id,goods_stock:goods_stock},
        function(res){
            if(res.code==00000){
                _this.parent().html("<span class='span_name'>"+goods_stock+"</span>");
            }
        },"json"
    )
})

//即点技改商品价格
$(document).on("click","#price",function(){
    var goods_price=$(this).text();
    $(this).parent().html("<input type='text' class='input_price' value="+goods_price+">");
})
$(document).on("blur",".input_price",function(){
    var _this=$(this);
    var goods_price=_this.val();
    //获取id值
    var goods_id=_this.parents("tr").attr("goods_id");
    // console.log(goods_id);
    $.get(
        "/admin/goods/ajaxprice",
        {goods_id:goods_id,goods_price:goods_price},
        function(res){
            if(res.code==00000){
                _this.parent().html("<span class='span_name'>"+goods_price+"</span>");
            }
        },"json"
    )
})
</script>

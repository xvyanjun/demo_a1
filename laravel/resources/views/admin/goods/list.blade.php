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
                <tr>
                    <td>{{$v->goods_id}}</td>
                    <td>{{$v->goods_name}}</td>
                    <td>{{$v->brand_name}}</td>
                    <td>{{$v->cate_name}}</td>
                    <td>{{$v->goods_stock}}</td>
                    <td>{{$v->f_url}}</td>
                    <td>{{$v->goods_price}}</td>
                    <td>{{$v->content}}</td>
                    <td>{{$v->goods_show?"是":"否"}}</td>
                    <td>{{$v->goods_pack}}</td>
                    <td>{{$v->goods_service}}</td>
                    <td>{{date("Y-m-d H:i:s",$v->goods_time)}}</td>
                    <td class="text-center">
                        <a href="{{url('/admin/goods/upd/'.$v->goods_id)}}" class="btn bg-olive btn-xs">修改</a>
                        <button type="button" data-id="{{$v->goods_id}}" id="del" class="btn btn-danger btn-xs">删除</button>
                    </td> 
                </tr>
                @endforeach
                <tr>
                    <td colspan="6">{{$res->links()}}</td>
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

</script>

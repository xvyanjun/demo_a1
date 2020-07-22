<link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="/admin/css/style.css">
<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <div class="box-header with-border">
        <h3 class="box-title">商品属性列表</h3>
    </div>

    <div class="box-body">

        <!-- 数据表格 -->
        <div class="table-box">
            <!--数据列表-->
            <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                <tr>
                    <th class="sorting_asc">属性ID</th>
                    <th class="sorting">商品名称</th>
                    <th class="sorting">sku</th>
                    <th class="sorting">商品价格</th>
                    <th class="sorting">商品库存</th>
                    <th class="text-center">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($res as $k=>$v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->goods_name}}</td>
                    <td>{{$v->sku}}</td>
                    <td>{{$v->price}}</td>
                    <td>{{$v->goods_stroe}}</td>
                    <td class="text-center">
                        <a href="{{url('/admin/skug/upd/'.$v->id)}}" class="btn bg-olive btn-xs">修改</a>
                        <button type="button" data-id="{{$v->id}}" id="del" class="btn btn-danger btn-xs">删除</button>
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
    var id=$(this).data("id");
    $.ajax({
        url:"/admin/skug/del",
        data:{"id":id},
        dataType:"json",
        success:function(res){
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

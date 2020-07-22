<link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="/admin/css/style.css">
<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>

<div class="box-header with-border">
    <h3 class="box-title">商品相册管理</h3>
</div>
<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">

        <!--工具栏-->
        <div class="pull-left">
            <div class="form-group form-inline">
                <div class="btn-group">
                    <button type="button" class="btn btn-default" title="新建" ><a href="/admin/goods/uploades" class="fa fa-file-o">新建</a></button>
                    <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                </div>
            </div>
        </div>
        <!--工具栏/-->
        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="sorting_asc">相册ID</th>
                <th class="sorting">相册图片</th>
                <th class="sorting">添加时间</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($info as $k=>$v)
            <tr goods_imgid="{{$v['goods_imgid']}}">
                <td>{{$v['goods_imgid']}}</td>
                <td>
                    @foreach($v['goods_imgs'] as $kk=>$vv)
                        <img src="/{{$vv}}" width="80" height="50">
                    @endforeach
                </td>
                <td>{{date('Y-m-d H:i:s',$v['time'])}}</td>
                <td class="text-center">
                    <button type="button" class="del btn btn-danger">删除</button>
                </td>
            </tr>
            @endforeach

            <div class="pull-right paginate">
                {{$info->links()}}
            </div>

            </tbody>
        </table>
        <!--数据列表/-->
    </div>
    <!-- 数据表格 /-->
</div>
<script>
    $(document).on('click','.del',function(){
        var goods_imgid=$(this).parents('tr').attr('goods_imgid');
        $.ajax({
            url: "{{'/admin/goods/uploadesdel'}}",
            type: 'post',
            data: {goods_imgid:goods_imgid},
            dataType: 'json',
            success: function (res) {
                if(res.code=='200'){
                    alert('删除完毕');
                    window.location.href="{{'/admin/goods/uploadeslist'}}"
                }else{
                    alert(res.msg);
                }
            }
        });
    })
</script>


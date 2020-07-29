<link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="/admin/css/style.css">
<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>

<div class="box-header with-border">
    <h3 class="box-title">品牌管理</h3>
</div>
<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">

        <!--工具栏-->
        <div class="pull-left">
            <div class="form-group form-inline">
                <div class="btn-group">
                    <button type="button" class="btn btn-default" title="新建" ><a href="/admin/brandadd" class="fa fa-file-o">新建</a></button>
                    <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                </div>
            </div>
        </div>
        <div class="box-tools pull-right">
            <div class="has-feedback">
                <form>
                    <input type="text" name="brand_name" placeholder="请输入品牌名称" value="{{$query['brand_name']??''}}">
                    <input type="submit" value="查询">
                </form>
            </div>
        </div>
        <!--工具栏/-->
        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="sorting_asc">品牌ID</th>
                <th class="sorting">品牌名称</th>
                <th class="sorting">品牌logo</th>
                <th class="sorting">品牌url</th>
                <th class="sorting">添加时间</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($res as $k=>$v)
            <tr brand_id="{{$v['brand_id']}}">
                <td>{{$v['brand_id']}}</td>
                <td>
                    {{$v['brand_name']}}
                </td>
                <td>
                    <img src="../{{$v['brand_img']}}" width="80" height="40">
                </td>
                <td>{{$v['brand_url']}}</td>
                <td>{{date('Y-m-d H:i:s',$v['brand_time'])}}</td>
                <td class="text-center">
                    <button type="button" class="del btn btn-danger">删除</button>
                    <button type="button" class="btn btn-warning"><a href="/admin/brandupd/{{$v['brand_id']}}" style="color:white">修改</a></button>
                </td>
            </tr>
            @endforeach

            <div class="pull-right paginate">
                <tr>
                    <td colspan="6" style="text-align:center;">{{$res->appends($query)->links()}}</td>
                </tr>
                {{--{{ $res->links() }}--}}
            </div>

            </tbody>
        </table>
        <!--数据列表/-->
    </div>
    <!-- 数据表格 /-->
</div>
<script>
    $(document).on('click','.del',function(){
        var brand_id=$(this).parents('tr').attr('brand_id');
        $.ajax({
            url: "{{'/admin/branddel'}}",
            type: 'post',
            data: {brand_id:brand_id},
            dataType: 'json',
            success: function (res) {
                if(res.code=='200'){
                    alert('删除完毕');
                    window.location.href="{{'/admin/brand'}}"
                }else{
                    alert(res.msg);
                }
            }
        });
    })
//即点即改
    $(document).on('click','.cate_show',function(){
        var cate_id=$(this).parents('tr').attr('cate_id');
        $.ajax({
            url: "{{'/admin/updateshow'}}",
            type: 'post',
            data: {cate_id:cate_id},
            dataType: 'json',
            success: function (res) {
                if(res.code=='200'){
                    window.location.href=""
                }else{
                    alert(res.msg);
                }
            }
        });
    });
</script>


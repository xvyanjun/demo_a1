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
                    <a href="#home" data-toggle="tab">分类信息</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        <input type="hidden" id="cate_id" value="{{$cate['cate_id']}}">
                        <div class="col-md-2 title">分类名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" id="cate_name"  ng-model="entity.name"  placeholder="分类名称" value="{{$cate['cate_name']}}">
                        </div>

                        <div class="col-md-2 title">上级</div>
                        <div class="col-md-10 data">
                            <select name="" id="" class="form-control" ng-model="entity.licenseNumber">
                                <option value="0" {{$cate['p_id']==0?'selected':''}} class="p_id">--顶级分类--</option>
                                @foreach($info as $k=>$v)
                                <option value="{{$v['cate_id']}}" {{$cate['p_id']==$v['cate_id']?'selected':''}} class="p_id">--{{$v['cate_name']}}--</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="col-md-2 title">是否显示</div>
                        <div class="col-md-10 data">
                            <input type="radio" name="cate_show" class="cate_show" {{$cate['cate_show']==1?'checked':''}} value="1">显示
                            <input type="radio" name="cate_show" class="cate_show" {{$cate['cate_show']==2?'checked':''}} value="2">不显示
                        </div>

                    </div>
                </div>

            </div>
            <!--tab内容/-->
            <!--表单内容/-->
        </div>
    </div>
    <div class="btn-toolbar list-toolbar">
        <button type="button" id="add" class="btn btn-success">修改</button>
    </div>

</section>
<script>
    $(document).on('click','#add',function(){
        var cate_id=$("#cate_id").val();
        var cate_name=$("#cate_name").val();
        if(cate_name==''){
            alert('未填写分类名称');
            return false;
        }
        var p_id=$(".p_id:selected").val();
        var cate_show=$(".cate_show:checked").val();
        if(cate_show==''){
            alert('未选择是否显示');
            return false;
        }
        $.ajax({
            url: "{{'/admin/update'}}",
            type: 'post',
            data: {cate_id:cate_id,cate_name:cate_name,p_id:p_id,cate_show:cate_show},
            dataType: 'json',
            success: function (res) {
                if(res.code=='200'){
                    window.location.href="{{'/admin/cate'}}"
                }else{
                    alert(res.msg);
                }
            }
        });
    })
</script>
<!-- 正文区域 /-->

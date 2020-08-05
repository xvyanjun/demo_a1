@extends('layouts_q.tw_jz')
@section('title','地址管理')
@section('content')
    <link rel="stylesheet" type="text/css" href="/qtai/css/pages-seckillOrder.css" />


<script type="text/javascript" src="/qtai/js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
<!-- <script type="text/javascript" src="/qtai/js/pages/istpicker.data.js"></script> -->
<script type="text/javascript" src="/qtai/js/plugins/citypicker/distpicker.js"></script>
<script type="text/javascript" src="/qtai/js/pages/main.js"></script>

<!--header-->
<div id="account">
    <div class="py-container">
        <div class="yui3-g home">
            <!--左侧列表-->
            <div class="yui3-u-1-6 list">

<link rel="stylesheet" type="text/css" href="/qtai/css/pages-seckillOrder.css" />

                    <div class="person-info">
                        <div class="person-photo"><img src="/qtai/img/_/photo.png" alt=""></div>
                        <div class="person-account">
                            <span class="name">Michelle</span>
                            <span class="safe">账户安全</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="list-items">
                        <dl>
                            <dt><i>·</i> 订单中心</dt>
                            <dd ><a href="/center"  class="" >我的订单</a></dd>
                            <dd><a href="/home_order_pay" class="" >待付款</a></dd>
                            <dd><a href="/home_order_send"  class="" >待发货</a></dd>
                            <dd><a href="home-order-receive.html" class="" >待收货</a></dd>
                        </dl>
                        <dl>
                            <dt><i>·</i> 我的中心</dt>
                            <dd><a href="/shop_user_list/collect" >我的收藏</a></dd>
                            <dd><a href="/shop_user_list/history" >我的足迹</a></dd>
                        </dl>
                        <dl>
                            <dt><i>·</i> 设置</dt>
                            <!-- <dd><a href="/add" >个人信息</a></dd> -->
                            <dd><a href="/add_list" class="list-active">地址管理</a></dd>
                            <dd><a href="/lists">安全管理</a></dd>
                        </dl>
                    </div>
                </div>
            <!--右侧主内容-->
            <div class="yui3-u-5-6">
                <div class="body userAddress">
                    <div class="address-title">
                        <span class="title">地址管理</span>
                        <a data-toggle="modal" data-target=".edit" data-keyboard="false"   class="sui-btn  btn-info add-new">添加新地址</a>
                        <span class="clearfix"></span>
                    </div>
                    <div class="address-detail">
                        <table class="sui-table table-bordered">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>姓名</th>
                                <th>详细地址</th>
                                <th>联系电话</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($res as $k=>$v)
                            <tr>
                                <td>{{$v->address_id}}</td>
                                <td>{{$v->address_name}}</td>
                                <td>{{$v->address_addre}}</td>
                                <td>{{$v->address_tel}}</td>
                                <td>
                                    <a href="{{url('/upd/'.$v->address_id)}}" class="btn bg-olive btn-xs">修改</a>
                                    <button type="button" data-id="{{$v->address_id}}" id="address_del" class="btn btn-danger btn-xs">删除</button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--新增地址弹出层-->
                    <div  tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade edit" style="width:580px;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
                                    <h4 id="myModalLabel" class="modal-title">新增地址</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="" class="sui-form form-horizontal">
                                        <div class="control-group">
                                            <label class="control-label">收货人：</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" id="address_name" name="address_name">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">所在地区：</label>
                                            <div class="controls">
                                                <div data-toggle="distpicker">
                                                    <select class="form-control" id="y_province" name="y_province">
                                                        <option value="">请选择所在省</option>
                                                        @foreach($province as $key => $val)
                                                            <option value="{{$val->id}}">{{$val->name}}</option>
                                                        @endforeach
                                                    </select>

                                                    <select class="form-control" name="y_city"id="y_city"><option value="1">请选择</option></select>
                                                    <select class="form-control" name="y_district" id="y_district" ><option value="1">请选择</option></select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">详细地址：</label>
                                            <div class="controls">
                                                <input type="text" class="input-large" name="address_addre" id="address_addre">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" >联系电话：</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" name="address_tel" id="address_tel">
                                            </div>
                                        </div>

                                    </form>


                                </div>
                                <div class="modal-footer">
                                    <button type="button"  id="add" data-ok="modal" class="sui-btn btn-primary btn-large">提交</button>
                                    <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
    <script>

        $("select[name='y_province']").change(function(){
            var id = $(this).val();
            var data = {};
            data.p_id = id;
            var url = "city";
            $.ajax({
                type : "post",
                data: data,
                dataType : "json",
                url: url,
                success:function(msg){
                    $("select[name='y_city']").empty();
                    $.each(msg,function(k,v){
                        var options="<option value='"+ v.id+"'>"+ v.name+"</option>";
                        $("select[name='y_city']").append(options);
                        $("select[name='y_district ']").append(options);

                    });

                }
            });
        });
        $("select[name='y_city']").change(function(){
            var id = $(this).val();
            var data = {};
            data.p_id = id;
            var url = "city";
            $.ajax({
                type : "post",
                data: data,
                dataType : "json",
                url: url,
                success:function(msg){
                    $("select[name='y_district']").empty();
                    $.each(msg,function(k,v){
                        var options="<option value='"+ v.id+"'>"+ v.name+"</option>";
                        $("select[name='y_district']").append(options);

                    });


                }
            });
        });


        $(document).on('click','#add',function(){
            var address_name=$("#address_name").val();
            if(address_name==''){
                alert('未填写收货人姓名');
                return false;
            }
            var address_name=$("#address_name").val();
            var address_addre=$("#address_addre").val();
            var address_tel=$("#address_tel").val();
            var y_province=$("#y_province").val();
            var y_city=$("#y_city").val();
            var y_district=$("#y_district").val();
            var data={};
            data.address_name=address_name;
            data.address_addre=address_addre;
            data.address_tel=address_tel;
            data.y_province=y_province;
            data.y_city=y_city;
            data.y_district=y_district;
            $.ajax({
                url: "{{'/add_go'}}",
                type: 'post',
                data: {address_name:address_name,address_addre:address_addre,address_tel:address_tel,y_district:y_district,y_city:y_city,y_province:y_province},
                dataType: 'json',
                success:function(res){
                    if(res.code==000000){
                        alert(res.msg);
                        location.href="/add_list";
                    }else{
                        alert(res.msg);
                    }
                }
            });
        })
        //软删除
        $(document).on("click","#address_del",function(){
            var address_id=$(this).attr('data-id');
            $.ajax({
                url:"/del",
                data:{"address_id":address_id},
                dataType:"json",
                success:function(res){
                    if(res.code==000000){
                        alert(res.msg);
                        location.href="/add_list";
                    }else{
                        alert(res.msg);
                    }
                }
            })
        })
    </script>

@endsection



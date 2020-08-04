@extends('layouts_q.tw_jz')
@section('title','个人信息')
@section('content')

	<link rel="stylesheet" type="text/css" href="/qtai/css/webbase.css" />
	<link rel="stylesheet" type="text/css" href="/qtai/css/pages-seckillOrder.css" />
	<script src="/qtai/js/plugins/jquery/jquery.min.js"></script>

<script type="text/javascript" src="/qtai/plugins/jquery/jquery.min.js"></script>
{{--<script type="text/javascript">--}}
	{{--$(function(){--}}
		{{--$("#service").hover(function(){--}}
			{{--$(".service").show();--}}
		{{--},function(){--}}
			{{--$(".service").hide();--}}
		{{--});--}}
		{{--$("#shopcar").hover(function(){--}}
			{{--$("#shopcarlist").show();--}}
		{{--},function(){--}}
			{{--$("#shopcarlist").hide();--}}
		{{--});--}}

	{{--})--}}
{{--</script>--}}
<script>
	$(function() {
		$.ms_DatePicker({
			YearSelector: "#select_year2",
			MonthSelector: "#select_month2",
			DaySelector: "#select_day2"
		});
	});
</script>
</body>
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
                            <dd><a href="/add" class="list-active">个人信息</a></dd>
                            <dd><a href="/add_list">地址管理</a></dd>
                            <dd><a href="/lists">安全管理</a></dd>
                        </dl>
                    </div>
                </div>
                <!--右侧主内容-->
                <div class="yui3-u-5-6">
                    <div class="body userInfo">
                        <ul class="sui-nav nav-tabs nav-large nav-primary ">
                            <li class="active"><a href="#one" data-toggle="tab">基本资料</a></li>
                        </ul>
                        <div class="tab-content ">
                            <div id="one" class="tab-pane active">
                                <form id="form-msg" class="sui-form form-horizontal" action="{{url('add_do')}}">
									<div class="new-photo">
										<p>当前头像：</p>
										<div class="upload">
											<img id="imgShow_WU_FILE_0" width="100" height="100" src="/qtai/img/_/photo_icon.png" alt="">
											<input type="file"  name="y_img" />
										</div>
									<div class="control-group">
                                        <label for="inputName" class="control-label">昵称：</label>
                                        <div class="controls">
                                            <input type="text" id="inputName" name="y_name" placeholder="昵称"  name="y_name">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label for="inputGender" class="control-label">性别：</label>
                                        <div class="controls">
                                            <input type="radio" name="y_sex" checked  value="1"><span>男</span>
                                        </label>
                                            <input type="radio" name="y_sex" value="2"><span>女</span>
                                        </label>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="inputPassword" class="control-label" name="y_birthday">生日：</label>
                                        <div class="controls">
                                            <select id="select_year2" name="year" rel="1990" >
												<option value="">——</option>
											@foreach($date as $k => $v)
												@if($v->year != null)
													<option value="{{$v->year}}">{{$v->year}}</option>
													@endif
													@endforeach
											</select>年
                                            <select id="select_month2" name="month" rel="4">
												<option value="">——</option>
											@foreach($date as $k => $v)
												@if($v->month != null)
													<option value="{{$v->month}}">{{$v->month}}</option>
													@endif
													@endforeach
											</select>月
                                            <select id="select_day2" name="day" rel="3">
												<option value="">——</option>
											@foreach($date as $k => $v)
												@if($v->day != null)
												<option value="{{$v->day}}}">{{$v->day}}</option>
													@endif
													@endforeach
											</select>日
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label for="inputPassword" class="control-label">所在地：</label>
                                        <div class="controls">
                                            <div data-toggle="distpicker">
													<div class="col-md-2">
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
                                    </div>
                                    <button type="submit">提交</button>
									</div>
								</form>
                            </div>
                            <div id="two" class="tab-pane">



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


    </script>
@endsection



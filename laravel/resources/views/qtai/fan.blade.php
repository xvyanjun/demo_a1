<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>我的购物车</title>

    <link rel="stylesheet" type="text/css" href="/qtai/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/qtai/css/pages-cart.css" />
    <!-- 富文本编辑器 -->
    
	<link rel="stylesheet" href="/admin/plugins/kindeditor/themes/default/default.css" />
	<script charset="utf-8" src="/admin/plugins/kindeditor/kindeditor-min.js"></script>
    <script charset="utf-8" src="/admin/plugins/kindeditor/lang/zh_CN.js"></script>
    
   
</head>

<body>
	<!--head-->
    <div class="top">
			<div class="py-container">
				<div class="shortcut">
				@if(!session('u_id'))
					<ul class="fl">
						<li class="f-item">品优购欢迎您！</li>
						<li class="f-item">请<a href="/login" >登录</a>　<span><a href="/reg" >免费注册</a></span></li>
					</ul>
				@else
					<ul class="fl">
						<li class="f-item">品优购欢迎您！</li>
						<li class="f-item">欢迎<a href="javascript:;" >{{session('u_name')}}</a>登录　<span><a href="/tuichu" >退出</a></span></li>
					</ul>
				@endif
					<ul class="fr">
						<li class="f-item"><a href="/center">我的订单</a></li>
						<li class="f-item space"></li>
						<li class="f-item">我的品优购</li>
						<li class="f-item space"></li>
						<li class="f-item">品优购会员</li>
						<li class="f-item space"></li>
						<li class="f-item">企业采购</li>
						<li class="f-item space"></li>
						<li class="f-item">关注品优购</li>
						<li class="f-item space"></li>
						<li class="f-item" id="service">
							<span>客户服务</span>
						</li>
						<li class="f-item space"></li>
						<li class="f-item"><a href="/fankui">网站反馈</a></li>
					</ul>
				</div>
			</div>
		</div>
	<div class="cart py-container">
		<!--logoArea-->
		<div class="logoArea">
			<div class="fl logo"><span class="title"></span></div>
			<div class="fr search">		
			</div>
        </div>
        <div>
        <hr style="FILTER: alpha(opacity=100,finishopacity=0,style=2)" width="80%" color=#987cb9 SIZE=10>
        </div>
        <div style="border:1px solid red"></div>
        <!--All goods-->
        <center>
        <div><h1>欢迎您对此网站提的意见,我们会尽早修复。</h1></div>
        <form action="/fanAdd" method="post">
        <div class="col-md-10 data editer">
            <textarea class="tt" name="content" style="width:800px;height:400px;visibility:hidden;" ></textarea>
        </div>
        </center>
        </br>
        <div class="btn-toolbar list-toolbar">
        <input type="submit" id="tj" value="提交" class="btn btn-primary" ng-click="setEditorValue();save()" style="margin-left: 80%;">
        </div>
        </form>
        @foreach($shop_fan as $k=>$v)
        <div id="aa" style="border:1px solid red; width:700px;margin-left: 18%;background:pink;">
            <p>网名:{{$v->f_name}}</p>
            <p>评价内容:{{$v->f_text}}</p>
            <p>{{date("Y-m-d H:i:s",$v->f_time)}}</p>
            <input type="button" id="hf" f_id="{{$v->f_id}}" value="回复" class="btn btn-primary" ng-click="setEditorValue();save()" style="margin-left: 90%;">   
        </div>
        @foreach($v['aa'] as $kk=>$vv)
                <div style="border:1px solid red; width:500px;margin-left: 34%;background:pink;">
                    <p>网名:{{$vv['f_name']}}回复{{$v['f_name']}}</p>
                    <p>评价内容:{{$vv['f_text']}}</p>
                    <p>{{date("Y-m-d H:i:s",$vv->f_time)}}</p>
                </div>
                <br>
         @endforeach
        </br>
        @endforeach
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
	<!-- 底部栏位 -->
	<!--页面底部-->
    <div class="clearfix footer">
	<div class="py-container">
		<div class="footlink">
			<div class="Mod-service">
				<ul class="Mod-Service-list">
					<li class="grid-service-item intro  intro1">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
					<li class="grid-service-item  intro intro2">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
					<li class="grid-service-item intro  intro3">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
					<li class="grid-service-item  intro intro4">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
					<li class="grid-service-item intro intro5">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
				</ul>
			</div>
			<div class="clearfix Mod-list">
				<div class="yui3-g">
					<div class="yui3-u-1-6">
						<h4>购物指南</h4>
						<ul class="unstyled">
							<li>购物流程</li>
							<li>会员介绍</li>
							<li>生活旅行/团购</li>
							<li>常见问题</li>
							<li>购物指南</li>
						</ul>

					</div>
					<div class="yui3-u-1-6">
						<h4>配送方式</h4>
						<ul class="unstyled">
							<li>上门自提</li>
							<li>211限时达</li>
							<li>配送服务查询</li>
							<li>配送费收取标准</li>
							<li>海外配送</li>
						</ul>
					</div>
					<div class="yui3-u-1-6">
						<h4>支付方式</h4>
						<ul class="unstyled">
							<li>货到付款</li>
							<li>在线支付</li>
							<li>分期付款</li>
							<li>邮局汇款</li>
							<li>公司转账</li>
						</ul>
					</div>
					<div class="yui3-u-1-6">
						<h4>售后服务</h4>
						<ul class="unstyled">
							<li>售后政策</li>
							<li>价格保护</li>
							<li>退款说明</li>
							<li>返修/退换货</li>
							<li>取消订单</li>
						</ul>
					</div>
					<div class="yui3-u-1-6">
						<h4>特色服务</h4>
						<ul class="unstyled">
							<li>夺宝岛</li>
							<li>DIY装机</li>
							<li>延保服务</li>
							<li>品优购E卡</li>
							<li>品优购通信</li>
						</ul>
					</div>
					<div class="yui3-u-1-6">
						<h4>帮助中心</h4>
						<img src="/qtai/img/wx_cz.jpg">
					</div>
				</div>
			</div>
			<div class="Mod-copyright">
				<ul class="helpLink">
					<li>关于我们<span class="space"></span></li>
					<li>联系我们<span class="space"></span></li>
					<li>关于我们<span class="space"></span></li>
					<li>商家入驻<span class="space"></span></li>
					<li>营销中心<span class="space"></span></li>
					<li>友情链接<span class="space"></span></li>
					<li>关于我们<span class="space"></span></li>
					<li>营销中心<span class="space"></span></li>
					<li>友情链接<span class="space"></span></li>
					<li>关于我们</li>
				</ul>
				<p>地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</p>
				<p>京ICP备08001421号京公网安备110108007702</p>
			</div>
		</div>
	</div>
</div>
<!--页面底部END-->

    <script type="text/javascript" src="/qtai/js/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/qtai/js/plugins/jquery.easing/jquery.easing.min.js"></script>
    <script type="text/javascript" src="/qtai/js/plugins/sui/sui.min.js"></script>
    <script type="text/javascript" src="/qtai/js/widget/nav.js"></script>
</body>

</html>
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
<script>
    $(document).on("click","#hf",function(){
        var _this=$(this);
        var f_id= _this.attr("f_id");
        var input="<input type='text' name='aa' f_id="+f_id+" class='input_name'><input type='button' id='fb' value='发布'>";
        var vv=_this.parents('#aa').find("[name='aa']").prop("class");
        // console.log(vv);return;undefined
        if(vv==null){
            _this.parents('#aa').append(input);
        }
    })
    $(document).on("click","#fb",function(){
        var _this=$(this);
        var f_id=_this.prev('input').attr('f_id');
        var input_name=_this.prev('input').val();
        // console.log(f_id);
        var data={};
        data.f_id=f_id;
        data.input_name=input_name;
        $.ajax({
            url:"/huiAdd",
            data:data,
            dataType:"json",
            success:function(res){
                if(res.code==200){
					window.location.href=""
				}else if(res.code==500){
					window.location.href=res.url
				}
            }
        })
    })
</script>

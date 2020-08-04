<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>@yield('首页')</title>
	<link rel="icon" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/qtai/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/qtai/css/pages-JD-index.css" />
    <link rel="stylesheet" type="text/css" href="/qtai/css/widget-jquery.autocomplete.css" />
    <link rel="stylesheet" type="text/css" href="/qtai/css/widget-cartPanelView.css" />

    <script type="text/javascript" src="/qtai/js/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/qtai/js/model/cartModel.js"></script>
    <script type="text/javascript" src="/qtai/js/czFunction.js"></script>
    <script type="text/javascript" src="/qtai/js/plugins/jquery.easing/jquery.easing.min.js"></script>
    <script type="text/javascript" src="/qtai/js/plugins/sui/sui.min.js"></script>
    <script type="text/javascript" src="/qtai/js/pages/index.js"></script>
    <script type="text/javascript" src="/qtai/js/widget/cartPanelView.js"></script>
    <script type="text/javascript" src="/qtai/js/widget/jquery.autocomplete.js"></script>
    <script type="text/javascript" src="/qtai/js/widget/nav.js"></script>

    
{{--</head>--}}

<body>
	<!-- 头部栏位 -->
	<!--页面顶部-->
<div id="nav-bottom">
	<!--顶部-->
	<div class="nav-top">
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

		<!--头部-->
		<div class="header">
			<div class="py-container">
				<div class="yui3-g Logo">
					<div class="yui3-u Left logoArea">
						<a class="logo-bd" title="品优购" href="/"></a><!--target="_blank"-->
					</div>
					<div class="yui3-u Center searchArea">
						<div class="search">
							<form action="/soulist" method="post" class="sui-form form-inline">
								<!--searchAutoComplete-->
								<div class="input-append">
									<input type="text" id="autocomplete" name="sou" value="" placeholder="" class="input-error input-xxlarge" />
									<button class="sui-btn btn-xlarge btn-danger" id="toubudasousuo" type="submit">搜索</button>
								</div>
							</form>
						</div>
                    </div>
                    <div class="yui3-u Right shopArea">
						<div class="fr shopcar">
							<div class="show-shopcar" id="shopcar">
								<span class="car"></span>
								<a class="sui-btn btn-default btn-xlarge" href="/cart" ><!--target="_blank"-->
									<span>我的购物车</span>
									<i class="shopnum" id='cat_num_0522'>0</i>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="yui3-g NavList">
					<div class="yui3-u Left all-sort">
						<h4>全部商品分类</h4>
					</div>
					<div class="yui3-u Center navArea">
						<ul class="nav" id='nav_s'>
							{{--<li class="f-item">服装城</li>--}}
							{{--<li class="f-item">美妆馆</li>--}}
							{{--<li class="f-item">品优超市</li>--}}
							{{--<li class="f-item">全球购</li>--}}
							{{--<li class="f-item">闪购</li>--}}
							{{--<li class="f-item">团购</li>--}}
							{{--<li class="f-item">有趣</li>--}}
							{{--<li class="f-item"><a href="seckill-index.html">秒杀</a></li>--}}
						</ul>
					</div>
					<div class="yui3-u Right"></div>
				</div>
				<script>					
					$(function(){
//----------------------------------------------------------------						
						$.ajax({
							url:'/cat_top_list',
							type:'post',
							dataType:'json',
							success:function(jk_005){
								$("#cat_num_0522").text(jk_005);
							}
						});
//----------------------------------------------------------------						
						$.ajax({
							url:'/dhang_jz',
							type:'post',
							dataType:'json',
							success:function(jk){
							   var pj='';
							   var cd=jk.length;
                               for(var e1=0;e1<=cd-1;e1++){
                               	pj=pj+"<a href='/nav/list'><li class='f-item' nav_url='"+jk[e1]['nav_url']+"' id='nav_dh'>"+jk[e1]['nav_name']+"</li></a>";
                               }
                               $("#nav_s").empty().append(pj);
							}
						});
//----------------------------------------------------------------
                        $(document).on('click','#nav_dh',function(){
                        	var nav_url=$(this).attr('nav_url');
                        	    location.href=nav_url;
                        });
//----------------------------------------------------------------						
					});
				</script>

			</div>
		</div>
	</div>
</div>
    {{--<div id="yemiandasousuo">--}}
        <!-- eva -->
        @yield('content')
                <!-- eva -->
    {{--</div>--}}
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
					<li><a href="javascript:;" style="color:black">关于我们</a><span class="space"></span></li>
					<li><a href="javascript:;" style="color:black">联系我们</a><span class="space"></span></li>
					<li><a href="javascript:;" style="color:black">联系客服</a><span class="space"></span></li>
					<li><a href="javascript:;" style="color:black">商家帮助</a><span class="space"></span></li>
					<li><a href="javascript:;" style="color:black">营销中心</a><span class="space"></span></li>
					<li><a href="/friend" style="color:black">友情链接</a><span class="space"></span></li>
					<li><a href="javascript:;" style="color:black">风险检测</a><span class="space"></span></li>
					<li><a href="javascript:;" style="color:black">营销中心</a><span class="space"></span></li>
					<li><a href="javascript:;" style="color:black">销售联盟</a><span class="space"></span></li>
					<li><a href="javascript:;" style="color:black">隐私政策</a></li>
				</ul>
				<p>地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</p>
				<p>京ICP备08001421号京公网安备110108007702</p>
			</div>
		</div>
	</div>
</div>
<!--页面底部END-->
	<!-- 楼层位置 -->

	<!--侧栏面板开始-->
<div class="J-global-toolbar">
	<div class="toolbar-wrap J-wrap">
		<div class="toolbar">
			<div class="toolbar-panels J-panel">

				<!-- 我的关注 -->
				<div style="visibility: hidden;" data-name="follow" class="J-content toolbar-panel tbar-panel-follow">
					<h3 class="tbar-panel-header J-panel-header">
						<a href="#" target="_blank" class="title"> <i></i> <em class="title">我的关注</em> </a>
						<span class="close-panel J-close" onclick="cartPanelView.tbar_panel_close('follow');"></span>
					</h3>
					<div class="tbar-panel-main">
						<div class="tbar-panel-content J-panel-content">
							<div class="tbar-tipbox2">
								<div class="tip-inner"> <i class="i-loading"></i> </div>
							</div>
						</div>
					</div>
					<div class="tbar-panel-footer J-panel-footer"></div>
				</div>

				<!-- 我的足迹 -->
				<div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-history toolbar-animate-in">
					<h3 class="tbar-panel-header J-panel-header">
						<a href="#" target="_blank" class="title"> <i></i> <em class="title">我的足迹</em> </a>
						<span class="close-panel J-close" onclick="cartPanelView.tbar_panel_close('history');"></span>
					</h3>
					<div class="tbar-panel-main">
						<div class="tbar-panel-content J-panel-content">
							<div class="jt-history-wrap">
								<ul id='fu_lishi'>
									<span>暂无。。。。。</span>
								</ul>
								<a href="#" class="history-bottom-more" target="_blank">查看更多足迹商品 &gt;&gt;</a>
							</div>
						</div>
					</div>
					<div class="tbar-panel-footer J-panel-footer"></div>
				</div>

			</div>

			<div class="toolbar-header"></div>

			<!-- 侧栏按钮 -->
			<div class="toolbar-tabs J-tab">
				<!-- <div onclick="cartPanelView.tabItemClick('cart')" class="toolbar-tab tbar-tab-cart" data="购物车" tag="cart" >
					<i class="tab-ico"></i>
					<em class="tab-text"></em>
					<span class="tab-sub J-count " id="tab-sub-cart-count" name='cat_num_0525'>0</span>
				</div> -->
				<div onclick="cartPanelView.tabItemClick('follow')" class="toolbar-tab tbar-tab-follow" data="我的关注" tag="follow" >
					<i class="tab-ico"></i>
					<em class="tab-text"></em>
					<span class="tab-sub J-count hide">0</span>
				</div>
				<div onclick="cartPanelView.tabItemClick('history')" class="toolbar-tab tbar-tab-history" data="我的足迹" tag="history" >
					<i class="tab-ico"></i>
					<em class="tab-text"></em>
					<span class="tab-sub J-count hide" >0</span>
				</div>
			</div>

			<div class="toolbar-footer">
				<div class="toolbar-tab tbar-tab-top" > <a href="#"> <i class="tab-ico  "></i> <em class="footer-tab-text">顶部</em> </a> </div>
				<div class="toolbar-tab tbar-tab-feedback" > <a href="#" target="_blank"> <i class="tab-ico"></i> <em class="footer-tab-text ">反馈</em> </a> </div>
			</div>

			<div class="toolbar-mini"></div>

		</div>

		<div id="J-toolbar-load-hook"></div>

	</div>
</div>
<!--购物车单元格 模板-->
<script type="text/template" id="tbar-cart-item-template">
<!-- <div class="tbar-cart-item" >
		<div class="jtc-item-promo">
			<em class="promo-tag promo-mz">满赠<i class="arrow"></i></em>
			<div class="promo-text">已购满600元，您可领赠品</div>
		</div>
		<div class="jtc-item-goods">
			<span class="p-img"><a href="#" target="_blank"><img src="{2}" alt="{1}" height="50" width="50" /></a></span>
			<div class="p-name">
				<a href="#">{1}</a>
			</div>
			<div class="p-price"><strong>¥{3}</strong>×{4} </div>
			<a href="#none" class="p-del J-del">删除</a>
		</div>
	</div> -->
</script>
<!--侧栏面板结束-->
<script type="text/javascript">
$(function(){
	$("#service").hover(function(){
		$(".service").show();
	},function(){
		$(".service").hide();
	});
	$("#shopcar").hover(function(){
		$("#shopcarlist").show();
	},function(){
		$("#shopcarlist").hide();
	});

})
</script>
<script>
//--------------------------------------------------------------------	
    $(function(){
    	$.ajax({
    		url:'/ce_lishi',
    		type:'post',
    		dataType:'json',
    		success:function(rc_n){
    		  var fon_pj='';
              for(var jk_886=0;jk_886<=rc_n['cd']-1;jk_886++){
                 fon_pj=fon_pj+"<li class='jth-item'><a href='#' class='img-wrap'> <img style='width:100px;height:100px;' src='/"+rc_n['xxi'][jk_886]['goods_img']+"' height='100' width='100' /></a><a class='add-cart-button' href='#'' target='_blank'>加入购物车</a><a href='#' target='_blank' class='price' title='"+rc_n['xxi'][jk_886]['goods_price']+"'>￥"+rc_n['xxi'][jk_886]['goods_price']+"</a><a href='#'>&nbsp;&nbsp;&nbsp;×</a></li>";
              }
              $("#fu_lishi").empty().html(fon_pj);
              console.log(rc_n);
    		}
    	});
    });
    $(function(){
	  $.ajax({
	  	url:'/cat_top_list',
	  	type:'post',
	  	dataType:'json',
	  	success:function(jk_005){
	  		$("[name='cat_num_0525']").text(jk_005);
	  		console.log(jk_005);
	  	}
	  });
    });

///****头部搜索****/
//$(document).on("click","#toubudasousuo",function(){
//    var sou=$(this).prev('input').val();
//    $.ajax({
//        url:'/soulist',
//        type:'post',
//        dataType:'html',
//        data:{sou:sou},
//        success:function(res){
//            if(res.code=='300'){
//                alert(res.msg);
//            }else{
//                $("#yemiandasousuo").html(res);
//            }
//        }
//    });
//});
//--------------------------------------------------------------------	
</script>

</body>


</html>
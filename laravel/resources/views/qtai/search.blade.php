@extends('layouts_q.tw_jz')
@section('title','列表')
@section('content')
    <link rel="stylesheet" type="text/css" href="/qtai/css/pages-list.css" />
<div class="main">
		<div class="py-container">
			<!--bread-->
			<div class="bread">
				<ul class="fl sui-breadcrumb">
					<li>
						<a href="/cate_list/{{$cate_info['cate_id']}}">全部结果</a>
					</li>
					<li class="active">{{$cate_info['cate_name']}}</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<!--selector-->
			<div class="clearfix selector">
				<div class="type-wrap logo">
					<div class="fl key brand">品牌</div>
					<div class="value logos">
						<ul class="logo-list">
                            @foreach($brand_info as $k=>$v)
							    <li>
									@foreach($v as $kk=>$vv)
									<img  src="/{{$vv['brand_img']}}" style="width: 103px;height: 51.5px;"  class="brand_id" brand_id="{{$vv['brand_id']}}" />
									@endforeach
								</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="type-wrap">
					<div class="fl key">颜色</div>
					<div class="fl value">
						<ul class="type-list">
							@foreach($sku_info['yan'] as $k=>$v)
							<li>
								<a val_id="{{$v['val_id']}}" attr_id="{{$v['attr_id']}}" class="sku_yan">{{$v['val_name']}}</a>
							</li>
							@endforeach
						</ul>
					</div>
					<div class="fl ext"></div>
				</div>
				<div class="type-wrap">
					<div class="fl key">尺寸</div>
					<div class="fl value">
						<ul class="type-list">
							@foreach($sku_info['chi'] as $k=>$v)
							<li>
								<a val_id="{{$v['val_id']}}" attr_id="{{$v['attr_id']}}" class="sku_chi">{{$v['val_name']}}</a>
							</li>
							@endforeach
						</ul>
					</div>
					<div class="fl ext"></div>
				</div>
				<div class="type-wrap">
					<div class="fl key">类型</div>
					<div class="fl value">
						<ul class="type-list">
							@foreach($sku_info['lei'] as $k=>$v)
								<li>
									<a val_id="{{$v['val_id']}}" attr_id="{{$v['attr_id']}}" class="sku_lei">{{$v['val_name']}}</a>
								</li>
							@endforeach
						</ul>
					</div>
					<div class="fl ext"></div>
				</div>
				<div class="type-wrap">
					<div class="fl key">套装</div>
					<div class="fl value">
						<ul class="type-list">
							@foreach($sku_info['tao'] as $k=>$v)
								<li>
									<a val_id="{{$v['val_id']}}" attr_id="{{$v['attr_id']}}" class="sku_tao">{{$v['val_name']}}</a>
								</li>
							@endforeach
						</ul>
					</div>
					<div class="fl ext"></div>
				</div>
				<div class="type-wrap">
					<div class="fl key">价格</div>
					<div class="fl value">
						<ul class="type-list">
                            @foreach($price as $k=>$v)
							    <li>
							    	<a class="qu_price" price="{{$v}}">{{$v}}</a>
							    </li>
							@endforeach
						</ul>
					</div>
					<div class="fl ext">
					</div>
				</div>
			</div>
			<!--details-->
			<div class="details" id="goods_tiao_list">
                <input type="hidden" id="brand_id" name="brand_id" value="">
                <input type="hidden" id="yan_sku" name="yan_sku" value="">
                <input type="hidden" id="chi_sku" name="chi_sku" value="">
                <input type="hidden" id="lei_sku" value="">
                <input type="hidden" id="tao_sku" value="">
                <input type="hidden" id="qu_price" name="qu_price" value="">
                <input type="hidden" id="tiao" value="">
				<div class="sui-navbar">
					<div class="navbar-inner filter">
						<ul class="sui-nav">
							<li class="active">
								<a class="tiao" jian="goods_id">综合</a>
							</li>
							<li>
								<a class="tiao" jian="goods_hits">销量</a>
							</li>
							<li>
								<a class="tiao" jian="goods_time">新品</a>
							</li>
							<li>
                                <a class="tiao" jian="goods_price">价格</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="goods-list" >
					<ul class="yui3-g">
						@foreach($goods_info as $k=>$v)
						<li class="yui3-u-1-5" title="{{$v['goods_name']}}">
							<div class="list-wrap">
								<div class="p-img">
									<a href="/goods_list/{{$v['goods_id']}}"><img src="/{{$v['goods_img']}}" width="200" height="210"/></a>
								</div>
								<div class="price">
									<strong>
											<em>¥</em>
											<i>{{$v['goods_price']}}</i>
										</strong>
								</div>
								<div class="attr">
									<em>{{mb_substr($v['goods_name'],0,19)}}</em>
								</div>
								<div class="cu">
									<!-- {{--<em><span>促</span>满一件可参加超值换购</em>--}} -->
								</div>
								<div class="commit">
									<i class="command">已有{{$v['goods_hits']}}人查看</i>
								</div>
								<div class="operate">
									<a href="/goods_list/{{$v['goods_id']}}"class="sui-btn btn-bordered btn-danger">查看商品详情</a>
									<a href="javascript:;" goods_id="{{$v['goods_id']}}" class="sui-btn btn-bordered guan guanzhu">关注</a>
								</div>
							</div>
						</li>
						@endforeach
					</ul>
				</div>
				<div class="fr page">
					<div class="sui-pagination pagination-large">
						<ul>
                            {{ $goods_info->links() }}
						</ul>
					</div>
				</div>
			</div>
			<!--hotsale-->
			<div class="clearfix hot-sale">
				<h4 class="title">热卖商品</h4>
				<div class="hot-list">
					<ul class="yui3-g">
                        @foreach($goods_hot as $k=>$v)
						<li class="yui3-u-1-4">
							<div class="list-wrap">
								<div class="p-img">
                                    <a href="/goods_list/{{$v['goods_id']}}"><img src="/{{$v['goods_img']}}" width="450" height="450" /></a>
								</div>
								<div class="attr">
									<em title="{{$v['goods_name']}}">{{mb_substr($v['goods_name'],0,9)}}</em>
								</div>
								<div class="price">
									<strong>
											<em>¥</em>
											<i>{{$v['goods_price']}}</i>
										</strong>
								</div>
								<div class="commit">
									<i class="command">已有{{$v['goods_hits']}}人点击</i>
								</div>
							</div>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
<style>
    .brand_class{
        border:solid 1px red;
    }
    .page_class{
        background-color:red;
    }

</style>
	<script>
/*****************************************点击品牌**********************************************/
		$(document).on("click",".brand_id",function(){
            if($(this).hasClass('brand_class')){
                $(this).removeClass('brand_class');

                var brand_id=null;//品牌id

                var cate_id="{{$cate_info['cate_id']}}";//分类id

                var yan_sku=$("#yan_sku").val();//sku颜色
                if(yan_sku==''){
                    var yan_sku=null;//sku颜色
                }

                var chi_sku=$("#chi_sku").val();//尺寸sku
                if(chi_sku==''){
                    var chi_sku=null;//尺寸sku
                }

                var lei_sku=$("#lei_sku").val();//类型sku
                if(lei_sku==''){
                    var lei_sku=null;
                }

                var tao_sku=$("#tao_sku").val();//套装sku
                if(tao_sku==''){
                    var tao_sku=null;
                }

                var price=$("#qu_price").val();//价格
                if(price==''){
                    var price=null;
                }

                var tiao=$("#tiao").val();//倒叙条件
                if(tiao==''){
                    var tiao=null;
                }

                $.ajax({
                    url: "{{'/cate_goods_list/tiaojian'}}",
                    type: 'post',
                    data: {cate_id:cate_id,brand_id:brand_id,yan_sku:yan_sku,chi_sku:chi_sku,price:price,tiao:tiao,lei_sku:lei_sku,tao_sku:tao_sku},
                    dataType: 'html',
                    success: function (res) {
//					console.log(res);
                        $('#goods_tiao_list').html(res);
                    }
                });
            }else{
                var brand_id=$(this).attr('brand_id');//品牌id
                $(this).addClass('brand_class');
                $(this).parent('li').siblings('li').find('img').removeClass('brand_class');
                var cate_id="{{$cate_info['cate_id']}}";//分类id

                var yan_sku=$("#yan_sku").val();//sku颜色
                if(yan_sku==''){
                    var yan_sku=null;//sku颜色
                }

                var chi_sku=$("#chi_sku").val();//尺寸sku
                if(chi_sku==''){
                    var chi_sku=null;//尺寸sku
                }

                var lei_sku=$("#lei_sku").val();//类型sku
                if(lei_sku==''){
                    var lei_sku=null;
                }

                var tao_sku=$("#tao_sku").val();//套装sku
                if(tao_sku==''){
                    var tao_sku=null;
                }

                var price=$("#qu_price").val();//价格
                if(price==''){
                    var price=null;
                }

                var tiao=$("#tiao").val();//倒叙条件
                if(tiao==''){
                    var tiao=null;
                }

                $.ajax({
                    url: "{{'/cate_goods_list/tiaojian'}}",
                    type: 'post',
                    data: {cate_id:cate_id,brand_id:brand_id,yan_sku:yan_sku,chi_sku:chi_sku,price:price,tiao:tiao,lei_sku:lei_sku,tao_sku:tao_sku},
                    dataType: 'html',
                    success: function (res) {
//					console.log(res);
                        $('#goods_tiao_list').html(res);
                    }
                });
            }
        });
/*************************************点击颜色*******************************************************/
		$(document).on("click",".sku_yan",function(){
			if($(this).hasClass('redhover')){
				var cate_id="{{$cate_info['cate_id']}}";//分类id

				var brand_id=$("#brand_id").val();//品牌id
				if(brand_id==''){
					var brand_id=null;//品牌id
				}

				var chi_sku=$("#chi_sku").val();//尺寸sku
				if(chi_sku==''){
					var chi_sku=null;//尺寸sku
				}

                var lei_sku=$("#lei_sku").val();//类型sku
                if(lei_sku==''){
                    var lei_sku=null;
                }

                var tao_sku=$("#tao_sku").val();//套装sku
                if(tao_sku==''){
                    var tao_sku=null;
                }

                var price=$("#qu_price").val();//价格
                if(price==''){
                    var price=null;
                }

                var tiao=$("#tiao").val();//倒叙条件
                if(tiao==''){
                    var tiao=null;
                }

				$(this).removeClass('redhover');

				$.ajax({
					url: "{{'/cate_goods_list/tiaojian'}}",
					type: 'post',
					data: {cate_id:cate_id,brand_id:brand_id,chi_sku:chi_sku,price:price,tiao:tiao,lei_sku:lei_sku,tao_sku:tao_sku},
					dataType: 'html',
					success: function (res) {
//						console.log(res);
						$('#goods_tiao_list').html(res);
					}
				});
			}else{
				var cate_id="{{$cate_info['cate_id']}}";//分类id

				var brand_id=$("#brand_id").val();//品牌id
				if(brand_id==''){
					var brand_id=null;//品牌id
				}

				var chi_sku=$("#chi_sku").val();//尺寸sku
				if(chi_sku==''){
					var chi_sku=null;//尺寸sku
				}

                var lei_sku=$("#lei_sku").val();//类型sku
                if(lei_sku==''){
                    var lei_sku=null;
                }

                var tao_sku=$("#tao_sku").val();//套装sku
                if(tao_sku==''){
                    var tao_sku=null;
                }

                var price=$("#qu_price").val();//价格
                if(price==''){
                    var price=null;
                }

                var tiao=$("#tiao").val();//倒叙条件
                if(tiao==''){
                    var tiao=null;
                }

				var val_yan_id=$(this).attr('val_id');//颜色属性值id
				var attr_yan_id=$(this).attr('attr_id');//颜色属性id
				var yan_sku='['+attr_yan_id+':'+val_yan_id+']';

				$(this).parent('li').siblings('li').find('a').removeClass('redhover');
				$(this).addClass('redhover');
				$.ajax({
					url: "{{'/cate_goods_list/tiaojian'}}",
					type: 'post',
					data: {cate_id:cate_id,brand_id:brand_id,yan_sku:yan_sku,chi_sku:chi_sku,price:price,tiao:tiao,lei_sku:lei_sku,tao_sku:tao_sku},
					dataType: 'html',
					success: function (res) {
//						console.log(res);

						$('#goods_tiao_list').html(res);
					}
				});
			}
		});
/*************************************************尺寸********************************************************/
        $(document).on("click",".sku_chi",function(){
	if($(this).hasClass('redhover')){
		var cate_id="{{$cate_info['cate_id']}}";//分类id

		var brand_id=$("#brand_id").val();//品牌id
		if(brand_id==''){
			var brand_id=null;//品牌id
		}

		var yan_sku=$("#yan_sku").val();//sku颜色
		if(yan_sku==''){
			var yan_sku=null;//sku颜色
		}

        var lei_sku=$("#lei_sku").val();//类型sku
        if(lei_sku==''){
            var lei_sku=null;
        }

        var tao_sku=$("#tao_sku").val();//套装sku
        if(tao_sku==''){
            var tao_sku=null;
        }

        var price=$("#qu_price").val();//价格
        if(price==''){
            var price=null;
        }

        var tiao=$("#tiao").val();//倒叙条件
        if(tiao==''){
            var tiao=null;
        }

		$(this).removeClass('redhover');

		$.ajax({
			url: "{{'/cate_goods_list/tiaojian'}}",
			type: 'post',
			data: {cate_id:cate_id,brand_id:brand_id,yan_sku:yan_sku,price:price,tiao:tiao,lei_sku:lei_sku,tao_sku:tao_sku},
			dataType: 'html',
			success: function (res) {
//						console.log(res);
				$('#goods_tiao_list').html(res);
			}
		});
	}else{
		var cate_id="{{$cate_info['cate_id']}}";//分类id

		var brand_id=$("#brand_id").val();//品牌id
		if(brand_id==''){
			var brand_id=null;//品牌id
		}

		var yan_sku=$("#yan_sku").val();//sku颜色
		if(brand_id==''){
			var yan_sku=null;//sku颜色
		}

        var lei_sku=$("#lei_sku").val();//类型sku
        if(lei_sku==''){
            var lei_sku=null;
        }

        var tao_sku=$("#tao_sku").val();//套装sku
        if(tao_sku==''){
            var tao_sku=null;
        }

        var price=$("#qu_price").val();//价格
        if(price==''){
            var price=null;
        }

        var tiao=$("#tiao").val();//倒叙条件
        if(tiao==''){
            var tiao=null;
        }

		var val_chi_id=$(this).attr('val_id');//尺寸属性值id
		var attr_chi_id=$(this).attr('attr_id');//尺寸属性id
		var chi_sku='['+attr_chi_id+':'+val_chi_id+']';

		$(this).parent('li').siblings('li').find('a').removeClass('redhover');
		$(this).addClass('redhover');
		$.ajax({
			url: "{{'/cate_goods_list/tiaojian'}}",
			type: 'post',
			data: {cate_id:cate_id,brand_id:brand_id,yan_sku:yan_sku,chi_sku:chi_sku,price:price,tiao:tiao,lei_sku:lei_sku,tao_sku:tao_sku},
			dataType: 'html',
			success: function (res) {
//						console.log(res);
				$('#goods_tiao_list').html(res);
			}
		});
	}
});
/*************************************点击类型*******************************************************/
    $(document).on("click",".sku_lei",function(){
        if($(this).hasClass('redhover')){
            var cate_id="{{$cate_info['cate_id']}}";//分类id

            var brand_id=$("#brand_id").val();//品牌id
            if(brand_id==''){
                var brand_id=null;//品牌id
            }

            var yan_sku=$("#yan_sku").val();//sku颜色
            if(yan_sku==''){
                var yan_sku=null;//sku颜色
            }

            var chi_sku=$("#chi_sku").val();//尺寸sku
            if(chi_sku==''){
                var chi_sku=null;//尺寸sku
            }

            var tao_sku=$("#tao_sku").val();//套装sku
            if(tao_sku==''){
                var tao_sku=null;
            }

            var price=$("#qu_price").val();//价格
            if(price==''){
                var price=null;
            }

            var tiao=$("#tiao").val();//倒叙条件
            if(tiao==''){
                var tiao=null;
            }

            $(this).removeClass('redhover');

            $.ajax({
                url: "{{'/cate_goods_list/tiaojian'}}",
                type: 'post',
                data: {cate_id:cate_id,brand_id:brand_id,chi_sku:chi_sku,price:price,tiao:tiao,tao_sku:tao_sku},
                dataType: 'html',
                success: function (res) {
    //						console.log(res);
                    $('#goods_tiao_list').html(res);
                }
            });
        }else{
            var cate_id="{{$cate_info['cate_id']}}";//分类id

            var brand_id=$("#brand_id").val();//品牌id
            if(brand_id==''){
                var brand_id=null;//品牌id
            }

            var yan_sku=$("#yan_sku").val();//sku颜色
            if(yan_sku==''){
                var yan_sku=null;//sku颜色
            }

            var chi_sku=$("#chi_sku").val();//尺寸sku
            if(chi_sku==''){
                var chi_sku=null;//尺寸sku
            }

            var price=$("#qu_price").val();//价格
            if(price==''){
                var price=null;
            }

            var tao_sku=$("#tao_sku").val();//套装sku
            if(tao_sku==''){
                var tao_sku=null;
            }

            var tiao=$("#tiao").val();//倒叙条件
            if(tiao==''){
                var tiao=null;
            }

            var val_lei_id=$(this).attr('val_id');//类型属性值id
            var attr_lei_id=$(this).attr('attr_id');//类型属性id
            var lei_sku='['+attr_lei_id+':'+val_lei_id+']';

            $(this).parent('li').siblings('li').find('a').removeClass('redhover');
            $(this).addClass('redhover');
            $.ajax({
                url: "{{'/cate_goods_list/tiaojian'}}",
                type: 'post',
                data: {cate_id:cate_id,brand_id:brand_id,yan_sku:yan_sku,chi_sku:chi_sku,price:price,tiao:tiao,tao_sku:tao_sku,lei_sku:lei_sku},
                dataType: 'html',
                success: function (res) {
    //						console.log(res);

                    $('#goods_tiao_list').html(res);
                }
            });
        }
    });
/*************************************点击套装*******************************************************/
        $(document).on("click",".sku_tao",function(){
            if($(this).hasClass('redhover')){
                var cate_id="{{$cate_info['cate_id']}}";//分类id

                var brand_id=$("#brand_id").val();//品牌id
                if(brand_id==''){
                    var brand_id=null;//品牌id
                }

                var chi_sku=$("#chi_sku").val();//尺寸sku
                if(chi_sku==''){
                    var chi_sku=null;//尺寸sku
                }

                var price=$("#qu_price").val();//价格
                if(price==''){
                    var price=null;
                }

                var yan_sku=$("#yan_sku").val();//颜色sku
                if(yan_sku==''){
                    var yan_sku=null;
                }

                var lei_sku=$("#lei_sku").val();//类型sku
                if(lei_sku==''){
                    var lei_sku=null;
                }

                var tiao=$("#tiao").val();//倒叙条件
                if(tiao==''){
                    var tiao=null;
                }

                $(this).removeClass('redhover');

                $.ajax({
                    url: "{{'/cate_goods_list/tiaojian'}}",
                    type: 'post',
                    data: {cate_id:cate_id,brand_id:brand_id,chi_sku:chi_sku,price:price,tiao:tiao,lei_sku:lei_sku,yan_sku:yan_sku},
                    dataType: 'html',
                    success: function (res) {
        //						console.log(res);
                        $('#goods_tiao_list').html(res);
                    }
                });
            }else{
                var cate_id="{{$cate_info['cate_id']}}";//分类id

                var brand_id=$("#brand_id").val();//品牌id
                if(brand_id==''){
                    var brand_id=null;//品牌id
                }

                var yan_sku=$("#yan_sku").val();//颜色sku
                if(yan_sku==''){
                    var yan_sku=null;
                }

                var chi_sku=$("#chi_sku").val();//尺寸sku
                if(chi_sku==''){
                    var chi_sku=null;//尺寸sku
                }

                var lei_sku=$("#lei_sku").val();//类型sku
                if(lei_sku==''){
                    var lei_sku=null;
                }

                var price=$("#qu_price").val();//价格
                if(price==''){
                    var price=null;
                }

                var tiao=$("#tiao").val();//倒叙条件
                if(tiao==''){
                    var tiao=null;
                }

                var val_tao_id=$(this).attr('val_id');//套装属性值id
                var attr_tao_id=$(this).attr('attr_id');//套装属性id
                var tao_sku='['+attr_tao_id+':'+val_tao_id+']';

                $(this).parent('li').siblings('li').find('a').removeClass('redhover');
                $(this).addClass('redhover');

                $.ajax({
                    url: "{{'/cate_goods_list/tiaojian'}}",
                    type: 'post',
                    data: {cate_id:cate_id,brand_id:brand_id,yan_sku:yan_sku,chi_sku:chi_sku,price:price,tiao:tiao,lei_sku:lei_sku,tao_sku:tao_sku},
                    dataType: 'html',
                    success: function (res) {
        						console.log(res);
                        $('#goods_tiao_list').html(res);
                    }
                });
            }
        });
/************************************************价格**************************************************************/
$(document).on("click",".qu_price",function(){
    if($(this).hasClass('redhover')){
        var cate_id="{{$cate_info['cate_id']}}";//分类id

        var brand_id=$("#brand_id").val();//品牌id
        if(brand_id==''){
            var brand_id=null;//品牌id
        }

        var yan_sku=$("#yan_sku").val();//sku颜色
        if(yan_sku==''){
            var yan_sku=null;//sku颜色
        }

        var chi_sku=$("#chi_sku").val();//尺寸sku
        if(chi_sku==''){
            var chi_sku=null;//尺寸sku
        }

        var lei_sku=$("#lei_sku").val();//类型sku
        if(lei_sku==''){
            var lei_sku=null;
        }

        var tao_sku=$("#tao_sku").val();//套装sku
        if(tao_sku==''){
            var tao_sku=null;
        }

        var tiao=$("#tiao").val();//倒叙条件
        if(tiao==''){
            var tiao=null;
        }

        $(this).removeClass('redhover');

        $.ajax({
            url: "{{'/cate_goods_list/tiaojian'}}",
            type: 'post',
            data: {cate_id:cate_id,brand_id:brand_id,yan_sku:yan_sku,chi_sku:chi_sku,tiao:tiao,lei_sku:lei_sku,tao_sku:tao_sku},
            dataType: 'html',
            success: function (res) {
//	        					console.log(res);
                $('#goods_tiao_list').html(res);
            }
        });
    }else{
        var cate_id="{{$cate_info['cate_id']}}";//分类id

        var brand_id=$("#brand_id").val();//品牌id
        if(brand_id==''){
            var brand_id=null;//品牌id
        }

        var yan_sku=$("#yan_sku").val();//sku颜色
        if(brand_id==''){
            var yan_sku=null;//sku颜色
        }

        var chi_sku=$("#chi_sku").val();//尺寸sku
        if(chi_sku==''){
            var chi_sku=null;//尺寸sku
        }

        var lei_sku=$("#lei_sku").val();//类型sku
        if(lei_sku==''){
            var lei_sku=null;
        }

        var tao_sku=$("#tao_sku").val();//套装sku
        if(tao_sku==''){
            var tao_sku=null;
        }

        var tiao=$("#tiao").val();//倒叙条件
        if(tiao==''){
            var tiao=null;
        }

        var price=$(this).attr('price');

        $(this).parent('li').siblings('li').find('a').removeClass('redhover');
        $(this).addClass('redhover');

        $.ajax({
            url: "{{'/cate_goods_list/tiaojian'}}",
            type: 'post',
            data: {cate_id:cate_id,brand_id:brand_id,yan_sku:yan_sku,chi_sku:chi_sku,price:price,tiao:tiao,lei_sku:lei_sku,tao_sku:tao_sku},
            dataType: 'html',
            success: function (res) {
//	        					console.log(res);
                $('#goods_tiao_list').html(res);
            }
        });
    }
});
/*************************************************倒叙条件*************************************************************/
$(document).on("click",".tiao",function(){
        var cate_id="{{$cate_info['cate_id']}}";//分类id

        var brand_id=$("#brand_id").val();//品牌id
        if(brand_id==''){
            var brand_id=null;//品牌id
        }

        var yan_sku=$("#yan_sku").val();//sku颜色
        if(brand_id==''){
            var yan_sku=null;//sku颜色
        }

        var chi_sku=$("#chi_sku").val();//尺寸sku
        if(chi_sku==''){
            var chi_sku=null;//尺寸sku
        }

        var lei_sku=$("#lei_sku").val();//类型sku
        if(lei_sku==''){
            var lei_sku=null;
        }

        var tao_sku=$("#tao_sku").val();//套装sku
        if(tao_sku==''){
            var tao_sku=null;
        }

        var price=$("#qu_price").val();//价格
        if(price==''){
            var price=null;
        }

        var tiao=$(this).attr('jian');//倒叙条件


        $.ajax({
            url: "{{'/cate_goods_list/tiaojian'}}",
            type: 'post',
            data: {cate_id:cate_id,brand_id:brand_id,yan_sku:yan_sku,chi_sku:chi_sku,price:price,tiao:tiao,lei_sku:lei_sku,tao_sku:tao_sku},
            dataType: 'html',
            success: function (res) {
//	        					console.log(res);
                $('#goods_tiao_list').html(res);
            }
        });
});
/************************************************关注**********************************************************************/
		$(document).on("click",".guanzhu",function(){
            var goods_id=$(this).attr('goods_id');
            $.ajax({
                url: "{{'/collect/guanzhu'}}",
                type: 'post',
                data: {
                    goods_id:goods_id
                },
                dataType: 'json',
                success: function (res) {
//                    console.log(res);
					if(res.code=="200"){
						alert('关注成功');
					}else if(res.code=="555"){
						alert(res.msg);
						window.location.href="/login";
					}else{
						alert(res.msg);
					}
                }
            })
        });
/***********************************************加条件后的分页******************************************************************/
$(document).on("click",".cpage",function() {
    var page = $(this).attr('page');

    var brand_id = null;//品牌id
    if (brand_id == '') {
        var brand_id = null;
    }

    var cate_id = $("#cate_id").val();//分类id


    var yan_sku = $("#yan_sku").val();//sku颜色
    if (yan_sku == '') {
        var yan_sku = null;
    }

    var chi_sku = $("#chi_sku").val();//尺寸sku
    if (chi_sku == '') {
        var chi_sku = null;
    }

    var lei_sku=$("#lei_sku").val();//类型sku
    if(lei_sku==''){
        var lei_sku=null;
    }

    var tao_sku=$("#tao_sku").val();//套装sku
    if(tao_sku==''){
        var tao_sku=null;
    }

    var price = $("#qu_price").val();//价格
    if (price == '') {
        var price = null;
    }

    var tiao = $("#tiao").val();//倒叙条件
    if (tiao == '') {
        var tiao = null;
    }

//    $(this).addClass('active');
//    $(this).parent('li').siblings('li').find('a').removeClass('active');
//    $(this).parent

    $.ajax({
        url: "{{'/cate_goods_list/tiaojian'}}",
        type: 'post',
        data: {
            cate_id: cate_id,
            brand_id: brand_id,
            yan_sku: yan_sku,
            chi_sku: chi_sku,
            price: price,
            tiao: tiao,
            page: page,
            lei_sku:lei_sku,
            tao_sku:tao_sku
        },
        dataType: 'html',
        success: function (res) {
//					console.log(res);
            $('#goods_tiao_list').html(res);
        }
    })
});
	</script>
@endsection
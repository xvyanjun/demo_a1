@extends('layouts_q.tw_jz')
@section('title','详情')
@section('content')
    <link rel="stylesheet" type="text/css" href="/qtai/css/pages-item.css" />
	<link rel="stylesheet" type="text/css" href="/qtai/css/pages-zoom.css" />
	<!-- <link rel="stylesheet" type="text/css" href="/qtai/css/widget-cartPanelView.css" /> -->
	<div class="py-container">
		<div id="item">
			<!--product-info-->
			<div class="product-info">
				<div class="fl preview-wrap">
					<!--放大镜效果-->
					    <div class="zoom">
						<!--默认第一个预览-->
						<div id="preview" class="spec-preview">
							<span class="jqzoom"><img jqimg="/{{$goods_info['goods_img']}}" src="/{{$goods_info['goods_img']}}" width="400" height="400"/></span>
						</div>
						<!--下方的缩略图-->
						<div class="spec-scroll">
							<a class="prev">&lt;</a>
							<!--左右按钮-->
							<div class="items">
								<ul>
                                    <li><img src="/{{$goods_info['goods_img']}}" bimg="/{{$goods_info['goods_img']}}" onmousemove="preview(this)" /></li>
                                    @foreach($goods_images as $k=>$v)
                                        @foreach($v['goods_imgs'] as $kk=>$vv)
									<li><img src="/{{$vv}}" bimg="/{{$vv}}" onmousemove="preview(this)" /></li>
                                        @endforeach
                                    @endforeach
                                </ul>
							</div>
							<a class="next">&gt;</a>
						</div>
					</div>
				</div>
				<div class="fr itemInfo-wrap">
					<div class="sku-name">
						<h4>{{$goods_info['goods_name']}}</h4>
					</div>
					
					<div class="summary">
						<div class="summary-wrap">
							<div class="fl title">
								<i>价　　格</i>
							</div>
							<div class="fl price">
								<i>¥</i>
								<em id="aa">{{$goods_info['goods_price']}}</em>
								<span>降价通知</span>
							</div>
							<div class="fr remark">
								<i>累计评价</i><em>{{$goods_info['goods_hits']}}</em>
							</div>
						</div>
					
					</div>
				
					<div class="clearfix choose">
						<div id="specification" class="summary-wrap clearfix">
						<div id="dd" num={{sizeof($goods_sku)}}></div>
							@foreach($goods_sku as $k=>$v)
							<input type="hidden" id="attr_id_{{$k}}" attr_id="{{$v['attr_id']}}" value="{{$v->attr_name}}">	
							<dl id="dl">
								<dt>
									<div class="fl title">
									<i>{{$v['attr_name']}}</i>
								</div>
								</dt>
								<input type="hidden" class="col-md-10 data"  id="val_id_{{$k}}"  value="{{$v->val_name}}">
								@foreach($v['val_s'] as $kk=>$vv)
								<dd><a href="javascript:;" name="yanshi"  id="ys" goods_id="{{$goods_info['goods_id']}}"  class="{{$kk==0?'selected':''}}" val_id="{{$vv['val_id']}}">{{$vv['val_name']}}<span title="点击取消选择">&nbsp;</span>
									</a></dd>
								@endforeach
								<!-- <dd><a href="javascript:;">64G</a></dd>
								<dd><a href="javascript:;" class="locked">128G</a></dd> -->
							</dl>
							@endforeach
							
						</div>

						<div class="summary-wrap">
							<div class="fl title">
								<div class="control-group">
									<div class="controls">
										<input id="goods_stock"  goods_stock="{{$goods_info['goods_stock']}}" autocomplete="off" type="text" value="1" minnum="1" class="itxt" />
										<a href="javascript:void(0)" style="padding-right:6px; " class="increment plus">+</a>
										<a href="javascript:void(0)" style="padding-right:6px; " class="increment mins">-</a>
									</div>
								</div>
							</div>
							<div class="fl">
								<ul class="btn-choose unstyled">
									<li>
										<a href="javascript:void(0)"  id="gwc" goods_price="{{$goods_info['goods_price']}}" goods_id="{{$goods_info['goods_id']}}" class="sui-btn  btn-danger addshopcar">加入购物车</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--product-detail-->
			<div class="clearfix product-detail">
				<div class="fl aside">
					<ul class="sui-nav nav-tabs tab-wraped">
						<li class="active">
							<a href="#index" data-toggle="tab">
								<span>相关分类</span>
							</a>
						</li>
						<li>
							<a href="#profile" data-toggle="tab">
								<span>推荐品牌</span>
							</a>
						</li>
					</ul>
					<div class="tab-content tab-wraped">
						<div id="index" class="tab-pane active">
							<ul class="goods-list unstyled">
								@foreach($g_cate as $k=>$v)
								<li>
									<div class="list-wrap">
										<div class="p-img">
											<img src="/{{$v->goods_img}}" style="width:150px;" />
										</div>
										<div class="attr">
											<em>{{$v->goods_name}}</em>
										</div>
										<div class="price">
											<strong>
											<em>¥</em>
											<i>{{$v->goods_price}}</i>
										</strong>
										</div>
										<div class="operate">
											<a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
										</div>
									</div>
								</li>
								@endforeach
							</ul>
						</div>
						<div id="profile" class="tab-pane">
						@foreach($brand as $K=>$v)
							<a href="/list/{{$v->brand_id}}"><p>{{$v->brand_name}}</p></a>
						@endforeach
						</div>
					</div>
				</div>
				<div class="fr detail">
					<div class="clearfix fitting">
						<h4 class="kt">选择搭配</h4>
						<div class="good-suits">
							<div class="fl master">
								<div class="list-wrap">
									<div class="p-img">
										<img src="/qtai/img/_/l-m01.png" />
									</div>
									<em>￥5299</em>
									<i>+</i>
								</div>
							</div>
							<div class="fl suits">
								<ul class="suit-list">
									<li class="">
										<div id="">
											<img src="/qtai/img/_/dp01.png" />
										</div>
										<i>Feless费勒斯VR</i>
										<label data-toggle="checkbox" class="checkbox-pretty">
                                            <input type="checkbox"><span>39</span>
                                        </label>
									</li>
									<li class="">
										<div id=""><img src="/qtai/img/_/dp02.png" /> </div>
										<i>Feless费勒斯VR</i>
										<label data-toggle="checkbox" class="checkbox-pretty">
                                            <input type="checkbox"><span>50</span>
                                        </label>
									</li>
									<li class="">
										<div id=""><img src="/qtai/img/_/dp03.png" /></div>
										<i>Feless费勒斯VR</i>
										<label data-toggle="checkbox" class="checkbox-pretty">
                                            <input type="checkbox"><span>59</span>
                                        </label>
									</li>
									<li class="">
										<div id=""><img src="/qtai/img/_/dp04.png" /></div>
										<i>Feless费勒斯VR</i>
										<label data-toggle="checkbox" class="checkbox-pretty">
                                            <input type="checkbox"><span>99</span>
                                        </label>
									</li>
								</ul>
							</div>
							<div class="fr result">
								<div class="num">已选购0件商品</div>
								<div class="price-tit"><strong>套餐价</strong></div>
								<div class="price">￥5299</div>
								<button class="sui-btn  btn-danger addshopcar">加入购物车</button>
							</div>
						</div>
					</div>
					<div class="tab-main intro">
						<ul class="sui-nav nav-tabs tab-wraped">
							<li class="active">
								<a href="#one" data-toggle="tab">
									<span>商品介绍</span>
								</a>
							</li>
							<li>
								<a href="#two" data-toggle="tab">
									<span>规格与包装</span>
								</a>
							</li>
							<li>
								<a href="#three" data-toggle="tab">
									<span>售后保障</span>
								</a>
							</li>
							<li>
								<a href="#four" data-toggle="tab">
									<span>商品评价</span>
								</a>
							</li>
							<li>
								<a href="#five" data-toggle="tab">
									<span>手机社区</span>
								</a>
							</li>
						</ul>
						<div class="clearfix"></div>
						<div class="tab-content tab-wraped">
							<div id="one" class="tab-pane active">
								<ul class="goods-intro unstyled">
									<li>{{$goods_info['content']}}</li>
								</ul>
								<div class="intro-detail">
                                    @foreach($goods_images as $k=>$v)
                                        @foreach($v['goods_imgs'] as $kk=>$vv)
    									<img src="/{{$vv}}" width="1200" height="600" />
                                        @endforeach
                                    @endforeach
								</div>
							</div>
							<div id="two" class="tab-pane">
								<p>规格与包装</p>
							</div>
							<div id="three" class="tab-pane">
								<p>售后保障</p>
							</div>
							<div id="four" class="tab-pane">
								<p>商品评价</p>
							</div>
							<div id="five" class="tab-pane">
								<p>手机社区</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--like-->
			<div class="clearfix"></div>
			<div class="like">
				<h4 class="kt">猜你喜欢</h4>
				<div class="like-list">
					<ul class="yui3-g">
                        @foreach($history_goods as $k=>$v)
						<li class="yui3-u-1-6">
							<div class="list-wrap">
								<div class="p-img">
                                    <a href="/goods_list/{{$v['goods_id']}}">
									<img src="/{{$v['goods_img']}}" />
                                    </a>
								</div>
								<div class="attr" style="margin-bottom:50px;">
									<em>{{$v['goods_name']}}</em>
								</div>
								<div class="price">
									<strong>
											<em>¥</em>
											<i>{{$v['goods_price']}}</i>
										</strong>
								</div>
								<div class="commit">
									<i class="command">已有6人评价</i>
								</div>
							</div>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- 底部栏位 -->
	<!--页面底部-->
    <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/qtai/js/plugins/jquery.jqzoom/jquery.jqzoom.js"></script>
	<script type="text/javascript" src="/qtai/js/plugins/jquery.jqzoom/zoom.js"></script>
<script>
	$(function(){
		//点击+号数字加1
		$(document).on("click",".plus",function(){
			//获取加号
			var _this=$(this);
			//获取文本框的值
			var itxt=parseInt($(".itxt").val());
			//获取数据库的库存
			var goods_stock=parseInt(_this.parent().find("#goods_stock").attr("goods_stock"));
			//判断是否超过库存
			if(itxt>=goods_stock){
				_this.parent().find("#goods_stock").val(goods_stock);
				itxt=goods_stock;
			}else{
				itxt=itxt+1;
				_this.parent().find("#goods_stock").val(itxt);
			}

		})
		//点击-号数字减1
		$(document).on("click",".mins",function(){
			var _this=$(this);
			var itxt=parseInt($(".itxt").val());
			if(itxt<=1){
				itxt=1;
				_this.parent().find("#goods_stock").val(itxt);
			}else{
				itxt=itxt-1;
				_this.parent().find("#goods_stock").val(itxt);
			}
			
		})

		//获取文本框的值
		$(document).on("blur","#goods_stock",function(){
			//获取文本框
			var _this=$(this);
			//获取文本框的值
			var itxt=$(".itxt").val();
			//获取数据库的库存
			var goods_stock=_this.parent().find("#goods_stock").attr("goods_stock");
			//判断不能超库存
			//正则验证只能是数字
			var arr=/^\d{1,}$/;
			if(itxt==''){
				_this.val(1);
				itxt=1;
			}else if(!arr.test(itxt)){
				_this.val(1);
				itxt=1;
			}else if(parseInt(itxt)>=goods_stock){
				_this.val(goods_stock);
				itxt=goods_stock;
			}
		})

		//点击加入购物车
		$(document).on("click","#gwc",function(){
			var _this=$(this);
			//获取本页面的id
			var goods_id=_this.attr("goods_id");
			//获取文本框的数量
			var itxt=parseInt($(".itxt").val());
			//获取单个价格
			var price_one=_this.attr("goods_price");
			//获取商品总价
			var price_total=itxt*price_one;
			//sku
			var num=$("#dd").attr("num");
			// console.log(num);
			var sku="";
			for(var i=1;i<=num;i++){
				var attr_id=$("#attr_id_"+i).attr("attr_id");
				var val_id=$("#val_id_"+i).parents("#dl").find("[name='yanshi'][class='selected']").attr('val_id');
				if(!val_id==""){
					sku=sku+'['+attr_id+':'+val_id+'],';
				}
			}
			var cd=sku.length;
			sku=sku.substr(0,cd-1);
			// console.log(sku);
			var data={};
			data.goods_id=goods_id;
			data.itxt=itxt;
			data.price_total=price_total;
			data.price_one=price_one;
			data.sku=sku;
			$.ajax({
				url:'/shopping',
				data:data,
				dataType:"json",
				success:function(res){
					if(res.code==000000){
						alert(res.msg);
					}
					if(res.code==000002){
						alert(res.msg);
					}
				}
			})
		})
		//点击选框的样式
		$(document).on("click","#ys",function(){
			var _this=$(this);
			_this.parents('dl').find("[name='yanshi']").prop("class",'');
			_this.prop("class",'selected');
			
			//sku
			var num=$("#dd").attr("num");
			//获取本页面的id
			var goods_id=_this.attr("goods_id");
			//获取sku
			var sku="";
			for(var i=1;i<=num;i++){
				var attr_id=$("#attr_id_"+i).attr("attr_id");
				var val_id=$("#val_id_"+i).parents("#dl").find("[name='yanshi'][class='selected']").attr('val_id');
				if(!val_id==""){
					sku=sku+'['+attr_id+':'+val_id+'],';
				}
			}
			var cd=sku.length;
			sku=sku.substr(0,cd-1);
			$.ajax({
				url:'/sehao',
				data:{"sku":sku,"goods_id":goods_id},
				dataType:"json",
				success:function(res){
					if(res.code==000002){
						alert(res.msg);
					}
					
					var res=res;
					// console.log(res['price']);
					$("#aa").text(res['price']);
					// console.log(re);
				}
			})
		})
	})
</script>
	@endsection

@extends('layouts_q.tw_jz')
@section('title','详情')
@section('content')
    <link rel="stylesheet" type="text/css" href="/qtai/css/pages-item.css" />
    <link rel="stylesheet" type="text/css" href="/qtai/css/pages-zoom.css" />
	<div class="py-container">
		<div id="item">
			<div class="crumb-wrap">
				<ul class="sui-breadcrumb">
					<li>
						<a href="#">手机、数码、通讯</a>
					</li>
					<li>
						<a href="#">手机</a>
					</li>
					<li>
						<a href="#">Apple苹果</a>
					</li>
					<li class="active">iphone 6S系类</li>
				</ul>
			</div>
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
					<div class="news"><span>推荐选择下方[移动优惠购],手机套餐齐搞定,不用换号,每月还有花费返</span></div>
					<div class="summary">
						<div class="summary-wrap">
							<div class="fl title">
								<i>价　　格</i>
							</div>
							<div class="fl price">
								<i>¥</i>
								<em>{{$goods_info['goods_price']}}</em>
								<span>降价通知</span>
							</div>
							<div class="fr remark">
								<i>累计评价</i><em>{{$goods_info['goods_hits']}}</em>
							</div>
						</div>
						<div class="summary-wrap">
							<div class="fl title">
								<i>促　　销</i>
							</div>
							<div class="fl fix-width">
								<i class="red-bg">加价购</i>
								<em class="t-gray">满999.00另加20.00元，或满1999.00另加30.00元，或满2999.00另加40.00元，即可在购物车换
                                        购热销商品</em>
							</div>
						</div>
					</div>
					<div class="support">
						<div class="summary-wrap">
							<div class="fl title">
								<i>支　　持</i>
							</div>
							<div class="fl fix-width">
								<em class="t-gray">以旧换新，闲置手机回收  4G套餐超值抢  礼品购</em>
							</div>
						</div>
						<div class="summary-wrap">
							<div class="fl title">
								<i>配 送 至</i>
							</div>
							<div class="fl fix-width">
								<em class="t-gray">满999.00另加20.00元，或满1999.00另加30.00元，或满2999.00另加40.00元，即可在购物车换购热销商品</em>
							</div>
						</div>
					</div>
					<div class="clearfix choose">
						<div id="specification" class="summary-wrap clearfix">
							<dl>
								<dt>
									<div class="fl title">
									<i>选择颜色</i>
								</div>
								</dt>
								<dd><a href="javascript:;" class="selected">金色<span title="点击取消选择">&nbsp;</span>
                                    </a></dd>
								<dd><a href="javascript:;">银色</a></dd>
								<dd><a href="javascript:;">黑色</a></dd>
							</dl>
							<dl>
								<dt>
									<div class="fl title">
									<i>内存容量</i>
								</div>
								</dt>
								<dd><a href="javascript:;" class="selected">16G<span title="点击取消选择">&nbsp;</span>
                                    </a></dd>
								<dd><a href="javascript:;">64G</a></dd>
								<dd><a href="javascript:;" class="locked">128G</a></dd>
							</dl>
							<dl>
								<dt>
									<div class="fl title">
									<i>选择版本</i>
								</div>
								</dt>
								<dd><a href="javascript:;" class="selected">公开版<span title="点击取消选择">&nbsp;</span>
                                    </a></dd>
								<dd><a href="javascript:;">移动版</a></dd>							
							</dl>
							<dl>
								<dt>
									<div class="fl title">
									<i>购买方式</i>
								</div>
								</dt>
								<dd><a href="javascript:;" class="selected">官方标配<span title="点击取消选择">&nbsp;</span>
                                    </a></dd>
								<dd><a href="javascript:;">移动优惠版</a></dd>	
								<dd><a href="javascript:;"  class="locked">电信优惠版</a></dd>
							</dl>
							<dl>
								<dt>
									<div class="fl title">
									<i>套　　装</i>
								</div>
								</dt>
								<dd><a href="javascript:;" class="selected">保护套装<span title="点击取消选择">&nbsp;</span>
                                    </a></dd>
								<dd><a href="javascript:;"  class="locked">充电套装</a></dd>
							</dl>
						</div>
						<div class="summary-wrap">
							<div class="fl title">
								<div class="control-group">
									<div class="controls">
										<input autocomplete="off" type="text" value="1" minnum="1" class="itxt" />
										<a href="javascript:void(0)" class="increment plus">+</a>
										<a href="javascript:void(0)" class="increment mins">-</a>
									</div>
								</div>
							</div>
							<div class="fl">
								<ul class="btn-choose unstyled">
									<li>
										<a href="cart.html" target="_blank" class="sui-btn  btn-danger addshopcar">加入购物车</a>
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
							<ul class="part-list unstyled">
								<li>手机</li>
								<li>手机壳</li>
								<li>内存卡</li>
								<li>Iphone配件</li>
								<li>贴膜</li>
								<li>手机耳机</li>
								<li>移动电源</li>
								<li>平板电脑</li>
							</ul>
							<ul class="goods-list unstyled">
								<li>
									<div class="list-wrap">
										<div class="p-img">
											<img src="/qtai/img/_/part01.png" />
										</div>
										<div class="attr">
											<em>Apple苹果iPhone 6s (A1699)</em>
										</div>
										<div class="price">
											<strong>
											<em>¥</em>
											<i>6088.00</i>
										</strong>
										</div>
										<div class="operate">
											<a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
										</div>
									</div>
								</li>
								<li>
									<div class="list-wrap">
										<div class="p-img">
											<img src="/qtai/img/_/part02.png" />
										</div>
										<div class="attr">
											<em>Apple苹果iPhone 6s (A1699)</em>
										</div>
										<div class="price">
											<strong>
											<em>¥</em>
											<i>6088.00</i>
										</strong>
										</div>
										<div class="operate">
											<a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
										</div>
									</div>
								</li>
								<li>
									<div class="list-wrap">
										<div class="p-img">
											<img src="/qtai/img/_/part03.png" />
										</div>
										<div class="attr">
											<em>Apple苹果iPhone 6s (A1699)</em>
										</div>
										<div class="price">
											<strong>
											<em>¥</em>
											<i>6088.00</i>
										</strong>
										</div>
										<div class="operate">
											<a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
										</div>
									</div>
									<div class="list-wrap">
										<div class="p-img">
											<img src="/qtai/img/_/part02.png" />
										</div>
										<div class="attr">
											<em>Apple苹果iPhone 6s (A1699)</em>
										</div>
										<div class="price">
											<strong>
											<em>¥</em>
											<i>6088.00</i>
										</strong>
										</div>
										<div class="operate">
											<a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
										</div>
									</div>
									<div class="list-wrap">
										<div class="p-img">
											<img src="/qtai/img/_/part03.png" />
										</div>
										<div class="attr">
											<em>Apple苹果iPhone 6s (A1699)</em>
										</div>
										<div class="price">
											<strong>
											<em>¥</em>
											<i>6088.00</i>
										</strong>
										</div>
										<div class="operate">
											<a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<div id="profile" class="tab-pane">
							<p>推荐品牌</p>
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
	@endsection

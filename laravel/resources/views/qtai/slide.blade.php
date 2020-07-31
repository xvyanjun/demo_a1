@extends('layouts_q.tw_jz')
@section('title','列表展示')
@section('content')
<link rel="stylesheet" type="text/css" href="/qtai/css/pages-seckill-index.css" />
<script type="text/javascript" src="/qtai/js/pages/seckill-index.js"></script>
{{--<script>--}}
	   {{--$(function(){--}}
		   {{--$("#code").hover(function(){--}}
			   {{--$(".erweima").show();--}}
		   {{--},function(){--}}
			   {{--$(".erweima").hide();--}}
		   {{--});--}}
	   {{--})--}}
	{{--</script>--}}
{{--</body>--}}

	<div class="py-container index">
		<!--banner-->
		<div class="banner" style="text-align:center;">
			<img src="{{$slide_info['slide_img']}}" width="1200px" height="300px" class="img-responsive" alt="">
		</div>

		<!--商品列表-->
		<div class="goods-list">
			<ul class="seckill" id="seckill">
                @foreach($goods_info as $k=>$v)
				<li class="seckill-item">
					<div class="pic">
                        <a href="/goods_list/{{$v['goods_id']}}"><img src="/{{$v['goods_img']}}" width="283" height="290" alt=''></a>
					</div>
					<div class="intro"><span>{{$v['goods_name']}}</span></div>
					<div class='price'><b class='sec-price'>￥{{$v['goods_price']}}</b></div>
					<div class='num'>
						{{--<div>已售87%</div>--}}
						{{--<div class='progress'>--}}
							{{--<div class='sui-progress progress-danger'><span style='width: 70%;' class='bar'></span></div>--}}
						{{--</div>--}}
						<div>剩余<b class='owned'>{{$v['goods_stock']}}</b>件</div>
					</div>
					<a class='sui-btn btn-block btn-buy' href='/goods_list/{{$v['goods_id']}}'>立即抢购</a>
				</li>
                @endforeach
				{{--<li class="seckill-item">--}}
					{{--<div class="pic">--}}
						{{--<img src="img/_/list.jpg" alt=''>--}}
					{{--</div>--}}
					{{--<div class="intro"><span>Apple苹果iPhone 6s 32G金色 移动联通电信4G手机</span></div>--}}
					{{--<div class='price'><b class='sec-price'>￥6088</b><b class='ever-price'>￥6988</b></div>--}}
					{{--<div class='num'>--}}
						{{--<div>已售87%</div>--}}
						{{--<div class='progress'>--}}
							{{--<div class='sui-progress progress-danger'><span style='width: 70%;' class='bar'></span></div>--}}
						{{--</div>--}}
						{{--<div>剩余<b class='owned'>29</b>件</div>--}}
					{{--</div>--}}
					{{--<a class='sui-btn btn-block btn-buy' href='seckill-item.html' target='_blank'>立即抢购</a>--}}
				{{--</li>--}}
				{{--<li class="seckill-item">--}}
					{{--<div class="pic">--}}
						{{--<img src="img/_/list.jpg" alt=''>--}}
					{{--</div>--}}
					{{--<div class="intro"><span>Apple苹果iPhone 6s 32G金色 移动联通电信4G手机</span></div>--}}
					{{--<div class='price'><b class='sec-price'>￥6088</b><b class='ever-price'>￥6988</b></div>--}}
					{{--<div class='num'>--}}
						{{--<div>已售87%</div>--}}
						{{--<div class='progress'>--}}
							{{--<div class='sui-progress progress-danger'><span style='width: 70%;' class='bar'></span></div>--}}
						{{--</div>--}}
						{{--<div>剩余<b class='owned'>29</b>件</div>--}}
					{{--</div>--}}
					{{--<a class='sui-btn btn-block btn-buy' href='seckill-item.html' target='_blank'>立即抢购</a>--}}
				{{--</li>--}}
				{{--<li class="seckill-item">--}}
					{{--<div class="pic">--}}
						{{--<img src="img/_/list.jpg" alt=''>--}}
					{{--</div>--}}
					{{--<div class="intro"><span>Apple苹果iPhone 6s 32G金色 移动联通电信4G手机</span></div>--}}
					{{--<div class='price'><b class='sec-price'>￥6088</b><b class='ever-price'>￥6988</b></div>--}}
					{{--<div class='num'>--}}
						{{--<div>已售87%</div>--}}
						{{--<div class='progress'>--}}
							{{--<div class='sui-progress progress-danger'><span style='width: 70%;' class='bar'></span></div>--}}
						{{--</div>--}}
						{{--<div>剩余<b class='owned'>29</b>件</div>--}}
					{{--</div>--}}
					{{--<a class='sui-btn btn-block btn-buy' href='seckill-item.html' target='_blank'>立即抢购</a>--}}
				{{--</li>--}}
				{{--<li class="seckill-item">--}}
					{{--<div class="pic">--}}
						{{--<img src="img/_/list.jpg" alt=''>--}}
					{{--</div>--}}
					{{--<div class="intro"><span>Apple苹果iPhone 6s 32G金色 移动联通电信4G手机</span></div>--}}
					{{--<div class='price'><b class='sec-price'>￥6088</b><b class='ever-price'>￥6988</b></div>--}}
					{{--<div class='num'>--}}
						{{--<div>已售87%</div>--}}
						{{--<div class='progress'>--}}
							{{--<div class='sui-progress progress-danger'><span style='width: 70%;' class='bar'></span></div>--}}
						{{--</div>--}}
						{{--<div>剩余<b class='owned'>29</b>件</div>--}}
					{{--</div>--}}
					{{--<a class='sui-btn btn-block btn-buy' href='seckill-item.html' target='_blank'>立即抢购</a>--}}
				{{--</li>--}}
				{{--<li class="seckill-item">--}}
					{{--<div class="pic">--}}
						{{--<img src="img/_/list.jpg" alt=''>--}}
					{{--</div>--}}
					{{--<div class="intro"><span>Apple苹果iPhone 6s 32G金色 移动联通电信4G手机</span></div>--}}
					{{--<div class='price'><b class='sec-price'>￥6088</b><b class='ever-price'>￥6988</b></div>--}}
					{{--<div class='num'>--}}
						{{--<div>已售87%</div>--}}
						{{--<div class='progress'>--}}
							{{--<div class='sui-progress progress-danger'><span style='width: 70%;' class='bar'></span></div>--}}
						{{--</div>--}}
						{{--<div>剩余<b class='owned'>29</b>件</div>--}}
					{{--</div>--}}
					{{--<a class='sui-btn btn-block btn-buy' href='seckill-item.html' target='_blank'>立即抢购</a>--}}
				{{--</li>--}}
				{{--<li class="seckill-item">--}}
					{{--<div class="pic">--}}
						{{--<img src="img/_/list.jpg" alt=''>--}}
					{{--</div>--}}
					{{--<div class="intro"><span>Apple苹果iPhone 6s 32G金色 移动联通电信4G手机</span></div>--}}
					{{--<div class='price'><b class='sec-price'>￥6088</b><b class='ever-price'>￥6988</b></div>--}}
					{{--<div class='num'>--}}
						{{--<div>已售87%</div>--}}
						{{--<div class='progress'>--}}
							{{--<div class='sui-progress progress-danger'><span style='width: 70%;' class='bar'></span></div>--}}
						{{--</div>--}}
						{{--<div>剩余<b class='owned'>29</b>件</div>--}}
					{{--</div>--}}
					{{--<a class='sui-btn btn-block btn-buy' href='seckill-item.html' target='_blank'>立即抢购</a>--}}
				{{--</li>--}}
				{{--<li class="seckill-item">--}}
					{{--<div class="pic">--}}
						{{--<img src="img/_/list.jpg" alt=''>--}}
					{{--</div>--}}
					{{--<div class="intro"><span>Apple苹果iPhone 6s 32G金色 移动联通电信4G手机</span></div>--}}
					{{--<div class='price'><b class='sec-price'>￥6088</b><b class='ever-price'>￥6988</b></div>--}}
					{{--<div class='num'>--}}
						{{--<div>已售87%</div>--}}
						{{--<div class='progress'>--}}
							{{--<div class='sui-progress progress-danger'><span style='width: 70%;' class='bar'></span></div>--}}
						{{--</div>--}}
						{{--<div>剩余<b class='owned'>29</b>件</div>--}}
					{{--</div>--}}
					{{--<a class='sui-btn btn-block btn-buy' href='seckill-item.html' target='_blank'>立即抢购</a>--}}
				{{--</li>--}}
				{{--<li class="seckill-item">--}}
					{{--<div class="pic">--}}
						{{--<img src="img/_/list.jpg" alt=''>--}}
					{{--</div>--}}
					{{--<div class="intro"><span>Apple苹果iPhone 6s 32G金色 移动联通电信4G手机</span></div>--}}
					{{--<div class='price'><b class='sec-price'>￥6088</b><b class='ever-price'>￥6988</b></div>--}}
					{{--<div class='num'>--}}
						{{--<div>已售87%</div>--}}
						{{--<div class='progress'>--}}
							{{--<div class='sui-progress progress-danger'><span style='width: 70%;' class='bar'></span></div>--}}
						{{--</div>--}}
						{{--<div>剩余<b class='owned'>29</b>件</div>--}}
					{{--</div>--}}
					{{--<a class='sui-btn btn-block btn-buy' href='seckill-item.html' target='_blank'>立即抢购</a>--}}
				{{--</li>--}}
				{{--<li class="seckill-item">--}}
					{{--<div class="pic">--}}
						{{--<img src="img/_/list.jpg" alt=''>--}}
					{{--</div>--}}
					{{--<div class="intro"><span>Apple苹果iPhone 6s 32G金色 移动联通电信4G手机</span></div>--}}
					{{--<div class='price'><b class='sec-price'>￥6088</b><b class='ever-price'>￥6988</b></div>--}}
					{{--<div class='num'>--}}
						{{--<div>已售87%</div>--}}
						{{--<div class='progress'>--}}
							{{--<div class='sui-progress progress-danger'><span style='width: 70%;' class='bar'></span></div>--}}
						{{--</div>--}}
						{{--<div>剩余<b class='owned'>29</b>件</div>--}}
					{{--</div>--}}
					{{--<a class='sui-btn btn-block btn-buy' href='seckill-item.html' target='_blank'>立即抢购</a>--}}
				{{--</li>--}}
				{{--<li class="seckill-item">--}}
					{{--<div class="pic">--}}
						{{--<img src="img/_/list.jpg" alt=''>--}}
					{{--</div>--}}
					{{--<div class="intro"><span>Apple苹果iPhone 6s 32G金色 移动联通电信4G手机</span></div>--}}
					{{--<div class='price'><b class='sec-price'>￥6088</b><b class='ever-price'>￥6988</b></div>--}}
					{{--<div class='num'>--}}
						{{--<div>已售87%</div>--}}
						{{--<div class='progress'>--}}
							{{--<div class='sui-progress progress-danger'><span style='width: 70%;' class='bar'></span></div>--}}
						{{--</div>--}}
						{{--<div>剩余<b class='owned'>29</b>件</div>--}}
					{{--</div>--}}
					{{--<a class='sui-btn btn-block btn-buy' href='seckill-item.html' target='_blank'>立即抢购</a>--}}
				{{--</li>--}}
				{{--<li class="seckill-item">--}}
					{{--<div class="pic">--}}
						{{--<img src="img/_/list.jpg" alt=''>--}}
					{{--</div>--}}
					{{--<div class="intro"><span>Apple苹果iPhone 6s 32G金色 移动联通电信4G手机</span></div>--}}
					{{--<div class='price'><b class='sec-price'>￥6088</b><b class='ever-price'>￥6988</b></div>--}}
					{{--<div class='num'>--}}
						{{--<div>已售87%</div>--}}
						{{--<div class='progress'>--}}
							{{--<div class='sui-progress progress-danger'><span style='width: 70%;' class='bar'></span></div>--}}
						{{--</div>--}}
						{{--<div>剩余<b class='owned'>29</b>件</div>--}}
					{{--</div>--}}
					{{--<a class='sui-btn btn-block btn-buy' href='seckill-item.html' target='_blank'>立即抢购</a>--}}
				{{--</li>--}}


			</ul>
		</div>
		<div class="cd-top">
			<div class="top">
				<img src="/qtai/img/_/gotop.png" />
				<b>TOP</b>
			</div>
			<div class="code" id="code">
				<span><img src="/qtai/img/_/code.png"/></span>
			</div>
			<div class="erweima">
				<img src="/qtai/img/_/erweima.jpg" alt="">
				<s></s>
			</div>
		</div>
	</div>

@endsection
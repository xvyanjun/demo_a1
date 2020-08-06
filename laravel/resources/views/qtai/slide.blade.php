@extends('layouts_q.tw_jz')
@section('title','列表展示')
@section('content')
<link rel="stylesheet" type="text/css" href="/qtai/css/pages-seckill-index.css" />
<script type="text/javascript" src="/qtai/js/pages/seckill-index.js"></script>

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
					</div>
					<a class='sui-btn btn-block btn-buy' href='/goods_list/{{$v['goods_id']}}'>查看详情</a>
				</li>
                @endforeach
			</ul>
		</div>

	</div>

@endsection
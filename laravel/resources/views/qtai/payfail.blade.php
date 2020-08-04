@extends('layouts_q.tw_3')
@section('title','支付失败')
@section('content')				
		<div class="cart py-container">
			<!--logoArea-->
			<div class="logoArea">
				<div class="fl logo"><span class="title">支付失败</span></div>
			</div>
			<!--主内容-->
			<div class="payfail">
				<div class="fail">
					<h3><img src="/qtai/img/_/fail.png" width="48" height="48">　支付失败，请稍后再试</h3>
					<div class="fail-text">
					<p>订单号：{{$out_trade_no}}</p>
					<p>您可以先去　<a href="/" target="_blank">首页</a>　逛逛</p>
					<p class="button"><a href="/eva_zfu?order_id={{$shop_order_all['order_id']}}" class="sui-btn btn-xlarge btn-danger">重新支付</a></p>
				    </div>
				</div>
				
			</div>
		</div>
@endsection		
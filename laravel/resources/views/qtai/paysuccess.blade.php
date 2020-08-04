@extends('layouts_q.tw_3')
@section('title','支付成功')
@section('content')		
		<div class="cart py-container">
			<!--logoArea-->
			<div class="logoArea">
				<div class="fl logo"><span class="title">支付成功</span></div>
			</div>
			<!--主内容-->
			<div class="paysuccess">
				<div class="success">
					<h3><img src="/qtai/img/_/right.png" width="48" height="48">　恭喜您，支付成功！</h3>
					<div class="paydetail">
					<p>支付方式：支付宝</p>
					<p>订单号&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;{{$out_trade_no}}</p>
					<p>支付金额：￥{{$total_prices_s}}元</p>
					<p class="button"><a href="/center" class="sui-btn btn-xlarge btn-danger">查看订单</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/" class="sui-btn btn-xlarge ">继续购物</a></p>
				    </div>
				</div>
				
			</div>
		</div>
@endsection

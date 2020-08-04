@extends('layouts_q.tw_3')
@section('title','订单提交成功-前往支付')
@section('content')
		<div class="cart py-container">
			<!--logoArea-->
			<div class="logoArea">
				<div class="fl logo"><span class="title">订单提交成功</span></div>

			</div>
			<!--主内容-->
			<div class="checkout py-container  pay">
				<div class="checkout-tit">
					<h4 class="fl tit-txt"><span class="success-icon"></span><span  class="success-info">订单提交成功，请您及时付款！订单号：{{$order_all['order_sn']}}</span></h4>
                    <span class="fr"><em class="sui-lead">应付金额：</em><em  class="orange money">￥{{$order_all['order_amount']}}&nbsp;</em>元</span>
					<div class="clearfix"></div>
					<div>
					<p class="button">
						<a href="javascript:;" id='zfu' order_id="{{$order_all['order_id']}}" class="sui-btn btn-xlarge btn-danger">支付宝支付</a>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="/" class="sui-btn btn-xlarge ">继续购物</a>
					</p>
				</div>
				</div>				
			</div>

		</div>
		<script>
//----------------------------------------------------------------------------
          $(document).on('click','#zfu',function(){
          	var order_id=$(this).attr('order_id');
          	var zz=/^\d{1,}$/;
          	if(!zz.test(order_id)||order_id>=1){
          		location.href='/eva_zfu?order_id='+order_id;
          	}else{
          		console.log('id获取失败');
          	}
          });
//----------------------------------------------------------------------------							

//----------------------------------------------------------------------------

//----------------------------------------------------------------------------
		</script>
@endsection

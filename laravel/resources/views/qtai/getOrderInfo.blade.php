@extends('layouts_q.cart_jz')
@section('title','结算')
@section('content')
		<div class="checkout py-container">
			<div class="checkout-tit">
				<h4 class="tit-txt">填写并核对订单信息</h4>
			</div>
			<div class="checkout-steps">
				<!--收件人信息-->
				<div class="step-tit"><!--data-toggle="modal" data-target=".edit" data-keyboard="false"-->
					<h5>收件人信息<span><a  href='/add_list'   class="newadd">新增收货地址</a></span></h5>
				</div>
				<div class="step-cont">
					<div class="addressInfo">
						<ul class="addr-detail">
							<li class="addr-item">
							@foreach($address_list as $r1=>$r2)
							 <div id='dz_test'>
								<div id='dzhi_2556' name='jk_233' address_id="{{$r2['address_id']}}" class="{{$r2['address_common']=='2'?'con name selected':'con name'}}"><a href="javascript:;" id='vl_e1'>{{$r2['address_name']}}<span title="点击取消选择">&nbsp;</span></a></div>
								<div class="con address">
									<span id='vl_e2'>
									{{$r2['y_province']['name']}}-{{$r2['y_city']['name']}}-{{$r2['y_district']['name']}}:{{$r2['address_addre']}} 
									</span>
									<span id='vl_e3'>{{mb_substr($r2['address_tel'],0,3)}}****{{mb_substr($r2['address_tel'],7,10)}}</span>
                                @if($r2['address_common']=='2')
                                <span class="base">默认地址</span>
                                @endif  
								<span class="edittext"><a data-toggle="modal" data-target=".edit" data-keyboard="false" >编辑</a>&nbsp;&nbsp;<a href="javascript:;">删除</a></span>
								</div>
								<div class="clearfix"></div>
							  </div>
                             @endforeach
							</li>
							
						</ul>
						<!--添加地址-->
                          <div  tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade edit">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
						        <h4 id="myModalLabel" class="modal-title">添加收货地址</h4>
						      </div>
						      <div class="modal-body">
						      	<form action="" class="sui-form form-horizontal">
						      		 <div class="control-group">
									    <label class="control-label">收货人：</label>
									    <div class="controls">
									      <input type="text" class="input-medium">
									    </div>
									  </div>
									   
									   <div class="control-group">
									    <label class="control-label">详细地址：</label>
									    <div class="controls">
									      <input type="text" class="input-large">
									    </div>
									  </div>
									   <div class="control-group">
									    <label class="control-label">联系电话：</label>
									    <div class="controls">
									      <input type="text" class="input-medium">
									    </div>
									  </div>
									   <div class="control-group">
									    <label class="control-label">邮箱：</label>
									    <div class="controls">
									      <input type="text" class="input-medium">
									    </div>
									  </div>
									   <div class="control-group">
									    <label class="control-label">地址别名：</label>
									    <div class="controls">
									      <input type="text" class="input-medium">
									    </div>
									    <div class="othername">
									    	建议填写常用地址：<a href="#" class="sui-btn btn-default">家里</a>　<a href="#" class="sui-btn btn-default">父母家</a>　<a href="#" class="sui-btn btn-default">公司</a>
									    </div>
									  </div>
									  
						      	</form>
						      	
						      	
						      </div>
						      <div class="modal-footer">
						        <button type="button" data-ok="modal" class="sui-btn btn-primary btn-large">确定</button>
						        <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
						      </div>
						    </div>
						  </div>
						</div>
						 <!--确认地址-->
					</div>
					<div class="hr"></div>
					
				</div>
				<div class="hr"></div>
				<!--支付和送货-->
				<div class="payshipInfo">
					<div class="step-tit">
						<h5>支付方式</h5>
					</div>
					<div class="step-cont">
						<ul class="payType">
							<li class="selected">支付宝<span title="点击取消选择"></span></li>
							<!-- <li>货到付款<span title="点击取消选择"></span></li> -->
						</ul>
					</div>
					<div class="hr"></div>
					<div class="step-tit">
						<h5>送货清单</h5>
					</div>
					<div class="step-cont">
						<ul class="send-detail">
							@foreach($cat_list as $y=>$u)
							<li>
								<div class="sendGoods">
									
									<ul class="yui3-g">
										<li class="yui3-u-1-6">
											<span><img style="width:82px;height:82px" src="{{$u['goods_id']['goods_img']}}"/></span>
										</li>
										<li class="yui3-u-7-12">
											<div class="desc" title="{{$u['goods_id']['goods_name']}}">{{mb_substr($u['goods_id']['goods_name'],0,9)}}</div>
											<div class="seven" name='trolley_up' trolley_id="{{$u['trolley_id']}}">&nbsp;</div>
										</li>
										<li class="yui3-u-1-12">
											<div class="price">单价￥:{{$u['price_one']}}</div>
										</li>
										<li class="yui3-u-1-12">
											<div class="num">X{{$u['goods_num']}}</div>
										</li>
										<li class="yui3-u-1-12">
											<div class="exit">总价￥:{{$u['price_total']}}</div>
										</li>
									</ul>
								</div>
							</li>
							@endforeach
						</ul>
					</div>
					<div class="hr"></div>
				</div>
			</div>
		</div>
		<div class="order-summary">
			<div class="static fr">
				<div class="list">
					<span><i class="number">{{$up_s['num_up']}}</i>件商品，总商品金额</span>
					<em class="allprice">¥{{$up_s['price_up']}}</em>
				</div>
			</div>
		</div>
		@php
		 $t_1='';
		 $t_2='';
		 $t_3='';
         foreach($address_list as $u1=>$u2){
           if($u2['address_common']=='2'){
              $t_1=$u2['address_name'];
              $t_2=$u2['y_province']['name'].'-'.$u2['y_city']['name'].'-'.$u2['y_district']['name'].':'.$u2['address_addre'];
              $t_3=mb_substr($u2['address_tel'],0,3).'****'.mb_substr($u2['address_tel'],7,9);
           }
         }
		@endphp
		<div class="clearfix trade">
			<div class="fc-price">应付金额:　<span class="price">¥{{$up_s['price_up']}}</span></div>
			<div class="fc-receiverInfo">寄送至:<span id='vl_t1'>{{$t_2}}</span>&nbsp;收货人:<span id='vl_t2'>{{$t_1}}</span>&nbsp;<span id='vl_t3'>{{$t_3}}</span></div>
		</div>
		<div class="submit">
			<a class="sui-btn btn-danger btn-xlarge" href="javascript:;" id='all_up'>提交订单</a>
		</div>
		<script>
//---------------------------------------------------------------------			
//订单地址
         $(document).on('click','#dzhi_2556',function(){
						$("[name='jk_233']").prop('class','con name');
						$(this).prop('class','con name selected');
						var a1=$(this).parents("#dz_test").find("#vl_e1").text().trim();
						var a2=$(this).parents("#dz_test").find("#vl_e2").text().trim();
						var a3=$(this).parents("#dz_test").find("#vl_e3").text().trim();
						$("#vl_t1").text(a2);
						$("#vl_t2").text(a1);
						$("#vl_t3").text(a3);
						// console.log(a1,a2,a3);
         });
//---------------------------------------------------------------------	
//订单	
         $(document).on('click','#all_up',function(){
						var address_id='';
						$("[name='jk_233']").each(function(){
								var sf=$(this).prop('class');
										if(sf=='con name selected'){
											address_id+=$(this).attr('address_id');
										}
						});
						var trolley_id='';
						$("[name='trolley_up']").each(function(){
							trolley_id=trolley_id+$(this).attr('trolley_id')+',';
						});
						var cd=trolley_id.length;
								trolley_id=trolley_id.substr(0,cd-1);
						// console.log('地址id:',address_id,'购物车id:',trolley_id);
						//判断地址不能为空
						if(address_id=="" || address_id<=0){
							alert("没有订单地址");
						}
						//判断地址不能为空
						if(trolley_id=="" || trolley_id<=0){
							alert("请您至少选择一件商品");
							location.href="/cart";
						}
						$.ajax({
							url:"/orderAdd",
							data:{"trolley_id":trolley_id,"address_id":address_id},
							dataType:"json",
							success:function(res){
								if(res.code==000000){
									alert(res.msg);
									location.href='/paysuccess?order_id='+res['order_id'];
									console.log(res);
								}
							}
						})
         });
//---------------------------------------------------------------------	
		</script>
@endsection
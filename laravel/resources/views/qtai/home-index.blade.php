@extends('layouts_q.tw_jz')
@section('title','个人中心首页')
@section('content')
<script type="text/javascript" src="/qtai/js/plugins/jquery/jquery.min.js"></script>
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
<script type="text/javascript" src="/qtai/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/qtai/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/qtai/js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="/qtai/js/widget/nav.js"></script>
</body>
    <!--header-->
    <div id="account">
        <div class="py-container">
            <div class="yui3-g home">
                <!--左侧列表-->
               <div class="yui3-u-1-6 list">

<link rel="stylesheet" type="text/css" href="/qtai/css/pages-seckillOrder.css" />

                    <div class="person-info">
                        <div class="person-photo"><img src="/qtai/img/_/photo.png" alt=""></div>
                        <div class="person-account">
                            <span class="name">Michelle</span>
                            <span class="safe">账户安全</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="list-items">
                        <dl>
                            <dt><i>·</i> 订单中心</dt>
                            <dd ><a href="/center"  class="list-active" >我的订单</a></dd>
                            <dd><a href="/home_order_pay" class="" >待付款</a></dd>
                            <dd><a href="/home_order_send"  class="" >待发货</a></dd>
                            <dd><a href="home-order-receive.html" class="" >待收货</a></dd>
                            <!-- <dd><a href="home-order-evaluate.html"  class="list-active" >待评价</a></dd> -->
                        </dl>
                        <dl>
                            <dt><i>·</i> 我的中心</dt>
                            <dd><a href="/shop_user_list/collect" >我的收藏</a></dd>
                            <dd><a href="/shop_user_list/history" >我的足迹</a></dd>
                        </dl>
                        <dl>
                            <dt><i>·</i> 设置</dt>
                            <dd><a href="/add" class="">个人信息</a></dd>
                            <dd><a href="/add_list">地址管理</a></dd>
                            <dd><a href="/lists">安全管理</a></dd>
                        </dl>
                    </div>
                </div>
                <!--右侧主内容-->
                <div class="yui3-u-5-6 order-pay">
                    <div class="body">
                        <div class="table-title">
                            <table class="sui-table  order-table">
                                <tr>
                                    <thead>
                                        <th width="35%">宝贝</th>
                                        <th width="5%">单价</th>
                                        <th width="5%">数量</th>
                                        <th width="8%">商品操作</th>
                                        <th width="10%">实付款</th>
                                        <th width="10%">交易状态</th>
                                        <th width="10%">交易操作</th>
                                    </thead>
                                </tr>
                            </table>
                        </div>
                        <div class="order-detail">
                            <div class="orders">
                                <div class="choose-order">
                                    <div class="sui-pagination pagination-large top-pages">
                                        <ul>
                                            <li class="prev disabled"><a href="#">上一页</a></li>

                                            <li class="next"><a href="#">下一页</a></li>
                                        </ul>
                                    </div>
                                </div>

								<!--order1-->
                                <div class="order-detail">
                            <div class="orders">                        
                                <!-- eva_list -->
                                @foreach($shop_order as $g1=>$g2)
                                 @if($g2['cd']==1)
                                <div class="choose-title">
                                    <label data-toggle="checkbox" class="checkbox-pretty ">
                                           <input type="checkbox" checked="checked"><span>{{date('Y-m-d H:i',$g2['bast_time'])}}　订单编号：{{$g2['order_sn']}}  </span>
                                     </label>
                                    <!-- <a class="sui-btn btn-info share-btn">分享</a> -->
                                </div>
                                <table class="sui-table table-bordered order-datatable">
                                    <tbody>
                                        @foreach($g2['order_details'] as $vs1=>$vs2)
                                        <tr>
                                            <td width="35%">
                                                <div class="typographic"><img style="width:80px;height:80px;" src="{{$vs2['goods_id']['goods_img']}}" />
                                                    <a href="javascript:;" class="block-text">{{$vs2['goods_id']['goods_name']}}
                                                    </a>
                                                    <br>
                                                    <span class="guige">
                                                        属性:
                                                        @foreach($vs2['sku']['sku'] as $fg1=>$fg2)
                                                         @if($fg1==0)
                                                          /{{$fg2['val_name']}}/
                                                         @else
                                                          {{$fg2['val_name']}}/
                                                         @endif
                                                        @endforeach
                                                    </span>
                                                </div>
                                            </td>
                                            <td width="5%" class="center">
                                                <ul class="unstyled">
                                                    <li>¥{{$vs2['sku']['price']}}</li>
                                                </ul>
                                            </td>
                                            <td width="5%" class="center">{{$vs2['buy_number']}}</td>
                                            @php 
                                             $status_eva='';
                                             if($g2['pay_status']=='0'){
                                             $status_eva='已取消';
                                             }else if($g2['pay_status']=='1'){
                                             $status_eva='待付款';
                                             }else if($g2['pay_status']=='2'){
                                             $status_eva='待发货';
                                             }else if($g2['pay_status']=='3'){
                                             $status_eva='待收货';
                                             }else if($g2['pay_status']=='4'){
                                             $status_eva='已完成订单';
                                             }

                                             $goods_one='';
                                             if($vs2['datails_status']=='0'){
                                             $goods_one='已取消.';
                                             }else if($vs2['datails_status']=='1'){
                                             $goods_one='待付款.';
                                             }else if($vs2['datails_status']=='2'){
                                             $goods_one='待发货.';
                                             }else if($vs2['datails_status']=='3'){
                                             $goods_one='待收货.';
                                             }else if($vs2['datails_status']=='4'){
                                             $goods_one='已收货.';
                                             }
                                            @endphp
                                            <td width="8%" class="center">
                                                <ul class="unstyled">
                                                    <li>{{$goods_one}}</li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center">
                                                <ul class="unstyled">
                                                    <li>¥{{$g2['order_amount']}}</li>
                                                    <!-- <li>（含运费：￥0.00）</li> -->
                                                </ul>
                                            </td>
                                            <td width="10%" class="center">
                                                <ul class="unstyled">
                                                    <li>{{$status_eva}}</li>
                                                    <!-- <li><a href="orderDetail.html" class="btn">订单详情 </a></li> -->
                                                </ul>


                                            </td>
                                            <td width="10%" class="center">
                                                <ul class="unstyled">
                                                    <li><a href="#" class="sui-btn btn-info">立即付款</a></li>
                                                    <li><a href="#">取消订单</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                 @else
                                <div class="choose-title">
                                    <label data-toggle="checkbox" class="checkbox-pretty ">
                                           <input type="checkbox" checked="checked"><span>
                                           {{date('Y-m-d H:i',$g2['bast_time'])}}　订单编号：{{$g2['order_sn']}}</span>
                                     </label>
                                      <!-- <a class="sui-btn btn-info share-btn">分享</a> -->
                                </div>
                                   
                                <table class="sui-table table-bordered order-datatable">
                                    <tbody>
                                        @foreach($g2['order_details'] as $v1=>$v2)
                                         @if($v1==0)
                                        <tr>
                                            <td width="35%">
                                                <div class="typographic"><img style="width:80px;height:80px;" src="{{$v2['goods_id']['goods_img']}}" />
                                                    <a href="javascript:;" class="block-text">{{$v2['goods_id']['goods_name']}}
                                                    </a>
                                                    <br>
                                                    <span class="guige">
                                                    属性: 
                                                    @foreach($v2['sku']['sku'] as $fg_1=>$fg_2)
                                                         @if($fg_1==0)
                                                          /{{$fg_2['val_name']}}/
                                                         @else
                                                          {{$fg_2['val_name']}}/
                                                         @endif
                                                    @endforeach
                                                    </span>
                                                </div>
                                            </td>
                                            <td width="5%" class="center">
                                                <ul class="unstyled">
                                                    <li>¥{{$v2['sku']['price']}}</li>
                                                </ul>
                                            </td>
                                            <td width="5%" class="center">{{$v2['buy_number']}}</td>
                                            @php 
                                             $status_eva_s='';
                                             if($g2['pay_status']=='0'){
                                             $status_eva_s='已取消';
                                             }else if($g2['pay_status']=='1'){
                                             $status_eva_s='待付款';
                                             }else if($g2['pay_status']=='2'){
                                             $status_eva_s='待发货';
                                             }else if($g2['pay_status']=='3'){
                                             $status_eva_s='待收货';
                                             }else if($g2['pay_status']=='4'){
                                             $status_eva_s='已完成订单';
                                             }

                                             $goods_one_s='';
                                             if($v2['datails_status']=='0'){
                                             $goods_one_s='已取消.';
                                             }else if($v2['datails_status']=='1'){
                                             $goods_one_s='待付款.';
                                             }else if($v2['datails_status']=='2'){
                                             $goods_one_s='待发货.';
                                             }else if($v2['datails_status']=='3'){
                                             $goods_one_s='待收货.';
                                             }else if($v2['datails_status']=='4'){
                                             $goods_one_s='已收货.';
                                             }
                                            @endphp
                                            <td width="8%" class="center">
                                                <ul class="unstyled">
                                                    <li>{{$goods_one_s}}</li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center" rowspan="{{$g2['cd']}}">
                                                <ul class="unstyled">
                                                    <li>¥{{$g2['order_amount']}}</li>
                                                    <!-- <li>（含运费：￥0.00）</li> -->
                                                </ul>
                                            </td>
                                            <td width="10%" class="center" rowspan="{{$g2['cd']}}">
                                                <ul class="unstyled">
                                                    <li>{{$status_eva_s}}</li>
                                                    <!-- <li><a href="orderDetail.html" class="btn">订单详情 </a></li> -->
                                                </ul>
                                            </td>
                                            <td width="10%" class="center" rowspan="{{$g2['cd']}}">
                                                <ul class="unstyled">
                                                    <li><a href="#" class="sui-btn btn-info">立即付款</a></li>
                                                    <li><a href="#">取消订单</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                         @else
                                        <tr>
                                            <td width="35%">
                                                <div class="typographic"><img style="width:80px;height:80px;" src="{{$v2['goods_id']['goods_img']}}" />
                                                    <a href="javascript:;" class="block-text">{{$v2['goods_id']['goods_name']}}
                                                    </a>
                                                    <br>
                                                    <span class="guige">
                                                    属性:    
                                                    @foreach($v2['sku']['sku'] as $fg_s1=>$fg_s2)
                                                         @if($fg_s1==0)
                                                          /{{$fg_s2['val_name']}}/
                                                         @else
                                                          {{$fg_s2['val_name']}}/
                                                         @endif
                                                    @endforeach
                                                    </span>
                                                </div>
                                            </td>
                                            <td width="5%" class="center">
                                                <ul class="unstyled">
                                                    <li>¥{{$v2['sku']['price']}}</li>
                                                </ul>
                                            </td>
                                            <td width="5%" class="center">{{$v2['buy_number']}}</td>
                                            @php 
                                             $goods_one_s_s='';
                                             if($v2['datails_status']=='0'){
                                             $goods_one_s_s='已取消.';
                                             }else if($v2['datails_status']=='1'){
                                             $goods_one_s_s='待付款.';
                                             }else if($v2['datails_status']=='2'){
                                             $goods_one_s_s='待发货.';
                                             }else if($v2['datails_status']=='3'){
                                             $goods_one_s_s='待收货.';
                                             }else if($v2['datails_status']=='4'){
                                             $goods_one_s_s='已收货.';
                                             }
                                            @endphp
                                            <td width="8%" class="center">
                                                <ul class="unstyled">
                                                    <li>{{$goods_one_s_s}}</li>
                                                </ul>
                                            </td>
                                        </tr>
                                         @endif
                                        @endforeach
                                    </tbody>
                                </table> 
                                 @endif
                                @endforeach

                            </div>

                            <div class="clearfix"></div>
                        </div>


                            </div>
                            <div class="choose-order">
                                <div class="sui-pagination pagination-large top-pages">
                                    <ul>
                                        {{$shop_order->links()}}
                                    </ul>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>

                        <div class="like-title">
                            <div class="mt">
                                <span class="fl"><strong>热卖单品</strong></span>
                            </div>
                        </div>
                        <div class="like-list">
                            <ul class="yui3-g">
                                @foreach($goods as $K=>$v)
                                <li class="yui3-u-1-4">
                                    <div class="list-wrap">
                                        <div class="p-img">
                                            <img src="/{{$v->goods_img}}" />
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
                                        <div class="commit">
                                            <i class="command"></i>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 底部栏位 -->
    <!--页面底部-->
        @endsection 
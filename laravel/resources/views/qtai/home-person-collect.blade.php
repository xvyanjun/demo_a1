@extends('layouts_q.tw_jz')
@section('title','个人中心收藏')
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
            <div class="yui3-g collect">
                <!--左侧列表-->
                {{--@include('layouts_q.zuo');--}}
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
                            <dd ><a href="/center" >我的订单</a></dd>
                            <dd><a href="/home_order_pay" class="" >待付款</a></dd>
                            <dd><a href="/home_order_send"  class="" >待发货</a></dd>
                            <dd><a href="/home_order_receive" class="" >待收货</a></dd>
                            <!-- <dd><a href="home-order-evaluate.html"  class="list-active" >待评价</a></dd> -->
                        </dl>
                        <dl>
                            <dt><i>·</i> 我的中心</dt>
                            <dd><a href="/shop_user_list/collect" class="list-active">我的收藏</a></dd>
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
                <div class="yui3-u-5-6 goods">
                    <div class="body">
                            <h4>收藏的商品</h4>
                            <div class="goods-list">
                                <ul class="yui3-g"  id="goods-list">
                                    @foreach($goods_info as $k=>$v)
                                    <li class="yui3-u-1-4">
                                        <div class="list-wrap">
                                            <div class="p-img"><a href="/goods_list/{{$v['goods_id']}}"><img src="/{{$v['goods_img']}}" alt=''></a></div>
                                            <div class="price"><strong><em>¥</em> <i>{{$v['goods_price']}}</i></strong></div>
                                            <div class="attr"><em title="{{$v['goods_name']}}">{{mb_substr($v['goods_name'],0,9)}}</em></div>
                                            <div class="cu">
                                                {{--<em><span>促</span>满一件可参加超值换购</em>--}}
                                            </div>
                                            <div class="operate">
                                                <a href="/goods_list/{{$v['goods_id']}}"class="sui-btn btn-bordered btn-danger">查看详情</a>
                                                <a href="/collect/guandel" goods_id="{{$v['goods_id']}}" class="sui-btn btn-bordered btn-danger guandel">取消关注</a>
                                            </div>
                                        </div>
                                    </li >
                                    @endforeach
                                </ul>
                            </div>

                        <!--猜你喜欢-->
                        <div class="like-title">
                            <div class="mt">
                                <span class="fl"><strong>猜你喜欢</strong></span>
                            </div>
                        </div>
                        <div class="like-list">
                            <ul class="yui3-g">
                                @foreach($history_goods as $k=>$v)
                                <li class="yui3-u-1-4">
                                    <div class="list-wrap" title="{{$v['goods_name']}}">
                                        <div class="p-img">
                                            <a href="/goods_list/{{$v['goods_id']}}"><img src="/{{$v['goods_img']}}" /></a>
                                        </div>
                                        <div class="attr">
                                            <em>{{mb_substr($v['goods_name'],0,9)}}</em>
                                        </div>
                                        <div class="price">
                                            <strong>
											<em>¥</em>
											<i>{{$v['goods_price']}}</i>
										</strong>
                                        </div>
                                        <div class="commit">
                                            <i class="command">已有{{$v['goods_hits']}}人评价</i>
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
    <script>
        $(document).on("click",".guandel",function(){
            var goods_id=$(this).attr('goods_id');
            $.ajax({
                url: "{{'/collect/guandel'}}",
                type: 'post',
                data: {
                    goods_id:goods_id
                },
                dataType: 'json',
                success: function (res) {
                    if(res.code=="200"){
                        alert('取消关注完成');
                        window.location.href="";
                    }else{
                        alert(res.msg);
                    }
                }
            })
        });
    </script>
    @endsection
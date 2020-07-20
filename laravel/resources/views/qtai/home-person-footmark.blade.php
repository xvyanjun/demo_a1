@extends('layouts_q.tw_jz')
@section('title','个人中心足迹')
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
                @include('layouts_q.zuo');
                <!--右侧主内容-->
                <div class="yui3-u-5-6 goods">
                    <div class="body">
                        <h4>全部足迹 12</h4>
                        <div class="goods-list">
                            <ul class="yui3-g" id="goods-list">
                                 <li class="yui3-u-1-4">
                                        <div class="list-wrap">
                                            <div class="p-img"><img src="/qtai/img/_/t.jpg" alt=''></div>
                                            <div class="price"><strong><em>¥</em> <i>139.00</i></strong></div>
                                            <div class="attr"><em>Apple苹果iPhone 6s 32G金色 移动联通电信4G手机</em></div>
                                            <div class="cu"><em><span>促</span>满一件可参加超值换购</em></div>
                                            <div class="operate">
                                                <a href="success-cart.html" target="_blank" class="sui-btn btn-bordered btn-danger">加入购物车</a>
                                                <a href="javascript:void(0);" class="sui-btn btn-bordered">对比</a>
                                                <a href="javascript:void(0);" class="sui-btn btn-bordered">降价通知</a>
                                            </div>
                                        </div>
                                    </li >
                                    <li class="yui3-u-1-4">
                                        <div class="list-wrap">
                                            <div class="p-img"><img src="/qtai/img/_/t.jpg" alt=''></div>
                                            <div class="price"><strong><em>¥</em> <i>139.00</i></strong></div>
                                            <div class="attr"><em>Apple苹果iPhone 6s 32G金色 移动联通电信4G手机</em></div>
                                            <div class="cu"><em><span>促</span>满一件可参加超值换购</em></div>
                                            <div class="operate">
                                                <a href="success-cart.html" target="_blank" class="sui-btn btn-bordered btn-danger">加入购物车</a>
                                                <a href="javascript:void(0);" class="sui-btn btn-bordered">对比</a>
                                                <a href="javascript:void(0);" class="sui-btn btn-bordered">降价通知</a>
                                            </div>
                                        </div>
                                    </li >
                                    <li class="yui3-u-1-4">
                                        <div class="list-wrap">
                                            <div class="p-img"><img src="/qtai/img/_/t.jpg" alt=''></div>
                                            <div class="price"><strong><em>¥</em> <i>139.00</i></strong></div>
                                            <div class="attr"><em>Apple苹果iPhone 6s 32G金色 移动联通电信4G手机</em></div>
                                            <div class="cu"><em><span>促</span>满一件可参加超值换购</em></div>
                                            <div class="operate">
                                                <a href="success-cart.html" target="_blank" class="sui-btn btn-bordered btn-danger">加入购物车</a>
                                                <a href="javascript:void(0);" class="sui-btn btn-bordered">对比</a>
                                                <a href="javascript:void(0);" class="sui-btn btn-bordered">降价通知</a>
                                            </div>
                                        </div>
                                    </li >
                                    <li class="yui3-u-1-4">
                                        <div class="list-wrap">
                                            <div class="p-img"><img src="/qtai/img/_/t.jpg" alt=''></div>
                                            <div class="price"><strong><em>¥</em> <i>139.00</i></strong></div>
                                            <div class="attr"><em>Apple苹果iPhone 6s 32G金色 移动联通电信4G手机</em></div>
                                            <div class="cu"><em><span>促</span>满一件可参加超值换购</em></div>
                                            <div class="operate">
                                                <a href="success-cart.html" target="_blank" class="sui-btn btn-bordered btn-danger">加入购物车</a>
                                                <a href="javascript:void(0);" class="sui-btn btn-bordered">对比</a>
                                                <a href="javascript:void(0);" class="sui-btn btn-bordered">降价通知</a>
                                            </div>
                                        </div>
                                    </li >
                                    <li class="yui3-u-1-4">
                                        <div class="list-wrap">
                                            <div class="p-img"><img src="/qtai/img/_/t.jpg" alt=''></div>
                                            <div class="price"><strong><em>¥</em> <i>139.00</i></strong></div>
                                            <div class="attr"><em>Apple苹果iPhone 6s 32G金色 移动联通电信4G手机</em></div>
                                            <div class="cu"><em><span>促</span>满一件可参加超值换购</em></div>
                                            <div class="operate">
                                                <a href="success-cart.html" target="_blank" class="sui-btn btn-bordered btn-danger">加入购物车</a>
                                                <a href="javascript:void(0);" class="sui-btn btn-bordered">对比</a>
                                                <a href="javascript:void(0);" class="sui-btn btn-bordered">降价通知</a>
                                            </div>
                                        </div>
                                    </li >
                                    <li class="yui3-u-1-4">
                                        <div class="list-wrap">
                                            <div class="p-img"><img src="/qtai/img/_/t.jpg" alt=''></div>
                                            <div class="price"><strong><em>¥</em> <i>139.00</i></strong></div>
                                            <div class="attr"><em>Apple苹果iPhone 6s 32G金色 移动联通电信4G手机</em></div>
                                            <div class="cu"><em><span>促</span>满一件可参加超值换购</em></div>
                                            <div class="operate">
                                                <a href="success-cart.html" target="_blank" class="sui-btn btn-bordered btn-danger">加入购物车</a>
                                                <a href="javascript:void(0);" class="sui-btn btn-bordered">对比</a>
                                                <a href="javascript:void(0);" class="sui-btn btn-bordered">降价通知</a>
                                            </div>
                                        </div>
                                    </li >
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
                                <li class="yui3-u-1-4">
                                    <div class="list-wrap">
                                        <div class="p-img">
                                            <img src="/qtai/img/_/itemlike01.png" />
                                        </div>
                                        <div class="attr">
                                            <em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
                                        </div>
                                        <div class="price">
                                            <strong>
											<em>¥</em>
											<i>3699.00</i>
										</strong>
                                        </div>
                                        <div class="commit">
                                            <i class="command">已有6人评价</i>
                                        </div>
                                    </div>
                                </li>
                                <li class="yui3-u-1-4">
                                    <div class="list-wrap">
                                        <div class="p-img">
                                            <img src="/qtai/img/_/itemlike02.png" />
                                        </div>
                                        <div class="attr">
                                            <em>Apple苹果iPhone 6s/6s Plus 16G 64G 128G</em>
                                        </div>
                                        <div class="price">
                                            <strong>
											<em>¥</em>
											<i>4388.00</i>
										</strong>
                                        </div>
                                        <div class="commit">
                                            <i class="command">已有700人评价</i>
                                        </div>
                                    </div>
                                </li>
                                <li class="yui3-u-1-4">
                                    <div class="list-wrap">
                                        <div class="p-img">
                                            <img src="/qtai/img/_/itemlike03.png" />
                                        </div>
                                        <div class="attr">
                                            <em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
                                        </div>
                                        <div class="price">
                                            <strong>
											<em>¥</em>
											<i>4088.00</i>
										</strong>
                                        </div>
                                        <div class="commit">
                                            <i class="command">已有700人评价</i>
                                        </div>
                                    </div>
                                </li>
                                <li class="yui3-u-1-4">
                                    <div class="list-wrap">
                                        <div class="p-img">
                                            <img src="/qtai/img/_/itemlike04.png" />
                                        </div>
                                        <div class="attr">
                                            <em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
                                        </div>
                                        <div class="price">
                                            <strong>
											<em>¥</em>
											<i>4088.00</i>
										</strong>
                                        </div>
                                        <div class="commit">
                                            <i class="command">已有700人评价</i>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 底部栏位 -->
    <!--页面底部-->
    <!-- eva -->
@endsection 
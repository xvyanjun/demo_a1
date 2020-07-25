@extends('layouts_q.tw_jz')
@section('title','列表展示')
@section('content')
	<!--列表-->
	<div class="sort">
		<div class="py-container">
			<div class="yui3-g SortList ">
				<div class="yui3-u Left all-sort-list">
					<div class="all-sort-list2">
                        @foreach($cate_info as $k=>$v)
						<div class="item">
							<h3><a href="">
                                    {{$v['cate_name']}}
								</a></h3>
							<div class="item-list clearfix" id="cate_prev_list">

								<div class="subitem cate_prev_list">
									<dl class="fore1">
										<dt><a href="">{{$v['cate_name']}}</a></dt>
										<dd>
                                            @foreach($v['cate'] as $kk=>$vv)
                                            <em><a href="">{{$vv['cate_name']}}</a></em>
                                            @endforeach
                                        </dd>
									</dl>
								</div>
							</div>
						</div>
                        @endforeach
					</div>
				</div>
				<div class="yui3-u Center banerArea">
					<!--banner轮播-->
					<div id="myCarousel" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
					  <ol class="carousel-indicators">
					  	@foreach($slide_s as $c_1=>$v_1)
                          <li data-target="#myCarousel" data-slide-to="{{$c_1}}" class="{{$c_1=='0'?'active':''}}"></li>
                        @endforeach

					  </ol>
					  <div class="carousel-inner">
                        
                        @foreach($slide_s as $c=>$v)
                          <div class="{{$c=='0'?'active item':'item'}}">
					        <a href="{{$v['slide_url']}}">
					    	  <img src="{{$v['slide_img']}}"  />
					        </a>
					      </div>
                        @endforeach

					  </div>
					  <a href="#myCarousel" data-slide="prev" class="carousel-control left">‹</a>
					  <a href="#myCarousel" data-slide="next" class="carousel-control right">›</a>
					</div>
				</div>
				<div class="yui3-u Right">
					<div class="news">
						<h4><em class="fl">品优购快报</em><span class="fr tip">咨询列表<!-- 更多 > --></span></h4>
						<div class="clearix"></div>
						<ul class="news-list unstyled">

							@foreach($service_s as $f=>$g)
							<li>
								<span class="bold">[{{$g['service_title']}}]</span>
                                <span title="{{$g['service_text']}}">{{$g['service_titles']}}</span>
							</li>
							@endforeach
						</ul>
					</div>
					<ul class="yui3-g Lifeservice">
						<li class="yui3-u-1-4 life-item tab-item">
							<i class="list-item list-item-1"></i>
							<span class="service-intro">话费</span>
						</li>
						<li class="yui3-u-1-4 life-item tab-item">
							<i class="list-item list-item-2"></i>
							<span class="service-intro">机票</span>
						</li>
						<li class="yui3-u-1-4 life-item tab-item">
							<i class="list-item list-item-3"></i>
							<span class="service-intro">电影票</span>
						</li>
						<li class="yui3-u-1-4 life-item tab-item">
							<i class="list-item list-item-4"></i>
							<span class="service-intro">游戏</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-5"></i>
							<span class="service-intro">彩票</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-6"></i>
							<span class="service-intro">加油站</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-7"></i>
							<span class="service-intro">酒店</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-8"></i>
							<span class="service-intro">火车票</span>
						</li>
						<li class="yui3-u-1-4 life-item  notab-item">
							<i class="list-item list-item-9"></i>
							<span class="service-intro">众筹</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-10"></i>
							<span class="service-intro">理财</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-11"></i>
							<span class="service-intro">礼品卡</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-12"></i>
							<span class="service-intro">白条</span>
						</li>
					</ul>
					<div class="life-item-content">
						<div class="life-detail">
							<i class="close">关闭</i>
							<p>话费充值</p>
							<form action="" class="sui-form form-horizontal">
								号码：<input type="text" id="inputphoneNumber" placeholder="输入你的号码" />
							</form>
							<button class="sui-btn btn-danger">快速充值</button>
						</div>
						<div class="life-detail">
							<i class="close">关闭</i> 机票
						</div>
						<div class="life-detail">
							<i class="close">关闭</i> 电影票
						</div>
						<div class="life-detail">
							<i class="close">关闭</i> 游戏
						</div>
					</div>
					<div class="ads">
						<img src="/qtai/img/ad1.png" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--推荐-->
	<div class="show">
		<div class="py-container">
			<ul class="yui3-g Recommend">
				<li class="yui3-u-1-6  clock">
					<div class="time">
						<img src="/qtai/img/clock.png" />
						<h3>今日推荐</h3>
					</div>
				</li>
				@foreach($goods as $k=>$v)
				<li class="yui3-u-5-24">
					<a href="{{$v->goods_id}}" target="_blank"><img src="/{{$v->goods_img}}" style="height:165px;width:249.984px"/></a>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
	<!--喜欢-->
	<div class="like">
		<div class="py-container">
			<div class="title">
				<h3 class="fl">猜你喜欢</h3>
				<b class="border"></b>
				<a href="javascript:;" class="fr tip changeBnt" id="xxlChg"><i></i>换一换</a>
			</div>
			<div class="bd">
				<ul class="clearfix yui3-g Favourate picLB" id="picLBxxl">
				@foreach($history_goods as $k=>$v)
					<li class="yui3-u-1-6">
						<dl class="picDl huozhe">
							<dd>
								<a href="" class="pic"><img src="/{{$v['goods_img']}}" alt="" /></a>
								<div class="like-text">
									<p>{{$v['goods_name']}}</p>
									<h3>¥{{$v['goods_price']}}</h3>
								</div>
							</dd>
						</dl>
					</li>
				@endforeach	
				</ul>
			</div>
		</div>
	</div>
	<!--有趣-->
	<div class="fun">
		<div class="py-container">
			<div class="title">
				<h3 class="fl">传智播客.有趣区</h3>
			</div>
			<div class="clearfix yui3-g Interest">
				<span class="x-line"></span>
				<div class="yui3-u row-405 Interest-conver">
					<img src="/qtai/img/interest01.png" />
				</div>
				<div class="yui3-u row-225 Interest-conver-split">
					<h5>好东西</h5>
					<img src="/qtai/img/interest02.png" />
					<img src="/qtai/img/interest03.png" />
				</div>
				<div class="yui3-u row-405 Interest-conver-split blockgary">
					<h5>品牌街</h5>
					<div class="split-bt">
						<img src="/qtai/img/interest04.png" />
					</div>
					<div class="x-img fl">
						<img src="/qtai/img/interest05.png" />
					</div>
					<div class="x-img fr">
						<img src="/qtai/img/interest06.png" />
					</div>
				</div>
				<div class="yui3-u row-165 brandArea">
					<span class="brand-yline"></span>
					<ul class="yui3-g brand-list">
						<li class="yui3-u-1-2 brand-pit"><img src="/qtai/img/brand01.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/qtai/img/brand02.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/qtai/img/brand03.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/qtai/img/brand04.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/qtai/img/brand05.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/qtai/img/brand06.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/qtai/img/brand07.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/qtai/img/brand08.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/qtai/img/brand09.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/qtai/img/brand10.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/qtai/img/brand11.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/qtai/img/brand12.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/qtai/img/brand13.png" /></li>
						<li class="yui3-u-1-2 brand-pit"><img src="/qtai/img/brand03.png" /></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
<!-- 楼层——eva -->
@foreach($cate_s as $t_a1=>$y_a1)
<div id="floor-1" class="floor">
		<div class="py-container">
			<div class="title floors">
				<h3 class="fl">{{$y_a1['cate_name']}}</h3>
				<div class="fr">
					<ul class="sui-nav nav-tabs">

                        @foreach($y_a1['cate_to'] as $h1=>$h2)
                        <li class="{{$h1==0?'active':''}}">
							<a href="#tab2" data-toggle="tab">{{$h2['cate_name']}}</a>
						</li>
                        @endforeach

					</ul>
				</div>
			</div>
			<div class="clearfix  tab-content floor-content">
				<div id="tab1" class="tab-pane active">
					<div class="yui3-g Floor-1">
						<div class="yui3-u Left blockgary">
							<ul class="jd-list">

                                @foreach($y_a1['cate_hits_desc'] as $j1=>$j2)
                                 <li title="{{$j2['goods_name']}}">{{mb_substr($j2['goods_name'],0,6)}}</li>
                                @endforeach
<!-- 
								<li>节能补贴</li>
								<li>4K电视</li>
								<li>空气净化器</li>
								<li>IH电饭煲</li>
								<li>滚筒洗衣机</li>
								<li>电热水器</li> -->
							</ul>
							@foreach($y_a1['cate_goods'] as $j1_s=>$j2_s)
							     @if($j1_s=='0')
                                 <img src="{{$j2_s['goods_img']}}" />
                                 @endif
                            @endforeach
							<!-- <img src="/qtai/img/floor-1-1.png" /> -->
						</div>
						<div class="yui3-u row-330 floorBanner">
							<div id="floorCarousel" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
								<ol class="carousel-indicators">
									<li data-target="#floorCarousel" data-slide-to="0" class="active"></li>
									<li data-target="#floorCarousel" data-slide-to="1"></li>
									<li data-target="#floorCarousel" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									<div class="active item">
										<img src="/qtai/img/floor-1-b01.png">
									</div>
									<div class="item">
										<img src="/qtai/img/floor-1-b02.png">
									</div>
									<div class="item">
										<img src="/qtai/img/floor-1-b03.png">
									</div>
								</div>
								<a href="#floorCarousel" data-slide="prev" class="carousel-control left">‹</a>
								<a href="#floorCarousel" data-slide="next" class="carousel-control right">›</a>
							</div>
						</div>
						<div class="yui3-u row-220 split">
							<!-- <span class="floor-x-line"></span> -->
							@foreach($y_a1['cate_goods'] as $t1=>$t2)
							@if($t1<2)
							<span>标题喵~~~~~~~~~~~~~~~~~</span>
							<div class="floor-conver-pit" >
								<img src="{{$t2['goods_img']}}" />
							</div>
							@endif
							@endforeach
							<!-- <div class="floor-conver-pit">
								<img src="/qtai/img/floor-1-3.png" />
							</div> -->
						</div>
						<div class="yui3-u row-218 split">
							<img src="/qtai/img/floor-1-4.png" />
						</div>
						<div class="yui3-u row-220 split">
							<span class="floor-x-line"></span>
							<div class="floor-conver-pit">
								<img src="/qtai/img/floor-1-5.png" />
							</div>
							<div class="floor-conver-pit">
								<img src="/qtai/img/floor-1-6.png" />
							</div>
						</div>
					</div>
				</div>
				<div id="tab2" class="tab-pane">
					<p>第二个</p>
				</div>
				<div id="tab3" class="tab-pane">
					<p>第三个</p>
				</div>
				<div id="tab4" class="tab-pane">
					<p>第4个</p>
				</div>
				<div id="tab5" class="tab-pane">
					<p>第5个</p>
				</div>
				<div id="tab6" class="tab-pane">
					<p>第6个</p>
				</div>
				<div id="tab7" class="tab-pane">
					<p>第7个</p>
				</div>
			</div>
		</div>
</div>
@endforeach
<!-- 楼层——eva -->
	<!--楼层-->
<!-- 	<div id="floor-1" class="floor">
		<div class="py-container">
			<div class="title floors">
				<h3 class="fl">家用电器</h3>
				<div class="fr">
					<ul class="sui-nav nav-tabs">
						<li class="active">
							<a href="#tab1" data-toggle="tab">热门</a>
						</li>
						<li>
							<a href="#tab2" data-toggle="tab">大家电</a>
						</li>
						<li>
							<a href="#tab3" data-toggle="tab">生活电器</a>
						</li>
						<li>
							<a href="#tab4" data-toggle="tab">厨房电器</a>
						</li>
						<li>
							<a href="#tab5" data-toggle="tab">应季电器</a>
						</li>
						<li>
							<a href="#tab6" data-toggle="tab">空气/净水</a>
						</li>
						<li>
							<a href="#tab7" data-toggle="tab">高端电器</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="clearfix  tab-content floor-content">
				<div id="tab1" class="tab-pane active">
					<div class="yui3-g Floor-1">
						<div class="yui3-u Left blockgary">
							<ul class="jd-list">
								<li>节能补贴</li>
								<li>4K电视</li>
								<li>空气净化器</li>
								<li>IH电饭煲</li>
								<li>滚筒洗衣机</li>
								<li>电热水器</li>
							</ul>
							<img src="/qtai/img/floor-1-1.png" />
						</div>
						<div class="yui3-u row-330 floorBanner">
							<div id="floorCarousel" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
								<ol class="carousel-indicators">
									<li data-target="#floorCarousel" data-slide-to="0" class="active"></li>
									<li data-target="#floorCarousel" data-slide-to="1"></li>
									<li data-target="#floorCarousel" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									<div class="active item">
										<img src="/qtai/img/floor-1-b01.png">
									</div>
									<div class="item">
										<img src="/qtai/img/floor-1-b02.png">
									</div>
									<div class="item">
										<img src="/qtai/img/floor-1-b03.png">
									</div>
								</div>
								<a href="#floorCarousel" data-slide="prev" class="carousel-control left">‹</a>
								<a href="#floorCarousel" data-slide="next" class="carousel-control right">›</a>
							</div>
						</div>
						<div class="yui3-u row-220 split">
							<span class="floor-x-line"></span>
							<div class="floor-conver-pit">
								<img src="/qtai/img/floor-1-2.png" />
							</div>
							<div class="floor-conver-pit">
								<img src="/qtai/img/floor-1-3.png" />
							</div>
						</div>
						<div class="yui3-u row-218 split">
							<img src="/qtai/img/floor-1-4.png" />
						</div>
						<div class="yui3-u row-220 split">
							<span class="floor-x-line"></span>
							<div class="floor-conver-pit">
								<img src="/qtai/img/floor-1-5.png" />
							</div>
							<div class="floor-conver-pit">
								<img src="/qtai/img/floor-1-6.png" />
							</div>
						</div>
					</div>
				</div>
				<div id="tab2" class="tab-pane">
					<p>第二个</p>
				</div>
				<div id="tab3" class="tab-pane">
					<p>第三个</p>
				</div>
				<div id="tab4" class="tab-pane">
					<p>第4个</p>
				</div>
				<div id="tab5" class="tab-pane">
					<p>第5个</p>
				</div>
				<div id="tab6" class="tab-pane">
					<p>第6个</p>
				</div>
				<div id="tab7" class="tab-pane">
					<p>第7个</p>
				</div>
			</div>
		</div>
	</div> -->
<!-- 	<div id="floor-2" class="floor">
		<div class="py-container">
			<div class="title floors">
				<h3 class="fl">手机通讯</h3>
				<div class="fr">
					<ul class="sui-nav nav-tabs">
						<li class="active">
							<a href="#tab8" data-toggle="tab">热门</a>
						</li>
						<li>
							<a href="#tab9" data-toggle="tab">品质优选</a>
						</li>
						<li>
							<a href="#tab10" data-toggle="tab">新机尝鲜</a>
						</li>
						<li>
							<a href="#tab11" data-toggle="tab">高性价比</a>
						</li>
						<li>
							<a href="#tab12" data-toggle="tab">合约机</a>
						</li>
						<li>
							<a href="#tab13" data-toggle="tab">手机卡</a>
						</li>
						<li>
							<a href="#tab14" data-toggle="tab">手机配件</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="clearfix  tab-content floor-content">
				<div id="tab8" class="tab-pane active">
					<div class="yui3-g Floor-1">
						<div class="yui3-u Left blockgary">
							<ul class="jd-list">
								<li>节能补贴</li>
								<li>4K电视</li>
								<li>空气净化器</li>
								<li>IH电饭煲</li>
								<li>滚筒洗衣机</li>
								<li>电热水器</li>
							</ul>
							<img src="/qtai/img/floor-1-1.png" />
						</div>
						<div class="yui3-u row-330 floorBanner">
							<div id="floorCarousell" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
								<ol class="carousel-indicators">
									<li data-target="#floorCarousell" data-slide-to="0" class="active"></li>
									<li data-target="#floorCarousell" data-slide-to="1"></li>
									<li data-target="#floorCarousell" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									<div class="active item">
										<img src="/qtai/img/floor-1-b01.png">
									</div>
									<div class="item">
										<img src="/qtai/img/floor-1-b02.png">
									</div>
									<div class="item">
										<img src="/qtai/img/floor-1-b03.png">
									</div>
								</div>
								<a href="#floorCarousell" data-slide="prev" class="carousel-control left">‹</a>
								<a href="#floorCarousell" data-slide="next" class="carousel-control right">›</a>
							</div>
						</div>

						<div class="yui3-u row-220 split">
							<span class="floor-x-line"></span>
							<div class="floor-conver-pit">
								<img src="/qtai/img/floor-1-2.png" />
							</div>
							<div class="floor-conver-pit">
								<img src="/qtai/img/floor-1-3.png" />
							</div>
						</div>

						<div class="yui3-u row-218 split">
							<img src="/qtai/img/floor-1-4.png" />
						</div>

						<div class="yui3-u row-220 split">
							<span class="floor-x-line"></span>
							<div class="floor-conver-pit">
								<img src="/qtai/img/floor-1-5.png" />
							</div>
							<div class="floor-conver-pit">
								<img src="/qtai/img/floor-1-6.png" />
							</div>
						</div>

					</div>
				</div>
				<div id="tab2" class="tab-pane">
					<p>第二个</p>
				</div>
				<div id="tab9" class="tab-pane">
					<p>第三个</p>
				</div>
				<div id="tab10" class="tab-pane">
					<p>第4个</p>
				</div>
				<div id="tab11" class="tab-pane">
					<p>第5个</p>
				</div>
				<div id="tab12" class="tab-pane">
					<p>第6个</p>
				</div>
				<div id="tab13" class="tab-pane">
					<p>第7个</p>
				</div>
				<div id="tab14" class="tab-pane">
					<p>第8个</p>
				</div>
			</div>
		</div>
	</div> -->
	<!--商标-->
	<div class="brand">
		<div class="py-container">
			<ul class="Brand-list blockgary">
				<li class="Brand-item">
					<img src="/qtai/img/brand_21.png" />
				</li>
				<li class="Brand-item"><img src="/qtai/img/brand_03.png" /></li>
				<li class="Brand-item"><img src="/qtai/img/brand_05.png" /></li>
				<li class="Brand-item"><img src="/qtai/img/brand_07.png" /></li>
				<li class="Brand-item"><img src="/qtai/img/brand_09.png" /></li>
				<li class="Brand-item"><img src="/qtai/img/brand_11.png" /></li>
				<li class="Brand-item"><img src="/qtai/img/brand_13.png" /></li>
				<li class="Brand-item"><img src="/qtai/img/brand_15.png" /></li>
				<li class="Brand-item"><img src="/qtai/img/brand_17.png" /></li>
				<li class="Brand-item"><img src="/qtai/img/brand_19.png" /></li>
			</ul>
		</div>
	</div>
	<!-- 底部栏位 -->
	<!--页面底部-->



@endsection 


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
<input type="hidden" id='cd' value="{{count($cate_s)}}">
@foreach($cate_s as $t_a1=>$y_a1)
<div id="floor-1" class="floor" l_ceng="lou_{{$t_a1+1}}">
		<div class="py-container">
			<div class="title floors">
				<h3 class="fl"><span>{{$t_a1+1}}F   </span>{{$y_a1['cate_name']}}</h3>
				<div class="fr">
					<ul class="sui-nav nav-tabs">

                        @foreach($y_a1['cate_to'] as $h1=>$h2)
                        <li ><!--class="{{$h1==0?'active':''}}"-->
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

							</ul>
							@foreach($y_a1['cate_goods'] as $j1_s=>$j2_s)
							     @if($j1_s=='0')
                                 <img src="{{$j2_s['goods_img']}}" />
                                 @endif
                            @endforeach

						</div>
						<div class="yui3-u row-330 floorBanner">
							@if($y_a1['cate_goods']!='[]')
							<div id="floorCarousel" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
								<ol class="carousel-indicators">
									@foreach($y_a1['cate_goods'] as $m_1=>$m_2)
                                     <li data-target="#floorCarousel" data-slide-to="{{$m_1}}" {{$m_1=='0'?"'class='active'":''}}></li>
									@endforeach
								</ol>
								<div class="carousel-inner">
									@foreach($y_a1['cate_goods'] as $m_s=>$m_ss)
                                     <div class="{{$m_s=='0'?'active item':'item'}}">
										<img style="width:329px;height:360px;" src="{{$m_ss['goods_img']}}">
									 </div>
									@endforeach
								</div>
								
								<a href="#floorCarousel" data-slide="prev" class="carousel-control left">‹</a>
								<a href="#floorCarousel" data-slide="next" class="carousel-control right">›</a>
								
							</div>
							@endif
						</div>
						<div class="yui3-u row-220 split">
							@foreach($y_a1['cate_goods'] as $t1=>$t2)
							@if($t1<2)
							<div class="floor-conver-pit" >
								<img style="width:220px;height:180px;" src="{{$t2['goods_img']}}" />
							</div>
							@endif
							@endforeach
						</div>
						@foreach($y_a1['cate_goods'] as $n1=>$n2)
						@if($n1==2)
						<div class="yui3-u row-218 split">
							<img style="width:218px;height:355.73px;" src="{{$n2['goods_img']}}" />
						</div>
						@endif
						@endforeach
						<div class="yui3-u row-220 split">
							@foreach($y_a1['cate_goods'] as $k1=>$k2)
							@if($k1>2)
							<div class="floor-conver-pit">
								<img  style="width:220px;height:180px;" src="{{$k2['goods_img']}}" />
							</div>
							@endif
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
@endforeach
       <span id='j_zai'><h3><center id='tx'>加载更多</center></h3></span>
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
    <script>
    	$(function(){
    		  var cd=$("#cd").val();
    		  var xshi=5;
    		  for(var l_1=1;l_1<=cd;l_1++){
    		  	if(l_1>xshi){
    		  		$("[l_ceng='lou_"+l_1+"']").hide();
    		  	}
    		  	// console.log(l_1);
    		  }
//----------------------------------------------------------------------
              $(document).on('click','#j_zai',function(){
              	if(xshi+5>=cd){
                  xshi=cd;
                  $("#tx").text('');
              	}else{
                  xshi=xshi+5;
              	}
              	
              	for(var l_1=1;l_1<=cd;l_1++){
              		$("[l_ceng='lou_"+l_1+"']").show();
    		  	  if(l_1>xshi){
    		  	  	$("[l_ceng='lou_"+l_1+"']").hide();
    		  	  }
    		    }
              });
//---------------------------------------------------------------------- 
    	});
    </script>
@endsection 


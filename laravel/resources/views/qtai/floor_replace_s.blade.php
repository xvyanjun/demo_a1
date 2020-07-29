@foreach($cate_s as $t_a1=>$y_a1)
<div id="floor-1" class="floor" l_ceng="lou_{{$t_a1+1}}">
		<div class="py-container" id='dsang_a'>
			<div class="title floors">
				<h3 class="fl"><span>{{$at_present+($t_a1+1)}}F   </span>{{$y_a1['cate_name']}}</h3>
				<div class="fr">
					<ul class="sui-nav nav-tabs">
                        <li class='active'>
							<a href="#tab2" data-toggle="tab" id='cate_wher' cate_id="{{$y_a1['cate_id']}}">热门</a>
						</li>
                        @foreach($y_a1['cate_to'] as $h1=>$h2)
                        <li >
							<a href="#tab2" data-toggle="tab" id='cate_wher' cate_id="{{$h2['cate_id']}}">{{$h2['cate_name']}}</a>
						</li>
                        @endforeach

					</ul>
				</div>
			</div>
			<div class="clearfix  tab-content floor-content" id='t_huan'>
				<div id="tab1" class="tab-pane active">
					<div class="yui3-g Floor-1">
						<div class="yui3-u Left blockgary">
							<ul class="jd-list">

                                @foreach($y_a1['cate_hits_desc'] as $j1=>$j2)
									<a href="/goods_list/{{$j2['goods_id']}}"><li title="{{$j2['goods_name']}}">{{mb_substr($j2['goods_name'],0,6)}}</li></a>
                                @endforeach

							</ul>
							@foreach($y_a1['cate_hits_desc'] as $j1_s=>$j2_s)
							     @if($j1_s=='0')
                                 <a href="/goods_list/{{$j2_s['goods_id']}}"><img src="{{$j2_s['goods_img']}}" /></a>
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
								<a href="/goods_list/{{$t2['goods_id']}}"><img style="width:220px;height:180px;" src="{{$t2['goods_img']}}" /></a>
							</div>
							@endif
							@endforeach
						</div>
						@foreach($y_a1['cate_goods'] as $n1=>$n2)
						@if($n1==2)
						<div class="yui3-u row-218 split">
							<a href="/goods_list/{{$n2['goods_id']}}"><img style="width:218px;height:355.73px;" src="{{$n2['goods_img']}}" /></a>
						</div>
						@endif
						@endforeach
						<div class="yui3-u row-220 split">
							@foreach($y_a1['cate_goods'] as $k1=>$k2)
							@if($k1>2)
							<div class="floor-conver-pit">
								<a href="/goods_list/{{$k2['goods_id']}}"><img  style="width:220px;height:180px;" src="{{$k2['goods_img']}}" /></a>
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
<span id='j_zai' end_cate_id="{{$cate_s[count($cate_s)-1]['cate_id']}}"><h3><center id='tx'>加载更多</center></h3></span>
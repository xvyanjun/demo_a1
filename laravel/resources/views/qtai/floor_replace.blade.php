				<div id="tab1" class="tab-pane active">
					<div class="yui3-g Floor-1">
						<div class="yui3-u Left blockgary">
							<ul class="jd-list">

                                @foreach($y_a1['cate_hits_desc'] as $j1=>$j2)
                                 <li title="{{$j2['goods_name']}}">{{mb_substr($j2['goods_name'],0,6)}}</li>
                                @endforeach

							</ul>
							@foreach($y_a1['cate_hits_desc'] as $j1_s=>$j2_s)
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
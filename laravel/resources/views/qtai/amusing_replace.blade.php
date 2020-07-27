			<div class="title">
				<h3 class="fl">传智播客..有趣区</h3>
			</div>
			<div class="clearfix yui3-g Interest">
				<span class="x-line"></span>
				<div class="yui3-u row-405 Interest-conver">
					<img src="{{$replace_yqu['goods_zuo'][0]['goods_img']}}" style="width:404px;height:405px;"/>
				</div>
				<div class="yui3-u row-225 Interest-conver-split">
					<h5>好东西</h5>
					@foreach($replace_yqu['goods_zuo'] as $u1=>$u2)
					     @if($u1>=1)
                         <img src="{{$u2['goods_img']}}" style="width:225px;height:205.08px;"/>
                         @endif 
					@endforeach
				</div>
				<div class="yui3-u row-405 Interest-conver-split blockgary">
					<h5>品牌街</h5>
					<div class="split-bt">
						<img src="{{$replace_yqu['goods_you'][0]['goods_img']}}" style="width:404px;height:206px;"/>
					</div>
					<div class="x-img fl">
						<img src="{{$replace_yqu['goods_you'][1]['goods_img']}}" style="width:202px;height:158px;"/>
					</div>
					<div class="x-img fr">
						<img src="{{$replace_yqu['goods_you'][2]['goods_img']}}" style="width:202px;height:158px;"/>
					</div>
				</div>
				<div class="yui3-u row-165 brandArea">
					<span class="brand-yline"></span>
					<ul class="yui3-g brand-list">
						@foreach($replace_yqu['brand_s'] as $t_1=>$t_2)
                          <li class="yui3-u-1-2 brand-pit"><img src="{{$t_2['brand_img']}}" style="width:80px;height:36px;"/></li>
						@endforeach
	<!-- 					<li class="yui3-u-1-2 brand-pit"><img src="/qtai/img/brand01.png" /></li>
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
						<li class="yui3-u-1-2 brand-pit"><img src="/qtai/img/brand03.png" /></li> -->
					</ul>
				</div>
			</div>
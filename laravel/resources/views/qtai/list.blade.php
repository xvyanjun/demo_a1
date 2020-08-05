@extends('layouts_q.tw_jz')
@section('title','列表')
@section('content')
    <link rel="stylesheet" type="text/css" href="/qtai/css/pages-list.css" />
<div class="main">
		<div class="py-container">
			<!--details-->
			<div class="details">
				<div class="sui-navbar">
					<div class="navbar-inner filter">
						<ul class="sui-nav">
							<li class="active">
								<a href="#">综合</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="goods-list">
					<ul class="yui3-g">
						@foreach($goods as $k=>$v)
						<li class="yui3-u-1-5">
							<div class="list-wrap">
								<div class="p-img">
									<a href="/goods_list/{{$v['goods_id']}}"><img src="/{{$v['goods_img']}}" width="200" height="210"/></a>
								</div>
								<div class="price">
									<strong>
											<em>¥</em>
											<i>{{$v['goods_price']}}</i>
										</strong>
								</div>
								<div class="attr">
									<em title="{{$v['goods_id']}}">{{mb_substr($v['goods_name'],0,9)}}</em>
								</div>
								<div class="operate">
									<a href="/goods_list/{{$v['goods_id']}}"class="sui-btn btn-bordered btn-danger">查看详情</a>
									<a href="javascript:void(0);" goods_id="{{$v['goods_id']}}" class="sui-btn btn-bordered guan guanzhu">关注</a>
								</div>
							</div>
						</li>
						@endforeach
					</ul>
				</div>

			</div>
			<!--hotsale-->
			<div class="clearfix hot-sale">
				<h4 class="title">热卖商品</h4>
				<div class="hot-list">
					<ul class="yui3-g">
						@foreach($goodss as $r=>$t)
						<li class="yui3-u-1-4">
							<div class="list-wrap">
								<div class="p-img">
									<a href="/goods_list/{{$t['goods_id']}}"><img style="width:141px;height:141px;" src="/{{$t['goods_img']}}" /></a>
								</div>
								<div class="attr">
									<em title="{{$t['goods_name']}}">{{mb_substr($t['goods_name'],0,9)}}</em>
								</div>
								<div class="price">
									<strong>
											<em>¥</em>
											<i>{{$t['goods_price']}}</i>
										</strong>
								</div>
							</div>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
	<script>
		/************************************************关注**********************************************************************/
		$(document).on("click",".guanzhu",function(){
            var goods_id=$(this).attr('goods_id');
            $.ajax({
                url: "{{'/collect/guanzhu'}}",
                type: 'post',
                data: {
                    goods_id:goods_id
                },
                dataType: 'json',
                success: function (res) {
//                    console.log(res);
					if(res.code=="200"){
						alert('关注成功');
					}else if(res.code=="555"){
						alert(res.msg);
						window.location.href="/login";
					}else{
						alert(res.msg);
					}
                }
            })
        });
	</script>
@endsection
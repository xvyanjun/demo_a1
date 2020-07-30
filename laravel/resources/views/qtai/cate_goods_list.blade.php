<div class="details" id="goods_tiao_list">
    <input type="hidden" id="brand_id" value="{{$brand_id}}">
    <input type="hidden" id="yan_sku" value="{{$yan_sku}}">
    <input type="hidden" id="chi_sku" value="{{$chi_sku}}">
    <input type="hidden" id="qu_price" value="{{$qu_price}}">
    <input type="hidden" id="tiao" value="{{$tiao}}">
    <div class="sui-navbar">
        <div class="navbar-inner filter">
            <ul class="sui-nav">
                <li class="{{$tiao==''?'active':''}}">
                    <a class="tiao" jian="">综合</a>
                </li>
                <li class="{{$tiao=='goods_hits'?'active':''}}">
                    <a class="tiao" jian="goods_hits">销量</a>
                </li>
                <li class="{{$tiao=='goods_time'?'active':''}}">
                    <a class="tiao" jian="goods_time">新品</a>
                </li>
                <li class="{{$tiao=='goods_price'?'active':''}}">
                    <a class="tiao" jian="goods_price">价格</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="goods-list">
        <ul class="yui3-g">
            @if(!empty($goods_info))
            @foreach($goods_info as $k=>$v)
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
                            <em>{{mb_substr($v['goods_name'],0,9)}}</em>
                        </div>
                        <div class="cu">
                            <!-- <em><span>促</span>满一件可参加超值换购</em> -->
                        </div>
                        <div class="commit">
                            <i class="command">已有{{$v['goods_hits']}}人查看</i>
                        </div>
                        <div class="operate">
                            <a href="success-cart.html"class="sui-btn btn-bordered btn-danger">加入购物车</a>
                            <a href="javascript:void(0);" class="sui-btn btn-bordered">关注</a>
                        </div>
                    </div>
                </li>
            @endforeach
            @else
                <li class="yui3-u-1-5">
                    <h2>没有找到对应的商品</h2>
                </li>
            @endif
        </ul>
    </div>
    <div class="fr page">
        <div class="sui-pagination pagination-large">
            {{ $goods_info->links() }}
            {{--<ul>--}}
                {{--<li class="prev disabled">--}}
                    {{--<a href="#">«上一页</a>--}}
                {{--</li>--}}
                {{--<li class="active">--}}
                    {{--<a href="#">1</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#">2</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#">3</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#">4</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#">5</a>--}}
                {{--</li>--}}
                {{--<li class="dotted"><span>...</span></li>--}}
                {{--<li class="next">--}}
                    {{--<a href="#">下一页»</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
            {{--<div><span>共10页&nbsp;</span><span>--}}
      {{--到第--}}
      {{--<input type="text" class="page-num">--}}
      {{--页 <button class="page-confirm" onclick="alert(1)">确定</button></span></div>--}}
        </div>
    </div>
</div>

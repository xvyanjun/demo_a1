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
                                <em>{{$v['goods_name']}}</em>
                            </div>
                            <div class="cu">
                                <em><span>促</span>满一件可参加超值换购</em>
                            </div>
                            <div class="commit">
                                <i class="command">已有{{$v['goods_hits']}}人查看</i>
                            </div>
                            <div class="operate">
                                <a href="/goods_list/{{$v['goods_id']}}"class="sui-btn btn-bordered btn-danger">查看商品详情</a>
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
            <ul>
            {{ $goods_info->links() }}
            </ul>
        </div>
    </div>
</div>

@extends('layouts_q.tw_jz')
@section('title','搜索')
@section('content')
<link rel="stylesheet" type="text/css" href="/qtai/css/pages-list.css" />
{{--<link rel="stylesheet" type="text/css" href="/qtai/css/widget-cartPanelView.css" />--}}

<div class="goods-list">
    <ul class="yui3-g">
        @foreach($goods_info as $k=>$v)
            <li class="yui3-u-1-5" title="{{$v['goods_name']}}" style="width: 230px;@if($k%5==0)margin-left: 15%; @endif">
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
                        <em>{{mb_substr($v['goods_name'],0,19)}}</em>
                    </div>
                    <div class="cu">
                        <!-- {{--<em><span>促</span>满一件可参加超值换购</em>--}} -->
                    </div>
                    <div class="commit">
                        <i class="command">已有{{$v['goods_hits']}}人查看</i>
                    </div>
                    <div class="operate">
                        <a href="/goods_list/{{$v['goods_id']}}"class="sui-btn btn-bordered btn-danger">查看商品详情</a>
                        <a href="javascript:;" goods_id="{{$v['goods_id']}}" class="sui-btn btn-bordered guan guanzhu">关注</a>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<script>
    $(document).ready(function(){
        $("#autocomplete").prop('placeholder',"{{$sou}}");
    });
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
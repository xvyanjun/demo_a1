@extends('layouts_q.tw_jz')
@section('title','列表展示')
@section('content')
    {{--<link rel="stylesheet" type="text/css" href="/qtai/css/widget-jquery.autocomplete.css" />--}}
    <link rel="stylesheet" type="text/css" href="/qtai/css/pages-shop.css" />
    <script type="text/javascript" src="/qtai/js/pages/seckill-index.js"></script>
    <script type="text/javascript" src="/qtai/js/pages/shop.js"></script>

    <div class="banner" style="text-align:center;">
        <img src="/qtai/img/_/shop-intro.png" alt="">
    </div>
    <div class="default-list">
        <div class="title" style="text-align:center;">
            <h1>Must have+</h1>
            <h2>畅销夏日装备</h2>
        </div>
        <div class="goods-list">
            <ul class="yui3-g" id="goods-list">
                @foreach($goods_info as $k=>$v)

                <li class="yui3-u-1-4" style="width: 300px;height: 406px; @if($k%4==0)margin-left: 15%; @endif" >
                    <div class="list-wrap">
                        <div class="p-img"><img src="/{{$v['goods_img']}}" width="220" height="282" alt=''></div>
                        <div class="price"><strong><em>¥</em> <i>{{$v['goods_price']}}</i></strong></div>
                        <div class="attr" title="{{$v['goods_name']}}"><em>{{mb_substr($v['goods_name'],0,9)}}</em></div>
                        <div class="cu">{{--<em><span></span>满一件可参加超值换购</em>--}}</div>
                        <div class="operate">
                            <a href="/goods_list/{{$v['goods_id']}}" class="sui-btn btn-bordered btn-danger">查看详情</a>
                            <a href="javascript:;" goods_id="{{$v['goods_id']}}"  class="sui-btn btn-bordered guanzhu">关注</a>
                        </div>
                    </div>
                </li >
                @endforeach
            </ul>
        </div>
        <!--tab list end-->
    </div>


    <!--回到顶部-->
    <div class="cd-top">
        <div class="top">
            <img src="/qtai/img/_/gotop.png" />
            <b>TOP</b>
        </div>
        <div class="code" id="code">
            <span><img src="/qtai/img/_/code.png"/></span>
        </div>
        <div class="erweima">
            <img src="/qtai/img/_/erweima.jpg" alt="">
            <s></s>
        </div>
    </div>
    </div>


    <!-- 底部栏位 -->
    <!--页面底部-->
    <script>
        /************************************************关注**********************************************************************/
        $(document).on("click",".guanzhu",function(){
            var goods_id=$(this).attr('goods_id');
//            console.log(goods_id);
            $.ajax({
                url: "/collect/guanzhu",
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
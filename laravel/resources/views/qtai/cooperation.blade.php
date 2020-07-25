@extends('layouts_q.tw_jz')
@section('title','友情链接')
@section('content')
<script type="text/javascript" src="/qtai/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	$("#service").hover(function(){
		$(".service").show();
	},function(){
		$(".service").hide();
	});
	$("#shopcar").hover(function(){
		$("#shopcarlist").show();
	},function(){
		$("#shopcarlist").hide();
	});

})
</script>
<script type="text/javascript" src="/qtai/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/qtai/js/plugins/sui/sui.min.js"></script>
<link rel="stylesheet" type="text/css" href="/qtai/css/webbase.css" />
<link rel="stylesheet" type="text/css" href="/qtai/css/pages-cooperation.css" />
</body>
        <!--供应商-->
        <div class="banner">        
        </div>
        <div class="cooperation">
            <div class="py-container">
                <div class="title">
                    <h1>合作伙伴</h1>
                    <h4>cooperation and Investment</h4>
                </div>
                <div class="co-list">
                    <div class="showbanner">
                        <img src="/qtai/img/_/01.png" alt="">
                    </div>
                    <div class="list">
                        <ul >
                            @foreach($friend as $k=>$v)
                            <li><a href="{{$v->f_url}}">{{$v->f_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
	<!-- 底部栏位 -->
	<!--页面底部-->
<!--页面底部END-->
@endsection 

</html>
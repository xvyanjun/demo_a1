@extends('layouts_q.cart_jz')
@section('title','购物车')
@section('content')
		<div class="allgoods">
			<h4>全部商品<span>11</span></h4>
			<div class="cart-main">
				<div class="yui3-g cart-th">
					<div class="yui3-u-1-4"><input type="checkbox" id="check_all" name='ck_jb0500' value="" /> 全部</div>
					<div class="yui3-u-1-4">商品</div>
					<div class="yui3-u-1-8">单价（元）</div>
					<div class="yui3-u-1-8">数量</div>
					<div class="yui3-u-1-8">小计（元）</div>
					<div class="yui3-u-1-8">操作</div>
				</div>
				<div class="cart-item-list">
					<div class="cart-body">
						@foreach($cat_list as $t=>$y)
						<div class="cart-list" id='list_one'>
							<ul class="goods-list yui3-g" id='ul_id'>
								<li class="yui3-u-1-24">
									<input type="checkbox" name="ck_jb0528" trolley_id="{{$y['trolley_id']}}" id="" value="" />
								</li>
								<li class="yui3-u-11-24">
									<div class="good-item">
										<div class="item-img"><img style="width:82px;height:82px;" src="{{$y['goods_id']['goods_img']}}" /></div>
										<div class="item-msg">{{$y['goods_id']['goods_name']}}
										&nbsp;
                                        @foreach($y['id']['sku'] as $e_m1=>$e_m2)
                                          @if($e_m1=='0')
                                           {{'/'.$e_m2['val_name'].'/'}}
                                          @else
                                           {{$e_m2['val_name'].'/'}}
                                          @endif
                                        @endforeach
										</div>
									</div>
								</li>
								
								<li class="yui3-u-1-8"><span class="price">{{$y['price_one']}}</span></li>
								<li class="yui3-u-1-8">
									<a href="javascript:void(0)" class="increment mins" property_id="{{$y['id']['id']}}" trolley_id="{{$y['trolley_id']}}" id='num_n'>-</a>
									<input autocomplete="off" type="text" id='vl' trolley_id="{{$y['trolley_id']}}" value="{{$y['goods_num']}}" class="itxt" />
									<a href="javascript:void(0)" class="increment plus" property_id="{{$y['id']['id']}}" trolley_id="{{$y['trolley_id']}}" id='num_y'>+</a>
								</li>
								<li class="yui3-u-1-8"><span class="sum" id='num_zong'>{{$y['price_one']*$y['goods_num']}}</span></li>
								<li class="yui3-u-1-8">
									<a href="#none" id="cat_del" trolley_id="{{$y['trolley_id']}}">删除</a><br />
									<!-- <a href="#none">移到我的关注</a> -->
								</li>
							</ul>
						</div>
						 @endforeach
						 <span id="list_new">&nbsp;</span>
					</div>
				</div>

			</div>
			<div class="cart-tool">
				<div class="select-all">
					<input type="checkbox" name="ck_jb0500" id="check_all_s" value="" />
					<span>全选</span>
				</div>
				<div class="option">
					<a href="#none" id='del_all'>删除选中的商品</a>
					<!-- <a href="#none">移到我的关注</a> -->
					<!-- <a href="#none">清除下柜商品</a> -->
				</div>
				<div class="toolbar">
					<div class="chosed">已选择<span id='selected_num'>0</span>件商品</div>
					<div class="sumprice">
						<span><!--<em>总价（不含运费） ：</em>--><i class="summoney" id='price_sum'>¥0</i></span>
						<!-- <span><em>已节省：</em><i>-¥20.00</i></span> -->
					</div>
					<div class="sumbtn">
						<a class="sum-btn" href="javascript:;" id='in_all' target="_blank">结算</a><!--/getOrderInfo-->
					</div>
				</div>
			</div>
			<!-- eva -->
			<div class="clearfix"></div>
			<div class="deled">
				<span id='del_list'>已删除商品，您可以重新购买或加关注：</span>
            @foreach($del_list as $k1=>$k2)
            <div class='cart-list del' id='eva_29004'>
            	<ul class='goods-list yui3-g'>
            		<li class='yui3-u-1-2'>
            			<div class='good-item'>
            				<div class='item-msg'>{{$k2['goods_id']['goods_name']}}
            					&nbsp;
                                @foreach($k2['id']['sku'] as $e_n1=>$e_n2)
                                  @if($e_n1=='0')
                                   {{'/'.$e_n2['val_name'].'/'}}
                                  @else
                                   {{$e_n2['val_name'].'/'}}
                                  @endif
                                @endforeach
            				</div>
            			</div>
            		</li>
            		<li class='yui3-u-1-6'>
            			<span class='price'>单价: {{$k2['price_one']}}</span>
            		</li>
            		<li class='yui3-u-1-6'>
            			<span class='number'>数量:{{$k2['goods_num']}}&nbsp;&nbsp;&nbsp;&nbsp;            总价:{{$k2['price_total']}}</span>
            		</li>
            		<li class='yui3-u-1-8'>
            			&nbsp;&nbsp;&nbsp;
            			<a href='#none' id='del_new' trolley_id="{{$k2['trolley_id']}}">重新购买</a>
            			&nbsp;&nbsp;&nbsp;
            			<a href='#none' id='del_yes' trolley_id="{{$k2['trolley_id']}}">删除本记录</a>
            		</li>
            	</ul>
            </div>
            @endforeach
			</div>
			<div class="liked" id='guess_as_love'>
				<ul class="sui-nav nav-tabs">
					<li class="active">
						<a href="#index" data-toggle="tab">猜你喜欢</a>
					</li>
				</ul>
				<div class="clearfix"></div>
				<div class="tab-content">
					<div id="index" class="tab-pane active">
						<div id="myCarousel" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
							<div class="carousel-inner">
								<div class="active item">
									<ul>
										@foreach($history_goods as $yj_1=>$yj_2)
										@if($yj_1<4)
										<li>
											<img style="width:202px;height:182px;" src="{{$yj_2['goods_img']}}" />
											<div class="intro">
												<i>{{mb_substr($yj_2['goods_name'],0,4)}}...</i>
											</div>
											<div class="money">
												<span>${{mb_substr($yj_2['goods_price'],0,4)}}</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">查看详情</span></a>
											</div>
										</li>
										@endif
										@endforeach
									</ul>
								</div>
								<div class="item">
									<ul>
                                        @foreach($history_goods as $yk_1=>$yk_2)
										@if($yk_1>=4)
										<li>
											<img style="width:202px;height:182px;" src="{{$yk_2['goods_img']}}" />
											<div class="intro">
												<i>{{mb_substr($yk_2['goods_name'],0,4)}}...</i>
											</div>
											<div class="money">
												<span>${{mb_substr($yk_2['goods_price'],0,4)}}</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">查看详情</span></a>
											</div>
										</li>
                                        @endif
										@endforeach
									</ul>
								</div>
							</div>
							<a href="#myCarousel" data-slide="prev" class="carousel-control left">‹</a>
							<a href="#myCarousel" data-slide="next" class="carousel-control right">›</a>
						</div>
					</div>
				</div>
			</div>
		</div>
    <script>
//------------------------------------------------------------------------------减 	
		   $(document).on('click','#num_n',function(){
		   	var ts=$(this);
		   	var trolley_id=$(this).attr('trolley_id');
		   	var property_id=$(this).attr('property_id');
		   	var zz=/^\d{1,}$/;
		   	var f1=false;
		   	if(!zz.test(trolley_id)||trolley_id<=0){
		   	  console.log('trolley_id获取失败');
		   	  f1=false;
		   	}else{
		   	  f1=true;
		   	}
		   	var f2=false;
		   	if(!zz.test(property_id)||property_id<=0){
		   	  console.log('goods_id获取失败');
		   	  f2=false;
		   	}else{
		   	  f2=true;
		   	}
		   	if(f1==true&&f2==true){
		   		$.ajax({
		   	      url:'/cat_num_ny',
		   	      type:'post',
		   	      dataType:'json',
		   	      data:{'trolley_id':trolley_id,'property_id':property_id,'num_ny':'eva_n'},
		   	      success:function(jk_n){
                   if(jk_n.a1==0){
                     ts.parent().find('#vl').val(jk_n.a3['jk_1']);
                     ts.parents("#ul_id").find('#num_zong').text(jk_n.a3['jk_2']);
                   }
                   instant_price();
                   console.log(jk_n.a2);
		   	      }
		   	    });
		        console.log(trolley_id,property_id);
		   	}
		   });
//------------------------------------------------------------------------------加 
		   $(document).on('click','#num_y',function(){
		   	    var ts=$(this);
		      	var trolley_id=$(this).attr('trolley_id');
		      	var property_id=$(this).attr('property_id');
		      	var zz=/^\d{1,}$/;
		      	var f1=false;
		   	    if(!zz.test(trolley_id)||trolley_id<=0){
		   	      console.log('trolley_id获取失败');
		   	      f1=false;
		   	    }else{
		   	      f1=true;
		   	    }
		   	    var f2=false;
		   	    if(!zz.test(property_id)||property_id<=0){
		   	      console.log('goods_id获取失败');
		   	      f2=false;
		   	    }else{
		   	      f2=true;
		   	    }
		   	    if(f1==true&&f2==true){
		   	    	$.ajax({
		   	  	      url:'/cat_num_ny',
		   	  	      type:'post',
		   	  	      dataType:'json',
		   	  	      data:{'trolley_id':trolley_id,'property_id':property_id,'num_ny':'eva_y'},
		   	  	      success:function(jk_y){
                        if(jk_y.a1==0){
                            ts.parent().find('#vl').val(jk_y.a3['jk_1']);
                            ts.parents("#ul_id").find('#num_zong').text(jk_y.a3['jk_2']);
                        }
                        instant_price();
                        console.log(jk_y.a2);
		   	  	      }
		   	        });
		      	    console.log(trolley_id,property_id);
		   	    }
		    });
//------------------------------------------------------------------------------
            $(document).on('blur','#vl',function(){
            	var ts=$(this);
            	var trolley_id=$(this).attr('trolley_id');
            	var goods_num=$(this).val();
            	var zz=/^\d{1,}$/;
		      	var f1=false;
		   	    if(!zz.test(trolley_id)||trolley_id<=0){
		   	      console.log('trolley_id获取失败');
		   	      f1=false;
		   	    }else{
                  f1=true;
		   	    }	
		   	    if(!zz.test(goods_num)||goods_num<=0){
                  goods_num=1;
		   	    }
		   	    if(f1==true){
		   	    	$.ajax({
		   	  	      url:'/cat_num_ny_s',
		   	  	      type:'post',
		   	  	      dataType:'json',
		   	  	      data:{'trolley_id':trolley_id,'goods_num':goods_num},
		   	  	      success:function(jk_y_vl){
                        if(jk_y_vl.a1==0){
                            ts.parent().find('#vl').val(jk_y_vl.a3['jk_1']);
                            ts.parents("#ul_id").find('#num_zong').text(jk_y_vl.a3['jk_2']);
                        }
                        instant_price();
                        console.log(jk_y_vl.a2);
		   	  	      }
		   	        });		   	    	
		   	    }

		   	    console.log(trolley_id,goods_num);
            });
//------------------------------------------------------------------------------单个删除
            $(document).on('click','#cat_del',function(){
              var ts=$(this);	
              var trolley_id=$(this).attr('trolley_id');
                  var zz=/^\d{1,}$/;
		   	      if(!zz.test(trolley_id)||trolley_id<=0){
		   	        console.log('trolley_id获取失败');
		   	      }else{
		   	    	$.ajax({
		   	  	      url:'/cart_num_del',
		   	  	      type:'post',
		   	  	      dataType:'json',
		   	  	      data:{'trolley_id':trolley_id},
		   	  	      success:function(jk_del){
                        if(jk_del.a1==0){

                          var name_s='';	
                          var sku_s=jk_del.a3[0]['id']['sku'];
                          var cd=sku_s.length;
                          for(var js_1=0;js_1<=cd-1;js_1++){
                          	if(js_1==0){
                             name_s=name_s+'/'+jk_del.a3[0]['id']['sku'][js_1]['val_name']+'/';
                          	}else{
                             name_s=name_s+jk_del.a3[0]['id']['sku'][js_1]['val_name']+'/';
                          	}
                          }

                          ts.parents("#list_one").remove(); 
                          var del_one="<div class='cart-list del' id='eva_29004'><ul class='goods-list yui3-g'><li class='yui3-u-1-2'><div class='good-item'><div class='item-msg'>"+jk_del.a3[0]['goods_id']['goods_name']+'&nbsp;'+name_s+"</div></div></li><li class='yui3-u-1-6'><span class='price'>单价: "+jk_del.a3[0]['price_one']+"</span></li><li class='yui3-u-1-6'><span class='number'>数量:"+jk_del.a3[0]['goods_num']+'&nbsp;&nbsp;&nbsp;&nbsp;总价:'+jk_del.a3[0]['price_total']+"</span></li><li class='yui3-u-1-8'>&nbsp;&nbsp;&nbsp;<a href='#none' id='del_new' trolley_id='"+jk_del.a3[0]['trolley_id']+"'>重新购买</a>&nbsp;&nbsp;&nbsp;<a href='#none' id='del_yes' trolley_id='"+jk_del.a3[0]['trolley_id']+"'>删除本记录</a></li></ul></div>";
                          $("#del_list").append(del_one); 
                        }
                        instant_price();
                        console.log(jk_del.a2);
		   	  	      }
		   	        });
		   	      }
            });
//------------------------------------------------------------------------------重新加入购物车
            $(document).on('click','#del_new',function(){
            	var ts=$(this);
            	var trolley_id=$(this).attr('trolley_id');
            	var zz=/^\d{1,}$/;
		   	      if(!zz.test(trolley_id)||trolley_id<=0){
		   	        console.log('trolley_id获取失败');
		   	      }else{
		   	    	$.ajax({
		   	  	      url:'/cart_num_del_new',
		   	  	      type:'post',
		   	  	      dataType:'json',
		   	  	      data:{'trolley_id':trolley_id},
		   	  	      success:function(jk_new){
                        if(jk_new.a1==0){

                          var name_s='';	
                          var sku_s=jk_new.a3[0]['id']['sku'];
                          var cd=sku_s.length;
                          for(var js_1=0;js_1<=cd-1;js_1++){
                          	if(js_1==0){
                             name_s=name_s+'/'+jk_new.a3[0]['id']['sku'][js_1]['val_name']+'/';
                          	}else{
                             name_s=name_s+jk_new.a3[0]['id']['sku'][js_1]['val_name']+'/';
                          	}
                          }

                          ts.parents("#eva_29004").remove(); 
                          var new_one="<div class='cart-list' id='list_one'><ul class='goods-list yui3-g' id='ul_id'><li class='yui3-u-1-24'><input type='checkbox' name='ck_jb0528' trolley_id='"+jk_new.a3[0]['trolley_id']+"' id='' value='' /></li><li class='yui3-u-11-24'><div class='good-item'><div class='item-img'><img style='width:82px;height:82px;' src='"+jk_new.a3[0]['goods_id']['goods_img']+"' /></div><div class='item-msg'>"+jk_new.a3[0]['goods_id']['goods_name']+'&nbsp;'+name_s+"</div></div></li><li class='yui3-u-1-8'><span class='price'>"+jk_new.a3[0]['price_one']+"</span></li><li class='yui3-u-1-8'><a href='javascript:void(0)' class='increment mins' property_id='"+jk_new.a3[0]['id']['id']+"' trolley_id='"+jk_new.a3[0]['trolley_id']+"' id='num_n'>-</a><input autocomplete='off' type='text' id='vl' trolley_id='"+jk_new.a3[0]['trolley_id']+"' value='"+jk_new.a3[0]['goods_num']+"' class='itxt' /><a href='javascript:void(0)' class='increment plus' property_id='"+jk_new.a3[0]['id']['id']+"' trolley_id='"+jk_new.a3[0]['trolley_id']+"' id='num_y'>+</a></li><li class='yui3-u-1-8'><span class='sum' id='num_zong'>"+jk_new.a3[0]['price_one']*jk_new.a3[0]['goods_num']+"</span></li><li class='yui3-u-1-8'><a href='#none' id='cat_del' trolley_id='"+jk_new.a3[0]['trolley_id']+"'>删除</a><br /></li></ul></div>";
                          $("#list_new").prepend(new_one); 
                        }
                        console.log(jk_new.a2);
		   	  	      }
		   	        });
		   	      }
            });
//------------------------------------------------------------------------------批量删除
            $(document).on('click','#del_all',function(){
            	var jk_num=0;
            	var trolley_id_s='';
            	$("[type='checkbox'][name='ck_jb0528']:checked").each(function(index, el) {
            		var vl_a=$(this).attr("trolley_id");
            		var vl_a_vl=parseInt(vl_a);
            		    trolley_id_s+=vl_a_vl+',';
                    jk_num=jk_num+1;
            	});
            	var cd=trolley_id_s.length;
            	var trolley_id_s=trolley_id_s.substr(0,cd-1);
            	if(jk_num>0){
            	  $.ajax({
            	  	url:'/cart_num_dels',
            	  	type:'post',
            	  	dataType:'json',
            	  	data:{'trolley_id':trolley_id_s},
            	  	success:function(jk_dels){
            	  		if(jk_dels.a1==0){
            	         $("[type='checkbox'][name='ck_jb0528']:checked").each(function(index, el) {
            	         	var vl_a=$(this).parents("#list_one").remove();
            	         });	
                         for(var p_uj=0;p_uj<=jk_dels.a4-1;p_uj++){

                          var name_s='';	
                          var sku_s=jk_dels.a3[p_uj]['id']['sku'];
                          var cd=sku_s.length;
                          for(var js_1=0;js_1<=cd-1;js_1++){
                          	if(js_1==0){
                             name_s=name_s+'/'+jk_dels.a3[p_uj]['id']['sku'][js_1]['val_name']+'/';
                          	}else{
                             name_s=name_s+jk_dels.a3[p_uj]['id']['sku'][js_1]['val_name']+'/';
                          	}
                          }

                          var del_one="<div class='cart-list del' id='eva_29004'><ul class='goods-list yui3-g'><li class='yui3-u-1-2'><div class='good-item'><div class='item-msg'>"+jk_dels.a3[p_uj]['goods_id']['goods_name']+'&nbsp;'+name_s+"</div></div></li><li class='yui3-u-1-6'><span class='price'>单价: "+jk_dels.a3[p_uj]['price_one']+"</span></li><li class='yui3-u-1-6'><span class='number'>数量:"+jk_dels.a3[p_uj]['goods_num']+'&nbsp;&nbsp;&nbsp;&nbsp;总价:'+jk_dels.a3[p_uj]['price_total']+"</span></li><li class='yui3-u-1-8'>&nbsp;&nbsp;&nbsp;<a href='#none' id='del_new' trolley_id='"+jk_dels.a3[p_uj]['trolley_id']+"'>重新购买</a>&nbsp;&nbsp;&nbsp;<a href='#none' id='del_yes' trolley_id='"+jk_dels.a3[p_uj]['trolley_id']+"'>删除本记录</a></li></ul></div>";
                          $("#del_list").append(del_one); 
                         }
            	  		}
            	  		instant_price();
            	  		console.log(jk_dels.a2);
            	  	}
            	  });	
            	}
            	console.log(jk_num,trolley_id_s);
            });
//------------------------------------------------------------------------------点击全选选中
            $(document).on('click','#check_all,#check_all_s',function(){
            	var sf=$(this).prop('checked');
            	$("[type='checkbox'][name='ck_jb0528']").prop('checked',sf);
            	$("[type='checkbox'][name='ck_jb0500']").prop('checked',sf);
            	instant_price();
            	// console.log(sf);
            });
//------------------------------------------------------------------------------点击每件商品复选框
            $(document).on('click',"[type='checkbox'][name='ck_jb0528']",function(){
            	instant_price();
            });

//------------------------------------------------------------------------------计算被选中商品总数,总价
            function instant_price(){
            	var sf=0;
            	var quantity=0;
            	var price=0;
            	$("[type='checkbox'][name='ck_jb0528']:checked").each(function(index, el) {
            		var q_ty=$(this).parents("#list_one").find('#vl').val();
            		var q_ty_vl=parseInt(q_ty);
            		quantity=quantity+q_ty_vl;
            		var p_ce=$(this).parents("#list_one").find('#num_zong').text();
            		var p_ce_vl=parseInt(p_ce);
            		price=price+p_ce_vl;

                    sf=sf+1;
            	});
            	if(sf==0){
            	$("#check_all").prop('checked',false);
            	$("#check_all_s").prop('checked',false);
            	}
                $("#selected_num").text(quantity);
                $("#price_sum").text('￥:'+price);
            	console.log(quantity,price);
            }
//------------------------------------------------------------------------------
            $(document).on('click','#del_yes',function(){
            	var ts=$(this);
            	var trolley_id=$(this).attr('trolley_id');
            	var zz=/^\d{1,}$/;
		   	      if(!zz.test(trolley_id)||trolley_id<=0){
		   	        console.log('trolley_id获取失败');
		   	      }else{
		   	      	$.ajax({
		   	      	  url:'/cart_del_yes',
		   	      	  type:'post',
		   	      	  dataType:'json',
		   	      	  data:{'trolley_id':trolley_id},
		   	      	  success:function(mn_a2){
                        if(mn_a2.a1==0){
                         ts.parents("#eva_29004").remove(); 
                         console.log('eva_del');
                        }
                        console.log(mn_a2.a2);
		   	      	  }	
		   	      	});
		   	      }
            });
//------------------------------------------------------------------------------
            $(document).on('click','#in_all',function(){
            	var sf_j1=0;
            	var ar_s='';
            	$("[type='checkbox'][name='ck_jb0528']:checked").each(function(index, el) {
            		var trolley_id=$(this).attr('trolley_id');
                        ar_s=ar_s+trolley_id+',';
                        sf_j1=sf_j1+1;
            	});
            	var cd=ar_s.length;
            	    ar_s=ar_s.substr(0,cd-1);
            	if(sf_j1>0){
            	  location.href='/getOrderInfo?trolley_id_s='+ar_s;
            	}else{
            	  console.log('未选择商品');
            	}    
            });
//------------------------------------------------------------------------------
           
//------------------------------------------------------------------------------ 		   
	</script>
@endsection

                            <div class="orders">
                               <!--  <div class="choose-order">
                                    <label data-toggle="checkbox" class="checkbox-pretty"> -->
                                        <!--class="checkbox-pretty checked"-->
                                        <!-- <input type="checkbox" ><span>全选</span>
                                    </label>
                                    <a href="" class="sui-btn btn-info btn-bordered hepay-btn">合并付款</a>
                                </div> -->
                                
                                <!-- eva_list -->
                                @foreach($shop_order as $g1=>$g2)
                                <div id='eva_jk'>
                                 @if($g2['cd']==1)
                                <div class="choose-title">
                                    <label data-toggle="checkbox" class="checkbox-pretty ">
                                           <input type="checkbox" checked="checked"><span>{{date('Y-m-d H:i',$g2['bast_time'])}}　订单编号：{{$g2['order_sn']}}  </span>
                                     </label>
                                    <!-- <a class="sui-btn btn-info share-btn">分享</a> -->
                                </div>
                                <table class="sui-table table-bordered order-datatable">
                                    <tbody>
                                        @foreach($g2['order_details'] as $vs1=>$vs2)
                                        <tr>
                                            <td width="35%">
                                                <div class="typographic"><img style="width:80px;height:80px;" src="{{$vs2['goods_id']['goods_img']}}" />
                                                    <a href="javascript:;" class="block-text">{{$vs2['goods_id']['goods_name']}}
                                                    </a>
                                                    <br>
                                                    <span class="guige">
                                                        属性:
                                                        @foreach($vs2['sku']['sku'] as $fg1=>$fg2)
                                                         @if($fg1==0)
                                                          /{{$fg2['val_name']}}/
                                                         @else
                                                          {{$fg2['val_name']}}/
                                                         @endif
                                                        @endforeach
                                                    </span>
                                                </div>
                                            </td>
                                            <td width="5%" class="center">
                                                <ul class="unstyled">
                                                    <li>¥{{$vs2['sku']['price']}}</li>
                                                </ul>
                                            </td>
                                            <td width="5%" class="center">{{$vs2['buy_number']}}</td>
                                            @php 
                                             $status_eva='';
                                             if($g2['pay_status']=='0'){
                                             $status_eva='已取消';
                                             }else if($g2['pay_status']=='1'){
                                             $status_eva='待付款';
                                             }else if($g2['pay_status']=='2'){
                                             $status_eva='待发货';
                                             }else if($g2['pay_status']=='3'){
                                             $status_eva='待收货';
                                             }else if($g2['pay_status']=='4'){
                                             $status_eva='已完成订单';
                                             }

                                             $goods_one='';
                                             if($vs2['datails_status']=='0'){
                                             $goods_one='已取消.';
                                             }else if($vs2['datails_status']=='1'){
                                             $goods_one='待付款.';
                                             }else if($vs2['datails_status']=='2'){
                                             $goods_one='待发货.';
                                             }else if($vs2['datails_status']=='3'){
                                             $goods_one='待收货.';
                                             }else if($vs2['datails_status']=='4'){
                                             $goods_one='已收货.';
                                             }
                                            @endphp
                                            <td width="8%" class="center">
                                                <ul class="unstyled">
                                                    <li>{{$goods_one}}</li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center">
                                                <ul class="unstyled">
                                                    <li>¥{{$g2['order_amount']}}</li>
                                                    <!-- <li>（含运费：￥0.00）</li> -->
                                                </ul>
                                            </td>
                                            <td width="10%" class="center">
                                                <ul class="unstyled">
                                                    <li>{{$status_eva}}</li>
                                                    <!-- <li><a href="orderDetail.html" class="btn">订单详情 </a></li> -->
                                                </ul>


                                            </td>
                                            <td width="10%" class="center">
                                                <ul class="unstyled">
                                                    <li><a href="javascript:;" order_id="{{$g2['order_id']}}" id='zfu_y' class="sui-btn btn-info">立即付款</a></li>
                                                    <li><a href="javascript:;" order_id="{{$g2['order_id']}}" id='qxiao_n'>取消订单</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                 @else
                                <div class="choose-title">
                                    <label data-toggle="checkbox" class="checkbox-pretty ">
                                           <input type="checkbox" checked="checked"><span>
                                           {{date('Y-m-d H:i',$g2['bast_time'])}}　订单编号：{{$g2['order_sn']}}</span>
                                     </label>
                                      <!-- <a class="sui-btn btn-info share-btn">分享</a> -->
                                </div>
                                   
                                <table class="sui-table table-bordered order-datatable">
                                    <tbody>
                                        @foreach($g2['order_details'] as $v1=>$v2)
                                         @if($v1==0)
                                        <tr>
                                            <td width="35%">
                                                <div class="typographic"><img style="width:80px;height:80px;" src="{{$v2['goods_id']['goods_img']}}" />
                                                    <a href="javascript:;" class="block-text">{{$v2['goods_id']['goods_name']}}
                                                    </a>
                                                    <br>
                                                    <span class="guige">
                                                    属性: 
                                                    @foreach($v2['sku']['sku'] as $fg_1=>$fg_2)
                                                         @if($fg_1==0)
                                                          /{{$fg_2['val_name']}}/
                                                         @else
                                                          {{$fg_2['val_name']}}/
                                                         @endif
                                                    @endforeach
                                                    </span>
                                                </div>
                                            </td>
                                            <td width="5%" class="center">
                                                <ul class="unstyled">
                                                    <li>¥{{$v2['sku']['price']}}</li>
                                                </ul>
                                            </td>
                                            <td width="5%" class="center">{{$v2['buy_number']}}</td>
                                            @php 
                                             $status_eva_s='';
                                             if($g2['pay_status']=='0'){
                                             $status_eva_s='已取消';
                                             }else if($g2['pay_status']=='1'){
                                             $status_eva_s='待付款';
                                             }else if($g2['pay_status']=='2'){
                                             $status_eva_s='待发货';
                                             }else if($g2['pay_status']=='3'){
                                             $status_eva_s='待收货';
                                             }else if($g2['pay_status']=='4'){
                                             $status_eva_s='已完成订单';
                                             }

                                             $goods_one_s='';
                                             if($v2['datails_status']=='0'){
                                             $goods_one_s='已取消.';
                                             }else if($v2['datails_status']=='1'){
                                             $goods_one_s='待付款.';
                                             }else if($v2['datails_status']=='2'){
                                             $goods_one_s='待发货.';
                                             }else if($v2['datails_status']=='3'){
                                             $goods_one_s='待收货.';
                                             }else if($v2['datails_status']=='4'){
                                             $goods_one_s='已收货.';
                                             }
                                            @endphp
                                            <td width="8%" class="center">
                                                <ul class="unstyled">
                                                    <li>{{$goods_one_s}}</li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center" rowspan="{{$g2['cd']}}">
                                                <ul class="unstyled">
                                                    <li>¥{{$g2['order_amount']}}</li>
                                                    <!-- <li>（含运费：￥0.00）</li> -->
                                                </ul>
                                            </td>
                                            <td width="10%" class="center" rowspan="{{$g2['cd']}}">
                                                <ul class="unstyled">
                                                    <li>{{$status_eva_s}}</li>
                                                    <!-- <li><a href="orderDetail.html" class="btn">订单详情 </a></li> -->
                                                </ul>
                                            </td>
                                            <td width="10%" class="center" rowspan="{{$g2['cd']}}">
                                                <ul class="unstyled">
                                                    <li><a href="javascript:;" order_id="{{$g2['order_id']}}" id='zfu_y' class="sui-btn btn-info">立即付款</a></li>
                                                    <li><a href="javascript:;" order_id="{{$g2['order_id']}}" id='qxiao_n'>取消订单</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                         @else
                                        <tr>
                                            <td width="35%">
                                                <div class="typographic"><img style="width:80px;height:80px;" src="{{$v2['goods_id']['goods_img']}}" />
                                                    <a href="javascript:;" class="block-text">{{$v2['goods_id']['goods_name']}}
                                                    </a>
                                                    <br>
                                                    <span class="guige">
                                                    属性:    
                                                    @foreach($v2['sku']['sku'] as $fg_s1=>$fg_s2)
                                                         @if($fg_s1==0)
                                                          /{{$fg_s2['val_name']}}/
                                                         @else
                                                          {{$fg_s2['val_name']}}/
                                                         @endif
                                                    @endforeach
                                                    </span>
                                                </div>
                                            </td>
                                            <td width="5%" class="center">
                                                <ul class="unstyled">
                                                    <li>¥{{$v2['sku']['price']}}</li>
                                                </ul>
                                            </td>
                                            <td width="5%" class="center">{{$v2['buy_number']}}</td>
                                            @php 
                                             $goods_one_s_s='';
                                             if($v2['datails_status']=='0'){
                                             $goods_one_s_s='已取消.';
                                             }else if($v2['datails_status']=='1'){
                                             $goods_one_s_s='待付款.';
                                             }else if($v2['datails_status']=='2'){
                                             $goods_one_s_s='待发货.';
                                             }else if($v2['datails_status']=='3'){
                                             $goods_one_s_s='待收货.';
                                             }else if($v2['datails_status']=='4'){
                                             $goods_one_s_s='已收货.';
                                             }
                                            @endphp
                                            <td width="8%" class="center">
                                                <ul class="unstyled">
                                                    <li>{{$goods_one_s_s}}</li>
                                                </ul>
                                            </td>
                                        </tr>
                                         @endif
                                        @endforeach
                                    </tbody>
                                </table> 
                                 @endif
                                 </div>
                                @endforeach

                            </div>

                            <div class="choose-order">
                                <!-- <label data-toggle="checkbox" class="checkbox-pretty"> -->
                                    <!--class="checkbox-pretty checked"-->
                                        <!-- <input type="checkbox" ><span>全选</span> -->
                                    <!-- </label> -->
                                <!-- <a href="" class="sui-btn btn-info btn-bordered hepay-btn">合并付款</a> -->
                                <div class="sui-pagination pagination-large top-pages">
                                    {{$shop_order->appends($xx)->links()}}
                                </div>
                            </div>

                            <div class="clearfix"></div>

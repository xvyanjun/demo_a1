<?php

namespace App\Http\Controllers\index;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\shop_cat;
use App\Models\Goods;
use App\Models\shop_property;
use App\Models\shop_sku_val;
use App\Models\History;
use App\Models\Address;
use App\Models\Area;
use App\Models\shop_order;
use App\Models\shop_order_details;
use App\Models\shop_order_address;
use Illuminate\Support\Facades\Log;

class getOrderinfoController extends Controller
{
//---------------------------------------------------------
public function getOrderInfo(){
  $xx=request()->all();
  $a1=array_key_exists('trolley_id_s',$xx);
  if($a1==false){
  	// $fh=['a1'=>'1','a2'=>'参数缺失'];
  	// return json_encode($fh);exit;
  	return redirect('/cart');exit;
  }	
  $u_id=request()->session()->get('u_id');	

  $address_list=Address::where('address_del','1')->get();
  foreach($address_list as $k1=>$k2){
  	$k2['y_province']=Area::where('id',$k2['y_province'])->first();
  	$k2['y_city']=Area::where('id',$k2['y_city'])->first();
  	$k2['y_district']=Area::where('id',$k2['y_district'])->first();
  }
  $trolley_id_s=explode(',',$xx['trolley_id_s']);
  $num_up=0;
  $price_up=0;
  $cat_list=shop_cat::wherein('trolley_id',$trolley_id_s)->where([['u_id',$u_id],['trolley_del','1']])->get();
  foreach($cat_list as $r1=>$r2){
  	$num_up=$num_up+$r2['goods_num'];
  	$price_up=$price_up+($r2['price_one']*$r2['goods_num']);
  	$property=shop_property::where([['id',$r2['id']],['property_del','1']])->first();
 
    $sku_vl_id=$this->explode_id($property);
    $sku_vl_val=shop_sku_val::wherein('val_id',$sku_vl_id)->where('val_del','1')->get();
    $property['sku']=$sku_vl_val;
  	$r2['id']=$property;
  	$goods=Goods::where([['goods_id',$r2['goods_id']],['goods_del','1']])->first();
  	$r2['goods_id']=$goods;
  }
  $up_s=['num_up'=>$num_up,'price_up'=>$price_up];
  return view('qtai.getOrderInfo',['cat_list'=>$cat_list,'address_list'=>$address_list,'up_s'=>$up_s]);
}
//---------------------------------------------------------
public function explode_id($xxi){
  $sxing=[];   
  $c=0;
  $v=$xxi;
    $sku=explode(',',$v['sku']);
    foreach($sku as $f=>$g){
      $a1=strpos($g,'[')+1;
      $a2=strpos($g,':');
      $a2_s=$a2-$a1;
      $a3=substr($g,$a1,$a2_s);//属性id

      $a=strpos($g,':')+1;
      $b=strpos($g,']');
      $b_s=$b-$a;
      $c=substr($g,$a,$b_s);//属性值id
      if(array_key_exists($a3,$sxing)){
        $yvl=$sxing[$a3];
        $yvl_s=explode(',',$yvl);
        $num_s=0;
        foreach($yvl_s as $y1=>$y2){
          if($y2==$c){
            $num_s=$num_s+1;
          }
        }
        if($num_s==0){
          $sxing[$a3]=$yvl.$c.',';
        }
      }else{
        // $yvl='';
        $sxing[$a3]=$c.',';
      }
      // $sxing[$a3]=$yvl.$c.',';

    }

  foreach($sxing as $r=>$t){
    if(strlen($t)>1){
      $cd=strlen($t)-1;
      $sxing[$r]=substr($t,0,$cd);
    }else{
      $sxing[$r]='';
    }
  }
   
  $sxing=array_unique($sxing);
  return $sxing;
}
//---------------------------------------------------------

  //提交订单
  public function orderAdd(Request $request){
    $trolley_id=$request->trolley_id;
    $orderModel=new shop_cat;
    //判断是否有商品数据
    if(empty($trolley_id)){
      return ['code'=>'000001',"msg"=>"必须有一个商品"];
    }
    $address_id=$request->address_id;
    //判断收获地址不能为空
    if(empty($address_id)){
      return ['code'=>'000002',"msg"=>"收获地址不能为空"];
    }
    $trolley_id=explode(",",$trolley_id);
    // dd($trolley_id);
    //查询收获地址一条
    $address=Address::where("address_id",$address_id)->first();

    //查询商品一条
    $shop_cat=[];
    $price_total=0;
    foreach($trolley_id as $k=>$v){
      $troller=shop_cat::where("trolley_id",$v)->first();
      $shop_cat[$k]=$troller;
      $price_total=$troller['price_total']+$price_total;
    }
    // dd($shop_cat);
    $u_id=request()->session()->get('u_id');
    
    //添加订单
    //首先我们先开启事物
    $orderModel=new shop_order;
    DB::beginTransaction();
    //(1)存储到订单号
    //自定义一个订单号
    $order_sn=time().rand(100000,999999);
    $all=[
      'order_sn'=>$order_sn,
      'u_id'=>$u_id,
      'pay_status'=>1,
      'bast_time'=>time(),
      'payname'=>"支付宝",
      'goods_amount'=>$price_total,
      'order_amount'=>$price_total
    ];
    $res1=$orderModel->insert($all);
    if(empty($res1)){
      DB::rollback();
      return ['code'=>'000003','msg'=>'订单添加失败'];
    }
    
    //(2)存储地址表
    $addressModel=new shop_order_address;
    //获取order_id
    $order_id=shop_order::orderby("order_id","desc")->value('order_id');
    // dd($order_id);
    $all2=[
      'order_id'=>$order_id,
      'address_id'=>$address['address_id'],
      'user_name'=>$address['address_name'],
      'address'=>$address['address_addre'],
      'y_province'=>$address['y_province'],
      "y_city"=>$address['y_city'],
      'y_district'=>$address['y_district'],
      'order_site_time'=>time(),
    ];
    $res2=$addressModel->insert($all2);
    if(empty($res2)){
      DB::rollback();
      return ['code'=>'000004','msg'=>'地址存储失败'];
    }
    
    //(3)订单的商品存到订单详情表
    $detailsModel=new shop_order_details;
    // $all2=[];
    foreach($shop_cat as $k=>$v){
      $all3['goods_id']=$v['goods_id'];
      $all3['order_id']=$order_id;
      $all3['add_price']=$v['price_one'];
      $all3['buy_number']=$v['goods_num'];
      $all3['price_total']=$v['price_total'];
      $all3['order_goods_time']=time();
      $all3['sku']=$v['id'];
      $res3=$detailsModel->insert($all3);
    }
    // dd($all2);
    if(empty($res3)){
      DB::rollback();
      return ['code'=>'000005','msg'=>'存储详情失败'];
    }

    
    //添加成功提交
    DB::commit();
    return ['code'=>'000000','msg'=>'提交订单成功','order_id'=>$order_id];
  }
//--------------------------------------------------------
    public function paysuccess(){
      $xx=request()->all();
      $a1=array_key_exists('order_id',$xx);
      if(($a1==false)||(empty($xx['order_id']))){
        return back();exit;
      }
      $xxi=shop_order::where([['order_id',$xx['order_id']],['order_del','1']])->first();
      if($xxi){
        return view('qtai.pay',['order_all'=>$xxi]);
      }else{
        return back();exit;
      }
    }  
//--------------------------------------------------------
    public function zfu(){
        require_once app_path('libs/alipay/wappay/service/AlipayTradeService.php');
        require_once app_path('libs/alipay/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php');
        $config=config('alipayconfig');
        $xx=request()->all();
        $sf=array_key_exists('order_id',$xx);
        if(!$sf||empty($sf)){
          return back();exit;
        }
        $shop_order_all=shop_order::where([['order_id',$xx['order_id']],['order_del','1']])->first();
        if(!$shop_order_all){
          return back();exit;
        }
        $ddan=$shop_order_all['order_sn'];
        $je=$shop_order_all['order_amount'];
        // dd($ddan,$je);
        if (!empty($ddan)&& trim($ddan)!=""){
            //商户订单号，商户网站订单系统中唯一订单号，必填
            $out_trade_no =$ddan;
        
            //订单名称，必填
            $subject =time().'订单';
        
            //付款金额，必填
            $total_amount =$je;
        
            //商品描述，可空
            $body ='';
        
            //超时时间
            $timeout_express="5m";
        
            $payRequestBuilder = new \AlipayTradeWapPayContentBuilder();
            $payRequestBuilder->setBody($body);
            $payRequestBuilder->setSubject($subject);
            $payRequestBuilder->setOutTradeNo($out_trade_no);
            $payRequestBuilder->setTotalAmount($total_amount);
            $payRequestBuilder->setTimeExpress($timeout_express);
        
            $payResponse = new \AlipayTradeService($config);
            $result=$payResponse->wapPay($payRequestBuilder,$config['return_url'],$config['notify_url']);
        
            return ;
        }      
    }
//--------------------------------------------------------
    public function tbu(){
      /* *
       * 功能：支付宝页面跳转同步通知页面
       * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一      定要使用该代码。
      
       *************************页面功能说明*************************
       * 该页面可在本机电脑测试
       * 可放入HTML等美化页面的代码、商户业务逻辑程序代码
       */
      $config=config('alipayconfig');
      require_once app_path('libs/alipay/wappay/service/AlipayTradeService.php');
      
      
      $arr=$_GET;
      $alipaySevice = new \AlipayTradeService($config); 
      $result = $alipaySevice->check($arr);
      /* 实际验证过程建议商户添加以下校验。
      1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
      2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
      3、校验通知中的seller_id（或者seller_email)       是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
      4、验证app_id是否为该商户本身。
      */
      // dd($config,$arr,$result);
      if(!$result) {//验证成功
        /////////////////////////////////////////////////////////////////////////////////////////      ////////////////////////////////////////////
        //请在这里加上商户的业务逻辑程序代码
        
        //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
          //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表
      
        //商户订单号
      
        $out_trade_no = htmlspecialchars($_GET['out_trade_no']);

        //总金额
        $total_prices_s=$arr['total_amount'];
        $ex=explode('.',$total_prices_s);
        $total_prices_s=$ex[0];
      
        //支付宝交易号
      
        $trade_no = htmlspecialchars($_GET['trade_no']);
          

        Log::info('同步测试y');
        return view('qtai.paysuccess',['out_trade_no'=>$out_trade_no,'total_prices_s'=>$total_prices_s]);  
        echo'支付成功,订单号：'.$out_trade_no.'共支付：'.$total_prices_s;
 
        //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
        
        /////////////////////////////////////////////////////////////////////////////////////////      ////////////////////////////////////////////
      }else{
          //验证失败
          Log::info('同步测试n');
          $shop_order_all=shop_order::where([['order_sn',$arr['out_trade_no']],['order_del','1']])->first();  
          return view('qtai.payfail',['out_trade_no'=>$arr['out_trade_no'],'shop_order_all'=>$shop_order_all]);  
          echo "验证失败..";
      }
    }
//--------------------------------------------------------  
    public function ybu(){
       /* *
        * 功能：支付宝服务器异步通知页面
        * 版本：2.0
        * 修改日期：2016-11-01
        * 说明：
        * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一       定要使用该代码。
       
        *************************页面功能说明*************************
        * 创建该页面文件时，请留心该页面文件中无任何HTML代码及空格。
        * 该页面不能在本机电脑测试，请到服务器上做测试。请确保外部可以访问该页面。
        * 如果没有收到该页面返回的 success 信息，支付宝会在24小时内按一定的时间策略重发通知
        */
      $config=config('alipayconfig');
      require_once app_path('libs/alipay/wappay/service/AlipayTradeService.php');
       
       
       $arr=$_POST;
       $alipaySevice = new \AlipayTradeService($config); 
       $alipaySevice->writeLog(var_export($_POST,true));
       $result = $alipaySevice->check($arr);
       
       /* 实际验证过程建议商户添加以下校验。
       1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
       2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
       3、校验通知中的seller_id（或者seller_email)        是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
       4、验证app_id是否为该商户本身。
       */
       if($result) {//验证成功
         /////////////////////////////////////////////////////////////////////////////////////////       ////////////////////////////////////////////
         //请在这里加上商户的业务逻辑程序代
       
         
         //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
         
           //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表
         
         //商户订单号
       
         $out_trade_no = $_POST['out_trade_no'];
       
         //支付宝交易号
       
         $trade_no = $_POST['trade_no'];
       
         //交易状态
         $trade_status = $_POST['trade_status'];
       
       
           if($_POST['trade_status'] == 'TRADE_FINISHED') {
       
           //判断该笔订单是否在商户网站中已经做过处理
             //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执       行商户的业务程序
             //请务必判断请求时的total_amount与通知时获取的total_fee为一致的
             //如果有做过处理，不执行商户的业务程序
               
           //注意：
           //退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知
           }else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
           //判断该笔订单是否在商户网站中已经做过处理
             //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执       行商户的业务程序
             //请务必判断请求时的total_amount与通知时获取的total_fee为一致的
             //如果有做过处理，不执行商户的业务程序      
           //注意：
           //付款完成后，支付宝系统发送该交易状态通知
           }
         //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
         Log::info('异步测试y');      
         echo "success";   //请不要修改或删除

         $order_all=shop_order::where([['order_sn',$arr['out_trade_no']],['order_del','1']])->first();
         $xg_1=shop_order::where([['order_sn',$arr['out_trade_no']],['order_del','1']])->update([
         'pay_status'=>'2'
         ]);
         $xg_2=shop_order_details::where([['order_id',$order_all['order_id']],['datails_del','1']])->update([
         'datails_status'=>'2'
         ]);
       }else{
           //验证失败
           Log::info('异步测试n'); 
           echo "fail";  //请不要修改或删除

           $order_all=shop_order::where([['order_sn',$arr['out_trade_no']],['order_del','1']])->first();
           $xg_1=shop_order::where([['order_sn',$arr['out_trade_no']],['order_del','1']])->update(['pay_status'=>'2']);
           $xg_2=shop_order_details::where([['order_id',$order_all['order_id']],['datails_del','1']])->update(['datails_status'=>'2']);
       }      
    }
//--------------------------------------------------------  
}

<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Demo_eva_controller extends Controller
{
//--------------------------------------------------------
    public function zfu(){
        require_once app_path('libs/alipay/wappay/service/AlipayTradeService.php');
        require_once app_path('libs/alipay/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php');
        $config=config('alipayconfig');
        $xx=request()->all();
        $sf=array_key_exists('dd_id',$xx);
        // if(!$sf){return false;}
        // $id=Ddan::where('dd_id',$xx['dd_id'])->first();
        // $ddan=$id['ddh'];
        // $je=$id['dd_zj'];

        $a=date('His');
        $ddan='2280044000'.$a;

        $je='1000';
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
      
        //支付宝交易号
      
        $trade_no = htmlspecialchars($_GET['trade_no']);
          

        Log::info('同步测试y');
   
        echo'支付成功,订单号：'.$out_trade_no;
 
        //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
        
        /////////////////////////////////////////////////////////////////////////////////////////      ////////////////////////////////////////////
      }
      else {
          //验证失败
          Log::info('同步测试n');
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
           }
           else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
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
           
       }else {
           //验证失败
           Log::info('异步测试n'); 
           echo "fail";  //请不要修改或删除
       
       }      
    }
//--------------------------------------------------------  
public function eva_list(){
	dd('同步通知');
}    
//--------------------------------------------------------  
}

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

//---------------------------------------------------------

//---------------------------------------------------------

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
    return ['code'=>'000000','msg'=>'提交订单成功'];
  }


}
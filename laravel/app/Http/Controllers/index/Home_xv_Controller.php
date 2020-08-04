<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\shop_order;
use App\Models\shop_order_details;
use App\Models\shop_order_address;
use App\Models\Goods;
use App\Models\shop_property;
use App\Models\shop_sku_val;

class Home_xv_Controller extends Controller
{
//-------------------------------------------------------------------------
public function home_order_pay(){
	$xx=request()->all();
	$u_id=request()->session()->get('u_id');	
    if(empty($u_id)){return redirect('/login');}
	$shop_order=shop_order::where([['u_id',$u_id],['pay_status','1']])->paginate(4);
	foreach($shop_order as $c=>$v){
		$shop_order_details=shop_order_details::where([['order_id',$v['order_id']],['datails_del','1']])->get();
		foreach($shop_order_details as $f1=>$f2){
			$property=shop_property::where([['id',$f2['sku']],['property_del','1']])->first();

            $sku_vl_id=$this->explode_id($property);
            $sku_vl_val=shop_sku_val::wherein('val_id',$sku_vl_id)->where('val_del','1')->get();
            $property['sku']=$sku_vl_val;
        
  	        $f2['sku']=$property;
  	        $goods=Goods::where([['goods_id',$f2['goods_id']],['goods_del','1']])->first();
  	        $f2['goods_id']=$goods;
		}
		$cd=count($shop_order_details);
		$v['order_details']=$shop_order_details;
		$v['cd']=$cd;
	}
   
  $goods=Goods::orderby("goods_hits","desc")->limit(4)->get(); 

	if(request()->ajax()){
	  return view('qtai.home-order-pay_s',['shop_order'=>$shop_order,'xx'=>$xx,'goods'=>$goods]);
	}
	return view('qtai.home-order-pay',['shop_order'=>$shop_order,'xx'=>$xx,'goods'=>$goods]);
}
//-------------------------------------------------------------------------
public function home_order_pay_del(){
    $xx=request()->all();
    $u_id=request()->session()->get('u_id');  
    if(empty($u_id)){return redirect('/login');}
    $a1=array_key_exists('order_id',$xx);
    if(!$a1||empty($xx['order_id'])){
      $fh=['a1'=>'1','a2'=>'参数缺失'];
      return json_encode($fh);exit;
    }
    $del=shop_order::where([['order_id',$xx['order_id']],['order_del','1']])->update([
    'pay_status'=>'0'
    ]);
    if($del){
      $fh=['a1'=>'0','a2'=>'取消成功'];
    }else{
      $fh=['a1'=>'1','a2'=>'取消失败'];
    }
    return json_encode($fh);exit;
}
//-------------------------------------------------------------------------

//-------------------------------------------------------------------------

//-------------------------------------------------------------------------

//-------------------------------------------------------------------------

//-----------------------------------------------------------------------------
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
//-----------------------------------------------------------------------------
}

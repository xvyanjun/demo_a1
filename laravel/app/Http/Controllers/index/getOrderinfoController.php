<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\shop_cat;
use App\Models\Goods;
use App\Models\shop_property;
use App\Models\shop_sku_val;
use App\Models\History;
use App\Models\Address;
use App\Models\Area;

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
}

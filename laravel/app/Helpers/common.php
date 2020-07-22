<?php
use Illuminate\Http\Request;
use App\Models\shop_property;
use App\Models\shop_sku_name;
use App\Models\shop_sku_val;
//------------公共方法
//---------------------------------------------------------------
function EVA(){
	dd('EVA');
}
//---------------------------------------------------------------
function file_s($name){
	$wjs='';
      if(request()->hasFile($name)){
      $wjs=scs($name);
      // $wjs=implode(',',$wjs);
    }
    if($wjs==''){
    	return false;
    }else{
    	return $wjs;
    }
}
//---------------------------------------------------------------
function scs($xc){
  $arr=[];
  $xc=request()->$xc;
   foreach($xc as $c=>$v){
     if($v->isValid()){
        $lj=$v->store('uploads_s');
        $arr[$c]='/'.$lj;
     }
   }  
  return $arr;
} 
//---------------------------------------------------------------
function goods_sku($goods_id){
  $xxi=goods_sku_id($goods_id);
  $sku=[];
  foreach($xxi as $c=>$v){
   $sxing=shop_sku_name::where([['attr_id',$c],['attr_del','1']])->first();
   $sku[$c]=$sxing;
   $vl=shop_sku_val::where([['attr_id',$c],['val_del','1']])->get();
   $sku[$c]['val_s']=$vl;
  }
  return $sku;
}
//---------------------------------------------------------------
function goods_sku_id($goods_id){
  $xxi=shop_property::where([['goods_id',$goods_id],['property_del','1']])->get();

  $sxing=[];   
  foreach($xxi as $c=>$v){
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
      }else{
        $yvl='';
      }

      $sxing[$a3]=$yvl.$c.',';

    }
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
//---------------------------------------------------------------

//---------------------------------------------------------------

//---------------------------------------------------------------

//---------------------------------------------------------------
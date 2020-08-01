<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\shop_cat;
use App\Models\Goods;
use App\Models\shop_property;
use App\Models\shop_sku_val;
use App\Models\History;

class CartController extends Controller
{
//-----------------------------------------------------------------------------
public function cart(){
  $u_id=request()->session()->get('u_id');	
  if(empty($u_id)){return redirect('/login');}
  $cat_list=shop_cat::where([['u_id',$u_id],['trolley_del','1']])->get();
  foreach($cat_list as $r1=>$r2){
  	$property=shop_property::where([['id',$r2['id']],['property_del','1']])->first();

    $sku_vl_id=$this->explode_id($property);
    $sku_vl_val=shop_sku_val::wherein('val_id',$sku_vl_id)->where('val_del','1')->get();
    $property['sku']=$sku_vl_val;

  	$r2['id']=$property;
  	$goods=Goods::where([['goods_id',$r2['goods_id']],['goods_del','1']])->first();
  	$r2['goods_id']=$goods;
  }
  $del_list=shop_cat::where([['u_id',$u_id],['trolley_del','2']])->get();
  foreach($del_list as $r1=>$r2){
  	$property=shop_property::where([['id',$r2['id']],['property_del','1']])->first();

    $sku_vl_id=$this->explode_id($property);
    $sku_vl_val=shop_sku_val::wherein('val_id',$sku_vl_id)->where('val_del','1')->get();
    $property['sku']=$sku_vl_val;

  	$r2['id']=$property;
  	$goods=Goods::where([['goods_id',$r2['goods_id']],['goods_del','1']])->first();
  	$r2['goods_id']=$goods;
  }

    $history=History::where("u_id",$u_id)->orderby("h_hits","desc")->limit(1)->get('goods_id')->toArray();
    if($history){
      $cate_id=Goods::where(["goods_id"=>$history[0]['goods_id']])->first('cate_id')->toArray();
    $history_goods=Goods::where([["cate_id"=>$cate_id],['goods_show','1'],['goods_del','1']])->orderby("goods_hits","desc")->limit(8)->get()->toArray();
    }else{
      $history_goods=[];
    }

  return view('qtai.cart',['cat_list'=>$cat_list,'del_list'=>$del_list,'history_goods'=>$history_goods]);
}
//-----------------------------------------------------------------------------
public function cat_num_ny(){
	$xx=request()->all();
	$a1=array_key_exists('trolley_id',$xx);
	$a2=array_key_exists('property_id',$xx);
	$a3=array_key_exists('num_ny',$xx);
	if($a1==false||$a2==false||$a3==false){
		$fh=['a1'=>'1','a2'=>'参数缺失'];
		return json_encode($fh);exit;
	}
    $eva_f1=shop_cat::where([['trolley_id',$xx['trolley_id']],['trolley_del','1']])->first();
    $shu_a=$eva_f1['goods_num'];
	$eva_f2=shop_property::where([['id',$xx['property_id']],['property_del','1']])->first();
	$shu_b=$eva_f2['goods_stroe'];
	// return json_encode($shu_b);exit;
	if($xx['num_ny']=='eva_y'){
       if(($shu_a+1)<=$shu_b){
       	$goods_num=$shu_a+1;
       }else{
       	$goods_num=$shu_b;
       }
	}else if($xx['num_ny']=='eva_n'){
       $goods_num=$shu_a-1;
       if($goods_num<=0){
       	$goods_num=1;
       }
	}
	$price_total=$goods_num*$eva_f2['price'];
	$xg=shop_cat::where([['trolley_id',$xx['trolley_id']],['trolley_del','1']])->update([
    'goods_num'=>$goods_num,
    'price_total'=>$price_total
	]);
	$goods_vl=['jk_1'=>$goods_num,'jk_2'=>$price_total];
	if($xg){
      $fh=['a1'=>'0','a2'=>'修改成功','a3'=>$goods_vl];
	}else{
      $fh=['a1'=>'1','a2'=>'修改失败'];
	}
	return json_encode($fh);
}
//-----------------------------------------------------------------------------
public function cat_num_ny_s(){
  $xx=request()->all();
  $a1=array_key_exists('trolley_id',$xx);
  $a2=array_key_exists('goods_num',$xx);
  if($a1==false||$a2==false){
    $fh=['a1'=>'1','a2'=>'参数缺失'];
    return json_encode($fh);exit;
  }
  $eva_f1=shop_cat::where([['trolley_id',$xx['trolley_id']],['trolley_del','1']])->first();
  $eva_f2=shop_property::where([['id',$eva_f1['id']],['property_del','1']])->first();
  $shu_b=$eva_f2['goods_stroe'];
  $shu_c=$eva_f2['price'];
  if($xx['goods_num']>$shu_b){
    $goods_num=$shu_b;
  }else{
    $goods_num=$xx['goods_num'];
  }
  $price_total=$goods_num*$shu_c;
  $xg=shop_cat::where([['trolley_id',$xx['trolley_id']],['trolley_del','1']])->update([
    'goods_num'=>$goods_num,
    'price_total'=>$price_total
  ]);
  $goods_vl=['jk_1'=>$goods_num,'jk_2'=>$price_total];
  if($xg){
      $fh=['a1'=>'0','a2'=>'修改成功','a3'=>$goods_vl];
  }else{
      $fh=['a1'=>'1','a2'=>'修改失败'];
  }
  return json_encode($fh);
}
//-----------------------------------------------------------------------------
public function cart_num_del(){
	$xx=request()->all();
	$a1=array_key_exists('trolley_id',$xx);
	if($a1==false){
		$fh=['a1'=>'1','a2'=>'参数缺失'];
		return json_encode($fh);exit;
	}
	$del=shop_cat::where([['trolley_id',$xx['trolley_id']],['trolley_del','1']])->update(['trolley_del'=>'2']);
    $del_vl=shop_cat::where([['trolley_id',$xx['trolley_id']],['trolley_del','2']])->get();
    foreach($del_vl as $r1=>$r2){
  	   $property=shop_property::where([['id',$r2['id']],['property_del','1']])->first();

       $sku_vl_id=$this->explode_id($property);
       $sku_vl_val=shop_sku_val::wherein('val_id',$sku_vl_id)->where('val_del','1')->get();
       $property['sku']=$sku_vl_val;

  	   $r2['id']=$property;
  	   $goods=Goods::where([['goods_id',$r2['goods_id']],['goods_del','1']])->first();
  	   $r2['goods_id']=$goods;
    }
	if($del){
      $fh=['a1'=>'0','a2'=>'删除成功','a3'=>$del_vl];
	}else{
      $fh=['a1'=>'1','a2'=>'删除失败'];
	}
	return json_encode($fh);
}
//-----------------------------------------------------------------------------
public function cart_num_dels(){
  $xx=request()->all();
  $a1=array_key_exists('trolley_id',$xx);
  if($a1==false){
    $fh=['a1'=>'1','a2'=>'参数缺失'];
    return json_encode($fh);exit;
  }
  $xx['trolley_id']=explode(',',$xx['trolley_id']);
  $dels=shop_cat::wherein('trolley_id',$xx['trolley_id'])->where('trolley_del','1')->update(['trolley_del'=>'2']);
    $dels_vl=shop_cat::wherein('trolley_id',$xx['trolley_id'])->where('trolley_del','2')->get();
    $sum_up=count($dels_vl);
    foreach($dels_vl as $r1=>$r2){
       $property=shop_property::where([['id',$r2['id']],['property_del','1']])->first();

       $sku_vl_id=$this->explode_id($property);
       $sku_vl_val=shop_sku_val::wherein('val_id',$sku_vl_id)->where('val_del','1')->get();
       $property['sku']=$sku_vl_val;

       $r2['id']=$property;
       $goods=Goods::where([['goods_id',$r2['goods_id']],['goods_del','1']])->first();
       $r2['goods_id']=$goods;
    }
  if($dels){
      $fh=['a1'=>'0','a2'=>'删除成功','a3'=>$dels_vl,'a4'=>$sum_up];
  }else{
      $fh=['a1'=>'1','a2'=>'删除失败'];
  }
  return json_encode($fh);
}
//-----------------------------------------------------------------------------
public function cart_num_del_new(){
	$xx=request()->all();
	$a1=array_key_exists('trolley_id',$xx);
	if($a1==false){
		$fh=['a1'=>'1','a2'=>'参数缺失'];
		return json_encode($fh);exit;
	}
	$del_new=shop_cat::where([['trolley_id',$xx['trolley_id']],['trolley_del','2']])->update(['trolley_del'=>'1']);
    $new_vl=shop_cat::where([['trolley_id',$xx['trolley_id']],['trolley_del','1']])->get();
    foreach($new_vl as $r1=>$r2){
  	   $property=shop_property::where([['id',$r2['id']],['property_del','1']])->first();

       $sku_vl_id=$this->explode_id($property);
       $sku_vl_val=shop_sku_val::wherein('val_id',$sku_vl_id)->where('val_del','1')->get();
       $property['sku']=$sku_vl_val;

  	   $r2['id']=$property;
  	   $goods=Goods::where([['goods_id',$r2['goods_id']],['goods_del','1']])->first();
  	   $r2['goods_id']=$goods;
    }
	if($del_new){
      $fh=['a1'=>'0','a2'=>'重新加入成功','a3'=>$new_vl];
	}else{
      $fh=['a1'=>'1','a2'=>'重新加入失败'];
	}
	return json_encode($fh);
}
//-----------------------------------------------------------------------------
public function cart_del_yes(){
  $xx=request()->all();
  $a1=array_key_exists('trolley_id',$xx);
  if($a1==false){
    $fh=['a1'=>'1','a2'=>'参数缺失'];
    return json_encode($fh);exit;
  }
  $del_yes=shop_cat::where([['trolley_id',$xx['trolley_id']],['trolley_del','2']])->update(['trolley_del'=>'3']);
  if($del_yes){
      $fh=['a1'=>'0','a2'=>'删除成功'];
  }else{
      $fh=['a1'=>'1','a2'=>'删除失败'];
  }
  return json_encode($fh);
}
//-----------------------------------------------------------------------------
public function cat_top_list(){
  $u_id=request()->session()->get('u_id');
  if(empty($u_id)){$u_id=0;}
  $cd=shop_cat::where([['u_id',$u_id],['trolley_del','1']])->get();
  $cd=count($cd);
  if(!$cd){
    $cd=0;
  }
  return json_encode($cd);
}
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

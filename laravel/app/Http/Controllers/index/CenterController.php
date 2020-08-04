<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\shop_order;
use App\Models\shop_order_details;
use App\Models\shop_cat;
use App\Models\shop_property;
use App\Models\Goods;
use App\Models\shop_sku_val;
use App\Models\History;
class CenterController extends Controller
{
    //我的订单
    public function center(Request $request){
        $u_id=request()->session()->get('u_id');	
        if(empty($u_id)){return redirect('/login');}
        $shop_order=shop_order::where([['order_del','1'],['u_id',$u_id],['pay_status','>','0']])->paginate(4);
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
        
        // dd($shop_order);
        //热卖单品
        $goods=Goods::orderby("goods_hits","desc")->limit(4)->get();

        
        return view("qtai.home-index",['shop_order'=>$shop_order,'goods'=>$goods]);
    }
    //切分sku
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
}

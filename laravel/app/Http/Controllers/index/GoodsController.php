<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\Cate;
use App\Models\Goods;
use App\Models\History;
use App\Models\Shop_album;
use Illuminate\Http\Request;
use App\Models\shop_sku_name;
use App\Models\Propertyp;
use App\Models\shop_cat;
use App\Models\Brand;
class GoodsController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 详情
     */
    public function goods_list($id){
        //现在商品的数据
        $goods=new Goods();
        $goods_info=$goods::where(['goods_id'=>$id,'goods_del'=>1])->first()->toArray();
        //商品的相册
        $goods_images=new Shop_album();
        $info=$goods_images::where(['is_del'=>1,'goods_id'=>$goods_info['goods_id']])->get()->toArray();
        foreach($info as $k=>$v){
            $info[$k]['goods_imgs']=explode('|',$v['goods_imgs']);
        }
        //猜你喜欢
        $u_id=request()->session()->get('u_id');
        $history=History::where("u_id",$u_id)->orderby("h_hits","desc")->limit(1)->get('goods_id')->toArray();
        if($history){
            $cate_id=Goods::where(["goods_id"=>$history[0]['goods_id']])->first('cate_id')->toArray();
        $history_goods=Goods::where(["cate_id"=>$cate_id])->orderby("goods_hits","desc")->limit(6)->get()->toArray();
        }else{
            $history_goods=[];
        }
        
        //---------------------------------------------------------------------------------------------
        //商品的详细信息
        $goods_id=request()->id;
        $sku=goods_sku_id($goods_id);
        $goods_sku=goods_sku($goods_id);
        $goods_sku_id=Propertyp::where("goods_id",$goods_id)->get()->toArray();
        // print_r($goods_sku_id);exit;
        if(empty($goods_sku_id)){
            echo '
            <script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
            <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
            <script>
                alert("该商品没有色号，请另选。");
                window.location.href="/"
            </script>';
            exit;
        }
        // var_dump($goods);exit;
        //详情页的相关分类
        $goods_cate=Goods::where("goods_id",$goods_id)->get('cate_id');
        $g_cate=Goods::whereIn("cate_id",$goods_cate)->limit(4)->get();
        // print_r($g_cate);exit;
        //查询所有的商品
        $brand=Brand::limit(15)->get();
        return view('qtai.item',['goods_info'=>$goods_info,'goods_images'=>$info,'history_goods'=>$history_goods,'goods_sku'=>$goods_sku,'g_cate'=>$g_cate,'brand'=>$brand]);
    }

    //加入购物车数据库
    public function shopping(Request $request){
        $data=$request->all();
        //判断接受的sku拆分
        $sku=$data['sku'];
        $g=self::goods_sku_aa($sku);
        // print_r($g);exit;
        $goods=Propertyp::where("goods_id",$data['goods_id'])->get()->toArray();
        $ii="";
        foreach($goods as $K=>$v){
            $re=self::goods_sku($v);
            $id=0;
            $a=count($re);
            // print_r($a);exit;
            foreach($re as $kk=>$vv){
               $ids= array_key_exists($kk,$g);
               if($ids){
                   if($g[$kk]==$vv){
                        $id=$id+1;
                   }
               }
            }
            if($id==$a){
                $ii=$v["id"];
            }
        }
        if(empty($ii)){
            return ["code"=>"000002","msg"=>"没有该组合型号了，请您另选。"];
            exit;
        }
        //先判断表里面是否有添加过的数据
        $shop_cat=shop_cat::where(["goods_id"=>$data['goods_id'],"id"=>$ii])->first();
        $trolley_id=$shop_cat['trolley_id'];
        //  print_r($shop_cat);exit;
        //检测一下库存
        $goods_stock=Propertyp::where([["goods_id",$data['goods_id']],["id",$ii]])->value("goods_stroe");
        // print_r($goods_stock);exit;
        $goods_num="";
        if(!empty($goods_stock)){
            if(($shop_cat['goods_num']+$data['itxt'])>$goods_stock){
                $goods_num=$goods_stock;
            }else{
                $goods_num=$shop_cat['goods_num']+$data['itxt'];
            }
        }
        //判断是否有重复数据添加
        if(!empty($shop_cat)){
            $price_total=$shop_cat['price_total']+$data['price_total'];
            $res=shop_cat::where("trolley_id",$trolley_id)->update(['goods_num'=>$goods_num,'price_total'=>$price_total]);
            if($res){
                return ['code'=>'000000','msg'=>"加入购物车成功"];
            }else{
                return ['code'=>'000001','msg'=>"加入购物车失败"];
            }
        }
        $u_id=request()->session()->get('u_id');
        $shop_cat=new shop_cat;
        $shop_cat->u_id=$u_id;
        $shop_cat->goods_id=$data['goods_id'];
        $shop_cat->goods_num=$data['itxt'];
        $shop_cat->price_total=$data['price_total'];
        $shop_cat->price_one=$data['price_one'];
        $shop_cat->trolley_time=time();
        $shop_cat->id=$ii;
        $res=$shop_cat->save();
        if($res){
            return ['code'=>'000000','msg'=>"加入购物车成功"];
        }else{
            return ['code'=>'000001','msg'=>"加入购物车失败"];
        }
    }

    //sku点击变换价格
    public function sehao(Request $request){
        $data=$request->all();
        //判断接受的sku拆分
        $sku=$data['sku'];
        $g=self::goods_sku_aa($sku);
        // print_r($g);exit;
        $goods=Propertyp::where("goods_id",$data['goods_id'])->get()->toArray();
        $ii="";
        foreach($goods as $K=>$v){
            $re=self::goods_sku($v);
            $id=0;
            $a=count($re);
            // print_r($a);exit;
            foreach($re as $kk=>$vv){
               $ids= array_key_exists($kk,$g);
               if($ids){
                   if($g[$kk]==$vv){
                        $id=$id+1;
                   }
               }
            }
            if($id==$a){
                $ii=$v["id"];
            }
        }
        // print_r($ii);exit;
        if(empty($ii)){
            return ["code"=>"000002","msg"=>"没有该组合型号了，请您另选。"];
            exit;
        }
        $property=Propertyp::where("id",$ii)->first();
        return $property;
    }

    //sku拆分sku关联表数据
    private function goods_sku($xxi){
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
    //拆分添加购物车过来数据
    private function goods_sku_aa($xxi){
        $sxing=[];   
        $c=0;
        $v=$xxi;
          $sku=explode(',',$xxi);
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

    /**
     * 分类加其他条件下的商品
     */
    public function goods_tiao_list(Request $request){
        $cate_id=$request->post('cate_id');//分类id
        $where=[
            ['shop_goods.goods_del','=',1],
            ['shop_goods.cate_id','=',$cate_id],
        ];

        $brand_id=$request->post('brand_id')??'';//品牌id
        if(!empty($brand_id)){
            $where[]=['shop_goods.brand_id','=',$brand_id];
        }

        $yan_sku=$request->post('yan_sku')??'';//颜色所选sku
        if(!empty($yan_sku)){
            $where[]=['shop_property.sku','like',"%$yan_sku%"];
        }

        $chi_sku=$request->post('chi_sku')??'';//尺寸sku
        if(!empty($chi_sku)){
            $where[]=['shop_property.sku','like',"%$chi_sku%"];
        }

        $qu_price_in=$request->post('price')??'';//价格
//        dd($qu_price);
        if(!empty($qu_price_in)){
            if(strpos($qu_price_in,'-')!== false){
                $qu_price=explode('-',$qu_price_in);
                $where[]=['shop_goods.goods_price','>=',$qu_price[0]];
                $where[]=['shop_goods.goods_price','<=',$qu_price[1]];
            }else{
                $where[]=['shop_goods.goods_price','>',substr($qu_price_in,'0','-9')];
            }
        }
//        dd($where);

        $goods=new Goods();
        $tiao=$request->post('tiao');//倒叙条件

        if(!empty($tiao)){
            if(count($where)==2){
                $goods_info=$goods::where($where)->orderBy($tiao,'desc')->paginate(10);//加条件后的商品
            }else{
                $goods_info=$goods::leftjoin('shop_property','shop_goods.goods_id','=','shop_property.goods_id')->where($where)->orderBy($tiao,'desc')->paginate(10);//加条件后的商品
            }
        }else{
            if(count($where)==2){
                $goods_info=$goods::where($where)->paginate(10);//加条件后的商品
            }else{
                if(!empty($yan_sku) || !empty($chi_sku)){
                    $goods_info=$goods::leftjoin('shop_property','shop_goods.goods_id','=','shop_property.goods_id')->where($where)->paginate(10);//加条件后的商品
                }else{
                    $goods_info=$goods::where($where)->paginate(10);//加条件后的商品
                }
            }
        }
//        dd($goods_info);
        return view('qtai.cate_goods_list',[
                                                'goods_info'=>$goods_info,
                                                'brand_id'=>$brand_id,
                                                'yan_sku'=>$yan_sku,
                                                'chi_sku'=>$chi_sku,
                                                'qu_price'=>$qu_price_in,
                                                'tiao'=>$tiao
                                                ]);
    }
}

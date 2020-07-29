<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\Cate;
use App\Models\Goods;
use App\Models\History;
use App\Models\Shop_album;
use Illuminate\Http\Request;

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
//         $u_id=session('u_id');
        $u_id=2;
        $history=History::where("u_id",$u_id)->orderby("h_hits","desc")->limit(1)->get('goods_id')->toArray();
        $cate_id=Goods::where(["goods_id"=>$history[0]['goods_id']])->first('cate_id')->toArray();
        $history_goods=Goods::where(["cate_id"=>$cate_id])->orderby("goods_hits","desc")->limit(6)->get()->toArray();

        return view('qtai.item',['goods_info'=>$goods_info,'goods_images'=>$info,'history_goods'=>$history_goods]);
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

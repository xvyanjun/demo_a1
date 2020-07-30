<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cate;
use App\Models\Goods;
use App\Models\shop_sku_name;
use App\Models\shop_sku_val;
use Illuminate\Http\Request;

class CateController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 分类商品列表
     */
    public function cate_list($id)
    {
        //现在点击的分类
        $cate=new Cate();
        $cate_info=$cate::where(['cate_id'=>$id])->first();
//        dd($cate_info);


        //分类下的商品
        $goods=new Goods();
        $goods_info=$goods::where(['cate_id'=>$id,'goods_del'=>1])->paginate(10);

        $goods_hot=$goods::where(['goods_del'=>1])->orderBy('goods_hits','desc')->limit(4)->get()->toArray();
//        dd($goods_info);
        //分类下的品牌
        $brand_id=explode(",",$cate_info['brand_id']);
        $brand=new Brand();
        $brand_info=[];
        foreach($brand_id as $k=>$v){
            $brand_info[$k]=$brand::where(['brand_id'=>$v])->get()->toArray();
        }
//        dd($brand_info);
        //颜色属性
        $sku_val=new shop_sku_val();
        $sku_info['yan']=$sku_val::where(['attr_id'=>1])->get()->toArray();

        //尺寸属性
        $sku_info['chi']=$sku_val::where(['attr_id'=>2])->get()->toArray();
        //最大价格
        $goods_max=$goods::where(['cate_id'=>$id,'goods_del'=>1])->get()->max('goods_price');
        $price=$this->getSectionPrice($goods_max);

//        dd($price);
        return view('qtai.search',['goods_info'=>$goods_info,'cate_info'=>$cate_info,'brand_info'=>$brand_info,'sku_info'=>$sku_info,'price'=>$price,'goods_hot'=>$goods_hot]);
    }

    //获取价格区间字段
    public function getSectionPrice($max_price){
        $price=[];
        $one_price=$max_price/7;
        // echo $one_price;
        for($i=0;$i<=5;$i++){
            $start=$one_price*$i;
            $end=$one_price*($i+1)-1;
            // number_format — 以千位分隔符方式格式化一个数字
            $price[]=number_format($start,0,'','').'-'.number_format($end,0,'','');
        }
        $price[]=number_format($end,0,'','').'及以上';
        return $price;
    }


}

<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cate;
use App\Models\Goods;
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
        $cate_info=$cate::where(['cate_id'=>$id])->first()->toArray();
        //分类下的商品
        $goods=new Goods();
        $goods_info=$goods::where(['cate_id'=>$id,'goods_del'=>1])->get()->toArray();
//        dd($goods_info);
        //分类下的品牌
        $brand_id=explode(",",$cate_info['brand_id']);
        $brand=new Brand();
        $brand_info=[];
        foreach($brand_id as $k=>$v){
            $brand_info[]=$brand::where(['brand_id'=>$v])->get()->toArray();
        }
//        dd($brand_info);
        return view('qtai.search',['goods_info'=>$goods_info,'cate_info'=>$cate_info,'brand_info'=>$brand_info]);
    }
}

<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\shop_slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * 轮播图
     */
    public function slide_list($id){
        $slide=new shop_slide();
        $slide_info=$slide::where(['slide_id'=>$id])->first();
//        dd($slide_info);
//        echo $slide_info['brand_id'];
        $goods=new Goods();
        $goods_info=$goods::where(['goods_del'=>1,'brand_id'=>$slide_info['brand_id']])->get()->toArray();
//        dd($goods_info);
        return view('qtai.slide',['slide_info'=>$slide_info,'goods_info'=>$goods_info]);
    }

    /**
     * 导航
     */
    public function nav_list(){
        $goods=new Goods();
        $goods_info=$goods::where("goods_del",1)
//            ->select("id", "title", "picture", "description","link")
            ->inRandomOrder()->take(12)->get()->toArray();
//        dd($goods_info);
        return view('qtai.nav_list',['goods_info'=>$goods_info]);
    }
}

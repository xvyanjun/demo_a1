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
}

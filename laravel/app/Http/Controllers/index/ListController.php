<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Goods;
class ListController extends Controller
{
    //品牌的列表信息
    public function list(Request $request){
        $brand_id=$request->id;
        $goods=Goods::where("brand_id",$brand_id)->get();
        // print_r($goods);exit;
        // dd($brand);
        // 
        $goodss=Goods::orderby("goods_hits","desc")->limit(4)->get(); 
        return view('qtai.list',compact('goods','goodss'));
    }
}

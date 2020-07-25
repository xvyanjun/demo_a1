<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Goods;
class IndexController extends Controller
{
    //查询今日推荐
    public function index(Request $request){
        //查询最新的数据
        $goods=Goods::where(["goods_del"=>1])->orderby("goods_id","desc")->limit(4)->get();
        // print_r($goods);
        return view('qtai.index',compact("goods"));
    }
}

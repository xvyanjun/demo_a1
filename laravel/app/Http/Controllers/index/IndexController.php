<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\shop_slide;
use App\Models\shop_nav;
use App\Models\shop_service;
use App\Models\Cate;
use App\Models\Goods;
use App\Models\History;
use App\Models\Indexuser;
class IndexController extends Controller
{
    //-------------------------------------------------------------------------前台首页
    public function index(){
        $model=new Cate();
        $cate=$model::where(['cate_del'=>1])->get()->toArray();
        $cate_info=self::cate_list($cate);
        $slide_s=shop_slide::where([['slide_del','1'],['slide_show','1']])->orderby('slide_weight','asc')->get();
        $service_s=shop_service::where([['service_show','1'],['service_del','1']])->paginate(5);

    //-----------------------------------------------------------------------------------------
        //今日推荐
        $goods=Goods::where(["goods_del"=>1])->orderby("goods_id","desc")->limit(4)->get();
    //-----------------------------------------------------------------------------------------
        //猜你喜欢
        // $u_id=session(['u_id'=>2]);
        $history=History::where("u_id",2)->orderby("h_hits","desc")->limit(1)->get('goods_id')->toArray();
        $cate_id=Goods::where(["goods_id"=>$history[0]['goods_id']])->first('cate_id')->toArray();
        $history_goods=Goods::where(["cate_id"=>$cate_id])->orderby("goods_hits","desc")->limit(6)->get()->toArray();
        // dd($cate_id);exit;
      return view('qtai.index',['slide_s'=>$slide_s,'service_s'=>$service_s,'cate_info'=>$cate_info,"goods"=>$goods,"history_goods"=>$history_goods]);
    }
    /**
     *无限极分类
     */
    public function cate_list($res,$pid=0,$level=0){
        static $data=[];
        foreach ($res as $k=>$v){
            if($v['p_id']==$pid){
                $v['level']=$level;
                $data[]=$v;
                self::cate_list($res,$v['cate_id'],$v['level']+1);
            }
        }
        return $data;
    }

    //-------------------------------------------------------------------------
    public function dhang_jz(){
      $nav_s=shop_nav::where([['nav_show','1'],['nav_del','1']])->get();
      return json_encode($nav_s);
    }
    //-------------------------------------------------------------------------

    //-------------------------------------------------------------------------

    //-------------------------------------------------------------------------

    //-------------------------------------------------------------------------

}

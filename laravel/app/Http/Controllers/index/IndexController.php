<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\shop_slide;
use App\Models\shop_nav;
use App\Models\shop_service;

use App\Models\Goods;
use App\Models\Cate;

class IndexController extends Controller
{
//-------------------------------------------------------------------------
public function index(){
//..............................	
  //查询最新的数据
  $goods=Goods::where(["goods_del"=>1])->orderby("goods_id","desc")->limit(4)->get();
  $model=new Cate();
  $cate=$model::where(['cate_del'=>1])->get()->toArray();
  $cate_info=self::cate_list($cate);
//..............................
  $slide_s=shop_slide::where([['slide_del','1'],['slide_show','1']])->orderby('slide_weight','asc')->get();	
  $service_s=shop_service::where([['service_show','1'],['service_del','1']])->paginate(5);

  $cate_s=cate::where([['p_id','0'],['cate_show','1'],['cate_del','1']])->get();
  foreach ($cate_s as $c=>$v) {
  	$id_s=[$v['cate_id']];
  	$cate_s_s=cate::where([['p_id',$v['cate_id']],['cate_show','1'],['cate_del','1']])->get();
  	foreach ($cate_s_s as $c_1=>$v_2) {
  	  $id_s[]=$v_2['cate_id'];
  	}
  	$v['cate_to']=$cate_s_s;
  	$goods_hits=Goods::wherein('cate_id',$id_s)->where([['goods_show','1'],['goods_del','1']])->orderby('goods_hits','desc')->limit(6)->get();
  	$v['cate_hits_desc']=$goods_hits;
    $goods_s=Goods::wherein('cate_id',$id_s)->where([['goods_show','1'],['goods_del','1']])->limit(3)->get();
    $v['cate_goods']=$goods_s;
  }
//..............................
  return view('qtai.index',['slide_s'=>$slide_s,'service_s'=>$service_s,'cate_s'=>$cate_s,'cate_info'=>$cate_info,"goods"=>$goods]);
}
//-------------------------------------------------------------------------导航
public function dhang_jz(){
  $nav_s=shop_nav::where([['nav_show','1'],['nav_del','1']])->get();
  return json_encode($nav_s);
}
//-------------------------------------------------------------------------楼层左侧浮块
public function dhang_lceng(){
  $cate_s=cate::where([['p_id','0'],['cate_show','1'],['cate_del','1']])->get();
  return json_encode($cate_s);
}
//-------------------------------------------------------------------------
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

//-------------------------------------------------------------------------

//-------------------------------------------------------------------------

//-------------------------------------------------------------------------

}

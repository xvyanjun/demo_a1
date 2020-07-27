<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\shop_slide;
use App\Models\shop_nav;
use App\Models\shop_service;
use App\Models\Goods;
use App\Models\History;
use App\Models\Indexuser;
use App\Models\Cate;
use App\Models\Friend;
<<<<<<< HEAD
use App\Models\Brand;
=======

use App\Models\Brand;

>>>>>>> 971960e92393c7dba1f6f1e0348a6325863f860d
class IndexController extends Controller
{
//.-------------------------------------------------------------------------前台首页
public function index(){
//..............................eva
    $xx=request()->all();
//..............................eva
    $model=new Cate();
    $cate=$model::where(['cate_del'=>1,'p_id'=>0])->get()->toArray();
    $cate_info=self::cate_list($cate);
    $slide_s=shop_slide::where([['slide_del','1'],['slide_show','1']])->orderby('slide_weight','asc')->get();
    $service_s=shop_service::where([['service_show','1'],['service_del','1']])->paginate(5);
//..............................eva
    //今日推荐
    $goods=Goods::where(["goods_del"=>1])->orderby("goods_id","desc")->limit(4)->get();
//..............................eva
    //猜你喜欢
    // $u_id=session(['u_id'=>2]);
    $history=History::where("u_id",2)->orderby("h_hits","desc")->limit(1)->get('goods_id')->toArray();
    $cate_id=Goods::where(["goods_id"=>$history[0]['goods_id']])->first('cate_id')->toArray();
    $history_goods=Goods::where(["cate_id"=>$cate_id])->orderby("goods_hits","desc")->limit(6)->get()->toArray();
//..............................eva
  if(array_key_exists('begin_num',$xx)){
    $begin_num=$xx['begin_num']+1;
  }else{
    $begin_num='1';
  }
  $cate_eva_sum=cate::where([['p_id','0'],['cate_show','1'],['cate_del','1']])->orderby('cate_id','desc')->first();
  $cate_s=cate::where([['cate_id','>=',$begin_num],['p_id','0'],['cate_show','1'],['cate_del','1']])->limit(5)->get();
  foreach ($cate_s as $c=>$v) {
  	$id_s=[$v['cate_id']];
  	$cate_s_s=cate::where([['p_id',$v['cate_id']],['cate_show','1'],['cate_del','1']])->get();
  	foreach ($cate_s_s as $c_1=>$v_2) {
  	  $id_s[]=$v_2['cate_id'];
  	}
  	$v['cate_to']=$cate_s_s;
  	$goods_hits=Goods::wherein('cate_id',$id_s)->where([['goods_show','1'],['goods_del','1']])->orderby('goods_hits','desc')->limit(6)->get();
  	$v['cate_hits_desc']=$goods_hits;
    $goods_s=Goods::wherein('cate_id',$id_s)->where([['goods_show','1'],['goods_del','1']])->orderby('goods_hits','desc')->limit(5)->get();
    $v['cate_goods']=$goods_s;
  }
<<<<<<< HEAD
  //-----------------------------------------------------------------------------------------------
    //查询商品品牌
    $brand=Brand::where(["brand_del"=>1])->limit(10)->get();
    return view('qtai.index',['slide_s'=>$slide_s,'service_s'=>$service_s,'cate_info'=>$cate_info,"goods"=>$goods,"history_goods"=>$history_goods,'cate_s'=>$cate_s,"brand"=>$brand]);
}

//--------------------------------------------------------------------------

//-------------------------------------------------------------------------导航
=======
  if(request()->ajax()){
    $at_present=cate::where([['cate_id','<',$begin_num],['p_id','0'],['cate_show','1'],['cate_del','1']])->count();
    return view('qtai.floor_replace_s',['cate_s'=>$cate_s,'cate_eva_sum'=>$cate_eva_sum,'at_present'=>$at_present]);
  }
  //..............................eva
  
  //..............................eva
  return view('qtai.index',['slide_s'=>$slide_s,'service_s'=>$service_s,'cate_info'=>$cate_info,"goods"=>$goods,"history_goods"=>$history_goods,'cate_s'=>$cate_s,'cate_eva_sum'=>$cate_eva_sum]);
//..............................eva
}
//.-------------------------------------------------------------------------导航
>>>>>>> 971960e92393c7dba1f6f1e0348a6325863f860d
public function dhang_jz(){
  $nav_s=shop_nav::where([['nav_show','1'],['nav_del','1']])->get();
  return json_encode($nav_s);
}
//.-------------------------------------------------------------------------楼层左侧浮块
public function dhang_lceng(){
  $cate_s=cate::where([['p_id','0'],['cate_show','1'],['cate_del','1']])->get();
  return json_encode($cate_s);
}
//.-------------------------------------------------------------------------js楼层-条件-数据获取
public function lou_ceng_sj(){
    $xx=request()->all();
    if(!array_key_exists('cate_id',$xx)){
      return json_encode([]);exit;
    }
    $id_s=[$xx['cate_id']];
    $cate_s_s=cate::where([['p_id',$xx['cate_id']],['cate_show','1'],['cate_del','1']])->get();
    foreach ($cate_s_s as $c_1=>$v_2) {
      $id_s[]=$v_2['cate_id'];
    }
    $goods_hits=Goods::wherein('cate_id',$id_s)->where([['goods_show','1'],['goods_del','1']])->orderby('goods_hits','desc')->limit(6)->get();
    $goods_s=Goods::wherein('cate_id',$id_s)->where([['goods_show','1'],['goods_del','1']])->orderby('goods_hits','desc')->limit(5)->get();
    $y_a1=['cate_hits_desc'=>$goods_hits,'cate_goods'=>$goods_s];
    return view('qtai.floor_replace',['y_a1'=>$y_a1]);
}  
//.-------------------------------------------------------------------------js有趣—加载时获数据
public function yqv_replace_sj(){
  $goods_zuo=Goods::where([['goods_show','1'],['goods_del','1']])->orderby('goods_hits','desc')->limit(3)->get();
  $goods_you=[];
  $brand_s=Brand::where('brand_del','1')->orderby('brand_id','desc')->limit(14)->get();
  foreach($brand_s as $f=>$g){
    $gos=Goods::where([['brand_id',$g['brand_id']],['goods_show','1'],['goods_del','1']])->orderby('goods_hits','desc')->first();
    $cd=count($goods_you);
    if(!empty($gos)){
      if($cd<3){
        $goods_you[]=$gos;
      }else{
        foreach($goods_you as $y=>$u){
          if($u['goods_hits']<$gos['goods_hits']){
            $goods_you[$y]=$gos;
          }
        }
      }
    }
  }
  $replace_yqu=['goods_zuo'=>$goods_zuo,'goods_you'=>$goods_you,'brand_s'=>$brand_s];
  return view('qtai.amusing_replace',['replace_yqu'=>$replace_yqu]);
}
//.-------------------------------------------------------------------------js首页品牌展示
public function ppai_js(){
  $xx=request()->all();
  if(array_key_exists('brand_id',$xx)){
    $num=$xx['brand_id']+1;
  }else{
    $num=1;
  }
  $shu=10;
  $brand_zj=Brand::where([['brand_id','>=',$num],['brand_del','1']])->orderby('brand_id','asc')->limit($shu)->get();
  $sf=count($brand_zj);
  if($sf>0){
    $brand_zj=$brand_zj;
  }else{
    $brand_zj=Brand::where([['brand_id','>=',1],['brand_del','1']])->orderby('brand_id','asc')->limit($shu)->get();
  }
  $cd=count($brand_zj);
  $eva_fh=['a1'=>$cd,'a2'=>$brand_zj];
  return json_encode($eva_fh);
}
//.-------------------------------------------------------------------------
    /**
     *查询父类下的子分类
     */
    public function cate_list($res){
        $model=new Cate();
        foreach($res as $k=>$v){
            $res[$k]['cate']=$model::where(['cate_del'=>1,'p_id'=>$v['cate_id']])->get()->toArray();
        }
        return $res;
    }
//.-------------------------------------------------------------------------
//友情链接
public function friend(Request $request){
    $friend=Friend::where(['f_del'=>1])->get();
    return view('qtai.cooperation',compact("friend"));
}
//.-------------------------------------------------------------------------

//-------------------------------------------------------------------------

//-------------------------------------------------------------------------

}

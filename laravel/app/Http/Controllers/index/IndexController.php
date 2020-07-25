<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\shop_slide;
use App\Models\shop_nav;
use App\Models\shop_service;
use App\Models\Cate;

class IndexController extends Controller
{
    //-------------------------------------------------------------------------前台首页
    public function index(){
        $model=new Cate();
        $cate=$model::where(['cate_del'=>1,'p_id'=>0])->get()->toArray();
        $cate_info=self::cate_list($cate);
//        dd($cate_info);
      $slide_s=shop_slide::where([['slide_del','1'],['slide_show','1']])->orderby('slide_weight','asc')->get();
      $service_s=shop_service::where([['service_show','1'],['service_del','1']])->paginate(5);
      return view('qtai.index',['slide_s'=>$slide_s,'service_s'=>$service_s,'cate_info'=>$cate_info]);
    }
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

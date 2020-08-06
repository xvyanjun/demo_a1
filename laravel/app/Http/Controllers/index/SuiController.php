<?php

namespace App\Http\Controllers\index;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cate;
use App\Models\Goods;
use App\Models\shop_sku_name;
use App\Models\shop_sku_val;
use Illuminate\Http\Request;

class SuiController extends Controller
{
    /**
     * 头部大搜索
     */
    public function sou(Request $request){
        $sou=$request->post('sou');
        if(empty($sou)){
            echo '<script>
                window.location.href="/";
                </script>';
            exit;
        }
        $cate=new Cate();
        $goods=new Goods();
        $catewhere=[
            ['cate_name','like',"%$sou%"],
            ['cate_del','=',1]
        ];
        $cate_info=$cate::where($catewhere)->get(['cate_id','cate_name','p_id'])->toArray();
        $cate_id_list=$cate::where($catewhere)->get('cate_id')->toArray();//分类id
        $cate_p_id_list=[];
//        获取分类子类id
        foreach($cate_info as $k=>$v){
            if($v['p_id']==0){
                $cate_p_id_list=cate::where(['cate_del'=>1,'p_id'=>$v['cate_id']])->get('cate_id')->toArray();
            }
        }
//        dd($cate_p_id_list);
//        dd($cate_info);
        $cate_list=array_unique(array_merge($cate_id_list,$cate_p_id_list),SORT_REGULAR);//
//        dd($cate_list);
        $goods_info=$goods::where('goods_del',1)->whereIn('cate_id',$cate_list)->get()->toArray();//根据分类查询的商品
//        dd($goods_info);
        $goods_where=[
            ['goods_name','like',"%$sou%"],
            ['goods_del','=',1]
        ];
        $goods_list=$goods::where($goods_where)->get()->toArray();
        if(!empty($goods_list)){
            $goods_info=array_unique(array_merge($goods_info,$goods_list),SORT_REGULAR);
        }else{
            echo '<script>
                window.location.href="/";
                </script>';
            exit;
        }
//        dd($goods_info);
        return view('qtai.index_sou',['goods_info'=>$goods_info,'sou'=>$sou]);
    }

}

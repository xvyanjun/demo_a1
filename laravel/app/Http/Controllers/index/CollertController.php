<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\Collert;
use Illuminate\Http\Request;


class CollertController extends Controller
{
//-----------------------------------------------------------------------------guanzhu
    public function guanadd(Request $request){
        $goods_id=$request->post('goods_id');
        $u_id=request()->session()->get('u_id');
//        dd($u_id);
        if(empty($u_id)){
            $arr=[
                'code'=>"555",
                'msg'=>"未登录,请登录后关注",
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $collect=new Collert();
        $res=$collect::where(['u_id'=>$u_id,'goods_id'=>$goods_id,'is_del'=>1])->get()->toArray();
        if(!empty($res)){
            $arr=[
                'code'=>"300",
                'msg'=>"已经关注,无需重复关注",
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $collect->u_id=$u_id;
        $collect->goods_id=$goods_id;
        $collect->collect_time=time();
        if($collect->save()){
            $arr=[
                'code'=>"200",
                'msg'=>"关注成功",
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $arr=[
                'code'=>"300",
                'msg'=>"关注失败",
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
    }

    //取消关注
    public function guandel(Request $request){
        $u_id=request()->session()->get('u_id');
        $goods_id=$request->post('goods_id');
        $collect=new Collert();
        $res=$collect::where(['u_id'=>$u_id,'goods_id'=>$goods_id,'is_del'=>1])->first();
        $res->is_del=2;
        if($res->save()){
            $arr=[
                'code'=>"200",
                'msg'=>"取消成功",
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $arr=[
                'code'=>"300",
                'msg'=>"取消错误",
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
    }
}

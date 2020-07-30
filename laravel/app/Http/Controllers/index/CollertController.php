<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\Collert;
use Illuminate\Http\Request;
use App\Models\shop_cat;
use App\Models\Goods;
use App\Models\shop_property;
use App\Models\shop_sku_val;
use App\Models\History;

class CollertController extends Controller
{
//-----------------------------------------------------------------------------guanzhu
    public function guanadd(Request $request){
        $goods_id=$request->post('goods_id');
        $u_id=request()->session()->get('u_id');
        if(empty($u_id)){
            return redirect('/login');
        }
        $collect=new Collert();
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
}

<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\Cate;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 前台首页
     */
    public function index(){
        $where=[
            ['cate_del','=',1],
        ];
        $model=new Cate();
        $cate=$model::where($where)->get()->toArray();
        $cate_info=self::cate_list($cate);
//        dd($cate_info);
        return view('qtai.index',['cate_info'=>$cate_info]);
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

}

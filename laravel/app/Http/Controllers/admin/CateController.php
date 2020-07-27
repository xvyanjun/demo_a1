<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cate;
use Illuminate\Http\Request;

class CateController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 分类展示
     */
    public function index(Request $request){

        $where=[
            ['cate_del','=',1],
        ];
        $model=new Cate();
        $cate=$model::get()->toArray();
        $res=$model::where($where)->get()->toArray();
//        print_r($res);
        $info=self::cate_list($res);
//        dd($info);
        return view('admin.cate.list',['info'=>$info,'cate'=>$cate]);
    }

    /**
     *无限极分类
     */
    public function cate_list($res,$pid=0,$level=0){
        static $data=[];
        foreach ($res as $k=>$v){
//            print_r($v);
            if($v['p_id']==$pid){
                $v['level']=$level;
                $data[]=$v;
                self::cate_list($res,$v['cate_id'],$v['level']+1);
            }
        }
        return $data;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 分类添加页
     */
    public function addshow(){
        $model=new Cate();
        $cate=$model::get()->toArray();

        $brand=new Brand();
        $brand_info=$brand::get()->toArray();
        return view('admin.cate.add',['cate'=>$cate,'brand_info'=>$brand_info]);
    }

    /**
     * @param Request $request
     * @return string
     * 分类添加
     */
    public function add(Request $request){
        $brand_id=$request->post('brand_id');
//        dd($brand_id);
        $brand_id=implode(',',$brand_id);
        $cate_name=$request->post('cate_name');
        $p_id=$request->post('p_id');
//        dd($p_id);
        if(empty($cate_name)){
            $arr=[
                'code'=>'300',
                'msg'=>'分类名称未填',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $cate_show=$request->post('cate_show');
        $cate_time=time();
        $model=new Cate();
        $res=$model::where(['cate_name'=>$cate_name])->first();
        if(!empty($res)){
            $arr=[
                'code'=>'300',
                'msg'=>'该分类已存在',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $model->cate_name=$cate_name;
            $model->p_id=$p_id;
            if($p_id=="0"){
                $model->brand_id=null;
            }else{
                $model->brand_id=$brand_id;
            }
            $model->cate_show=$cate_show;
            $model->cate_time=$cate_time;
            if($model->save()){
                $arr=[
                    'code'=>'200',
                    'msg'=>'添加分类成功',
                    'sult'=>[]
                ];
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }else{
                $arr=[
                    'code'=>'300',
                    'msg'=>'添加分类失败,请重试',
                    'sult'=>[]
                ];
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }
        }

    }

    /**
     * @param Request $request
     * 删除
     */
    public function del(Request $request){
        $cate_id=$request->post('cate_id');
        if(empty($cate_id)){
            $arr=[
                'code'=>'300',
                'msg'=>'非法操作',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $model=new Cate();
        $cate=$model::where(['cate_id'=>$cate_id])->first();
        $cate->cate_del=2;
        if($cate->save()){
                $arr=[
                    'code'=>'200',
                    'msg'=>'删除完毕',
                    'result'=>[]
                ];
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }else{
                $arr=[
                    'code'=>'300',
                    'msg'=>'删除错误',
                    'result'=>[]
                ];
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }

    }

    /**
     * @param $id
     * 修改页
     */
    public function cateupd($id){
        $model=new Cate();
        $cate=$model::where(['cate_id'=>$id])->first()->toArray();
        $where=[
            ['cate_id','!=',$id]
        ];
        $info=$model::where($where)->get()->toArray();

        $cate['brand_id']=explode(',',$cate['brand_id']);

        $brand=new Brand();
        $brand_info=$brand::get()->toArray();
//        dd($cate);
        return view('admin.cate.upd',['cate'=>$cate,'info'=>$info,'brand_info'=>$brand_info]);
    }

    /**
     * @param Request $request
     * 修改
     */
    public function update(Request $request){
        $brand_id=$request->post('brand_id');
//        dd($brand_id);
        $brand_id=implode(',',$brand_id);

        $cate_id=$request->post('cate_id');
        $cate_name=$request->post('cate_name');
        $p_id=$request->post('p_id');
        if(empty($cate_name)){
            $arr=[
                'code'=>'300',
                'msg'=>'分类名称不可以为空',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $cate_show=$request->post('cate_show');
        $cate_time=time();
        $model=new Cate();
        $data=$model::where(['cate_id'=>$cate_id])->first();
        $data->cate_name=$cate_name;
        $data->p_id=$p_id;
        if($p_id=="0"){
            $data->brand_id=null;
        }else{
            $data->brand_id=$brand_id;
        }
        $data->cate_show=$cate_show;
        $data->cate_time=$cate_time;
        if($data->save()){
            $arr=[
                'code'=>'200',
                'msg'=>'修改分类成功',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $arr=[
                'code'=>'300',
                'msg'=>'修改分类失败,请重试',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * @param Request $request
     * @return string
     * 即点即改
     */
    public function updateshow(Request $request){
        $cate_id=$request->post('cate_id');
        $cate_show=$request->post('cate_show');
        if(empty($cate_id)){
            $arr=[
                'code'=>'300',
                'msg'=>'系统错误',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $model=new Cate();

        if($cate_show==1){
            $cate_show=2;
        }elseif($cate_show==2){
            $cate_show=1;
        }
        $cate=$model::where(['cate_id'=>$cate_id])->first();
        $cate->cate_show=$cate_show;
        if($cate->save()){
            $arr=[
                'code'=>'200',
                'msg'=>'ok',
                'result'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $arr=[
                'code'=>'300',
                'msg'=>'系统出现错误',
                'result'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
    }
}

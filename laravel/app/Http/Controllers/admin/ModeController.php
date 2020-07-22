<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Mode;
use Illuminate\Http\Request;

class ModeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 品牌展示
     */
    public function index(Request $request){
        $model=new Mode();
        $res=$model::where(['is_del'=>1])->paginate(5);
        return view('admin.mode.list',['res'=>$res]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 品牌添加页
     */
    public function addshow(){
        return view('admin.mode.add');
    }

    /**
     * @param Request $request
     * @return string
     * 品牌添加
     */
    public function add(Request $request)
    {
        $mode_name=$request->post('mode_name');
        if(empty($mode_name)){
            $arr=[
                'code'=>'300',
                'msg'=>'未填写配送方式',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $model=new Mode();
        $model->mode_name=$mode_name;
        $model->mode_time=time();
        if($model->save()){
            $arr=[
                'code'=>'200',
                'msg'=>'ok',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $arr=[
                'code'=>'300',
                'msg'=>'添加失败',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * @param Request $request
     * 删除
     */
    public function del(Request $request){
        $mode_id=$request->post('mode_id');
        if(empty($mode_id)){
            $arr=[
                'code'=>'300',
                'msg'=>'非法操作',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $model=new Mode();
        $info=$model::where(['id'=>$mode_id])->first();
        $info->is_del=2;
        if($info->save()){
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
        $model=new Mode();
        $mode=$model::where(['id'=>$id,'is_del'=>1])->first()->toArray();
        return view('admin.mode.upd',['mode'=>$mode]);
    }

    /**
     * @param Request $request
     * 修改
     */
    public function update(Request $request){
        $mode_id=$request->post('mode_id');
        if(empty($mode_id)){
            $arr=[
                'code'=>'300',
                'msg'=>'非法操作',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $mode_name=$request->post('mode_name');
        if(empty($mode_name)){
            $arr=[
                'code'=>'300',
                'msg'=>'配送名称不能为空',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $model=new Mode();
        $data = $model::where(['id' => $mode_id])->first();
        $data->mode_name=$mode_name;
        $data->mode_time=time();
        if($data->save()){
            $arr=[
                'code'=>'200',
                'msg'=>'ok',
                'result'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $arr=[
                'code'=>'300',
                'msg'=>'修改失败',
                'result'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
    }

}

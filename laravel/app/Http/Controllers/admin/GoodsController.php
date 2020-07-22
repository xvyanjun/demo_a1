<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Shop_album;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    /**
     * 多文件上传页面
     */
    public function uploades(){
        return view('admin.goods.uploades');
    }

    /**
     * 多文件上传
     */
    public function uploadesadd(Request $request){
        $data=$request->except('_token');
//        dd($data);
        if($data['goods_imgs']){
            $photos=$this->Moreuploads('goods_imgs');
            $data['goods_imgs']=implode('|',$photos);
        }
//        dd($data);
        $model=new Shop_album();
        $model->goods_imgs=$data['goods_imgs'];
        $model->time=time();
        if($model->save()){
            return redirect('/admin/goods/uploadeslist');
        }else{
            return '<script>alert("相册添加失败,请重试")</script>';
        }
    }
    //多文件上传引用
    function Moreuploads($filename){
        $photo=request()->file($filename);
        if(!is_array($photo)){
            return;
        }
        foreach($photo as $k=>$v){
            if($v->isValid()){
                $store_result[]=$v->store('upload_ses');
            }
        }
        return $store_result;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 商品相册管理显示页
     */
    public function uploadeslist(){
        $model=new Shop_album();
        $info=$model::where(['is_del'=>1])->paginate(3);

        foreach($info as $k=>$v){
            $info[$k]['goods_imgs']=explode('|',$v['goods_imgs']);
//            print_r($v);
        }
//        dd($info);
        return view('admin.goods.uploadeslist',['info'=>$info]);
    }
    /**
     *相册软删除
     */
    public function uploadesdel(Request $request){
        $goods_imgid=$request->post('goods_imgid');
        if(empty($goods_imgid)){
            $arr=[
                'code'=>'300',
                'msg'=>'非法操作',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $model=new Shop_album();
        $info=$model::where(['goods_imgid'=>$goods_imgid])->first();
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
}

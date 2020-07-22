<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Shop_album;
use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Brand;
use App\Models\Cate;
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
    public function uploadesdel(Request $request)
    {
        $goods_imgid = $request->post('goods_imgid');
        if (empty($goods_imgid)) {
            $arr = [
                'code' => '300',
                'msg' => '非法操作',
                'sult' => []
            ];
            return json_encode($arr, JSON_UNESCAPED_UNICODE);
        }
        $model = new Shop_album();
        $info = $model::where(['goods_imgid' => $goods_imgid])->first();
        $info->is_del = 2;
        if ($info->save()) {
            $arr = [
                'code' => '200',
                'msg' => '删除完毕',
                'result' => []
            ];
            return json_encode($arr, JSON_UNESCAPED_UNICODE);
        } else {
            $arr = [
                'code' => '300',
                'msg' => '删除错误',
                'result' => []
            ];
            return json_encode($arr, JSON_UNESCAPED_UNICODE);
        }
    }
    //商品展示
    public function create(Request $request){
        $brand=Brand::get();
        $cate=Cate::get();
        return view("admin.goods.create",compact("brand","cate"));
    }
    //商品执行
    public function add(Request $request){
       $all=$request->except("_token");
       $all['goods_time']=time();
       if(request()->hasFile('goods_img')){
        $all['goods_img']=$this->uplode('goods_img');
        }
        $res=Goods::insert($all);
        if($res){
            return redirect("admin/goods/list");
        }
    }
    //单文件上传
    public function uplode($img){
        $file=request()->$img;
        if($file->isValid()){
            $store=$file->store('imgse');
            return $store;
        }
        exit('图片上传失败');
    }
    //商品展示
    public function list(Request $request){
        $res=Goods::leftjoin("shop_brand","shop_goods.brand_id","=","shop_brand.brand_id")
                    ->leftjoin("shop_cate","shop_cate.cate_id","=","shop_goods.cate_id")
                    ->where(['goods_del'=>1])
                    ->paginate(1);
        return view("admin.goods.list",compact("res"));
    }
    //商品软删除
    public function del(Request $request){
        $goods_id=$request->goods_id;
        $res=Goods::where("goods_id",$goods_id)->update(['goods_del'=>2]);
        if($res){
            return ['code'=>"000000","msg"=>"商品软删除成功"];
        }else{
            return ['code'=>"000004","msg"=>"商品软删除失败"];
        }
    }
    //商品修改展示
    public function upd(Request $request){
        $goods_id=$request->id;
        $brand=Brand::get();
        $cate=Cate::get();
        $goods=Goods::where("goods_id",$goods_id)->first();
        return view("admin.goods.upd",compact("brand","cate","goods"));
    }
    //商品修改执行
    public function updAdd(Request $request){
        $all=$request->except("_token");
        $id=$request->id;
        if(request()->hasFile('goods_img')){
            $all['goods_img']=$this->uplodes('goods_img');
        }
        $res=Goods::where("goods_id",$id)->update($all);
        if($res){
            return redirect("admin/goods/list");
        }
    }
     //单文件上传
     public function uplodes($img){
        $file=request()->$img;
        if($file->isValid()){
            $store=$file->store('imgse');
            return $store;
        }
        exit('图片上传失败');
    }
}
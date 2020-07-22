<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Brand;
use App\Models\Cate;
class GoodsController extends Controller
{
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

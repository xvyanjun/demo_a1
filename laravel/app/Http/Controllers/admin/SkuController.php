<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Propertyp;
use App\Models\Goods;
use App\Models\shop_sku_val;
use App\Models\shop_sku_name;
class SkuController extends Controller
{
    //sku展示
    public function sku(Request $request){
        $goods=Goods::get();
        //查询出多少条属性值
        $shop_name=shop_sku_name::where(["attr_del"=>1])->get();
        //循环所有的属性值
        foreach($shop_name as $K=>$v){
            //根据属性值 和 属性查询
            $shop_val=shop_sku_val::where(["attr_id"=>$v['attr_id']])->get();
            //给属性赋值
            $v['a']=$shop_val;
            
        }
        return view("admin.skug.sku",compact("goods","shop_name"));
    }
    //sku执行
    public function skuAdd(Request $request){
        $data=$request->all();
        $str="/^[0-9]*$/";
        //验证是否为空正则
        if(empty($data['goods_stroe'])){
            return ['code'=>"000001","msg"=>"库存不能为空"];
            exit;
        }else if(!preg_match($str,$data['goods_stroe'])){
            return ['code'=>"000002","msg"=>"必须是纯数字"];
            exit;
        }
        if(empty($data['price'])){
            return ['code'=>"000001","msg"=>"价格不能为空"];
            exit;
        }else if(!preg_match($str,$data['price'])){
            return ['code'=>"000002","msg"=>"必须是纯数字"];
            exit;
        }
        $res=new Propertyp;
        $res->goods_id=$data['goods_id'];
        $res->sku=$data['sku'];
        $res->goods_stroe=$data['goods_stroe'];
        $res->price=$data['price'];
        $re=$res->save();
        if($re){
            return ['code'=>"000000","msg"=>"添加属性成功"];
        }else{
            return ['code'=>"000001","msg"=>"添加属性失败"];
        }
    }
    //属性列表
    public function list(Request $request){
        $res=Propertyp::
        leftjoin("shop_goods","shop_goods.goods_id","=","shop_property.goods_id")
        ->where(['property_del'=>1])
        ->paginate(2);
        return view("admin.skug.list",compact("res"));
    }
    //属性删除
    public function del(Request $request){
        $id=$request->id;
        $res=Propertyp::where("id",$id)->update(["property_del"=>2]);
        if($res){
            return ['code'=>"000000","msg"=>"软删除属性成功"];
        }else{
            return ['code'=>"000001","msg"=>"软删除属性失败"];
        }
    }
    //属性修改展示
    public function upd(Request $request){
        $id=$request->id;
        $goods=Goods::get();
        //查询出多少条属性值
        $shop_name=shop_sku_name::where(["attr_del"=>1])->get();
        //循环所有的属性值
        foreach($shop_name as $K=>$v){
            //根据属性值 和 属性查询
            $shop_val=shop_sku_val::where(["attr_id"=>$v['attr_id']])->get();
            //给属性赋值
            $v['a']=$shop_val;
            
        }
        $prop=Propertyp::where("id",$id)->first();
        return view("admin.skug.upd",compact("goods","shop_name","prop"));
    }
    //属性修改执行
    public function updAdd(Request $request){
        $data=$request->all();
        $id=$data['id'];
        $res=Propertyp::where("id",$id)->update($data);
        if($res){
            return ['code'=>"000000","msg"=>"修改属性成功"];
        }else{
            return ['code'=>"000001","msg"=>"修改属性失败"];
        }
    }
}

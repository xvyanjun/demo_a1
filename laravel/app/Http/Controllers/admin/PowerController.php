<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Power;
class PowerController extends Controller
{
    //权限展示
    public function create(Request $request){
        return view('admin.power.create');
    }
    //权限执行
    public function add(Request $request){
        $data=$request->all();
        if(empty($data['power_name'])){
            return ['code'=>"000009","msg"=>"权限名称不能为空"];
            exit;
        }
        if(empty($data['power_url'])){
            return ['code'=>"000009","msg"=>"权限地址不能为空"];
            exit;
        }
        $re=Power::where("power_name",$data['power_name'])->first();
        if($re){
            return ['code'=>"000001","msg"=>"以有改名字"];
            exit;
        }
        $data['power_time']=time();
        $res=Power::insert($data);
        if($res){
            return ['code'=>"000000","msg"=>"添加成功"];
        }else{
            return ['code'=>"000002","msg"=>"添加失败"];
        }
    }
    //权限展示页面
    public function list(Request $request){
        $res=Power::where(["power_del"=>1])->paginate(10);
        return view("admin.power.list",compact("res"));
    }
    //权限软删除
    public function del(Request $request){
        $power_id=$request->power_id;
        $res=Power::where("power_id",$power_id)->update(['power_del'=>2]);
        if($res){
            return ['code'=>"000000","msg"=>"软删除成功"];
        }else{
            return ['code'=>"000001","msg"=>"软删除失败"];
        }
    }
    //权限修改
    public function upd(Request $request){
        $power_id=$request->id;
        $res=Power::where("power_id",$power_id)->first();
        return view("admin.power.upd",compact("res"));
    }
    //权限修改执行
    public function updAdd(Request $request){
        $data=$request->all();
        $id=$data['power_id'];
        $res=Power::where("power_id",$id)->update($data);
        if($res){
            return ['code'=>"000000","msg"=>"修改成功"];
        }else{
            return ['code'=>"000001","msg"=>"修改失败"];
        }
    }
}

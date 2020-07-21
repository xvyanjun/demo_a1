<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Friend;
class FriendController extends Controller
{
    //友情链接展示
    public function create(Request $request){
        return view('admin.friend.create');
    }
    //友情链接添加
    public function add(Request $request){
        $data=$request->all();
        if(empty($data['f_name'])){
            return ['code'=>"000001","msg"=>"友情名不能为空"];
            exit;
        }
        if(empty($data['f_url'])){
            return ['code'=>"000002","msg"=>"友情地址不能为空"];
            exit;
        }
        $re=Friend::where("f_name",$data['f_name'])->first();
        if($re){
            return ['code'=>"000003","msg"=>"已有改名字"];
            exit;
        }
        $data['f_time']=time();
        $res=Friend::insert($data);
        if($res){
            return ['code'=>"000000","msg"=>"友情添加成功"];
        }else{
            return ['code'=>"000004","msg"=>"友情添加失败"];
        }
    }
    //友情链接展示
    public function list(Request $request){
        $res=Friend::where(['f_del'=>1])->paginate(2);
        return view('admin.friend.list',compact("res"));
    }
    //友情软删除
    public function del(Request $request){
        $f_id=$request->f_id;
        $res=Friend::where("f_id",$f_id)->update(['f_del'=>2]);
        if($res){
            return ['code'=>"000000","msg"=>"友情软删除成功"];
        }else{
            return ['code'=>"000004","msg"=>"友情软删除失败"];
        }
    }
    //友情修改
    public function upd(Request $request){
        $id=$request->id;
        $res=Friend::where("f_id",$id)->first();
        return view("admin.friend.upd",compact("res"));
    }
    //友情修改执行
    public function updAdd(Request $request){
        $data=$request->all();
        $f_id=$data['f_id'];
        $res=Friend::where("f_id",$f_id)->update($data);
        if($res){
            return ['code'=>"000000","msg"=>"友情修改成功"];
        }else{
            return ['code'=>"000004","msg"=>"友情修改失败"];
        }
    }
}

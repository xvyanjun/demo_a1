<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Power;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\PowerRole;
class RoleController extends Controller
{
    //角色展示
    public function create(Request $request){
        return view("admin.role.create");
    }
    //角色执行
    public function add(Request $request){
        $data=$request->all();
        if(empty($data['role_name'])){
            return ['code'=>"000009","msg"=>"角色名称不能为空"];
            exit;
        }
        $rw=Role::where("role_name",$data['role_name'])->first();
        if($rw){
            return ['code'=>"000001","msg"=>"已有改名字"];
            exit;
        }
        $data['role_time']=time();
        $res=Role::insert($data);
        if($res){
            return ['code'=>"000000","msg"=>"添加角色成功"];
        }else{
            return ['code'=>"000001","msg"=>"添加角色失败"];
        }
    }
    //角色列表展示
    public function list(Request $request){
        $res=Role::where(["role_del"=>1])->paginate(2);
        return view("admin.role.list",compact("res"));
    }
    //角色软删除
    public function del(Request $request){
        $id=$request->role_id;
        $res=Role::where("role_id",$id)->update(["role_del"=>2]);
        if($res){
            return ['code'=>"000000","msg"=>"角色软删除成功"];
        }else{
            return ['code'=>"000001","msg"=>"角色软删除失败"];
        }
    }
    //角色修改展示
    public function upd(Request $request){
        $id=$request->id;
        $res=Role::where("role_id",$id)->first();
        return view("admin.role.upd",compact("res"));
    }
    //角色修改执行
    public function updAdd(Request $request){
        $data=$request->all();
        $id=$data['role_id'];
        $res=Role::where("role_id",$id)->update($data);
        if($res){
            return ['code'=>"000000","msg"=>"角色修改成功"];
        }else{
            return ['code'=>"000001","msg"=>"角色修改失败"];
        }
    }
    //角色赋予权限
    public function content(Request $request){
        $id=$request->id;
        $power=Power::get()->toArray();
       $res= Role::where("role_id",$id)->first();

        return view("admin.role.content",compact("res","power"));
    }
    //角色执行
    public function contentAdd(Request $request){
        $res=$request->all();

        $data=PowerRole::where("role_id",$res["role_id"])->get()->toArray();
        foreach($data as $k=>$v){
            PowerRole::where("role_id",$v['role_id'])->delete();
        }

        // print_r($res);exit;
        $model=new PowerRole;
        foreach($res["power_id"] as $k=>$v){
            $data=[
                "power_id"=>intval($v),
                "role_id"=>$res["role_id"],
            ];
           
            $res1=$model->insert($data);
        }
        if($res1){
            return ["code"=>"000000","msg"=>"赋值权限成功"];
        }else{
            return ["code"=>"000001","msg"=>"赋值权限失败"];
        }
    }
}

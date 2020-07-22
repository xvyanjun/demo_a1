<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PowerRole;
use App\Models\UserRole;
use Illuminate\Http\Request;
use App\Models\User;
class LoginController extends Controller
{
    //注册展示页面
    public function reg(Request $request){
        return view("admin.login.reg");
    }
    //注册登录页面
    public function login(Request $request){
        return view("admin.login.login");
    }
    //注册执行页面
    public function regAdd(Request $request){
        $data=$request->all();
        $data['admin_time']=time();
        $data['admin_pwd']=md5($data['admin_pwd']);
        if(empty($data['admin_name'])){
            return ["code"=>"000002","msg"=>"用户名不能为空"];
            exit;
        }
        if(empty($data['admin_pwd'])){
            return ["code"=>"000003","msg"=>"密码不能为空"];
            exit;
        }
        $re=User::where("admin_name",$data['admin_name'])->first();
        if($re){
            return ["code"=>"000004","msg"=>"已有改名字"];
            exit;
        }
        $res=User::insert($data);
        if($res){
            return ["code"=>"000000","msg"=>"注册成功"];
        }else{
            return ["code"=>"000001","msg"=>"注册失败"];
        }
    }
    //登录执行
    public function loginAdd(Request $request){
        $data=$request->all();
        if(empty($data['admin_name'])){
            return ["code"=>"000002","msg"=>"用户名不能为空"];
            exit;
        }
        if(empty($data['admin_pwd'])){
            return ["code"=>"000003","msg"=>"密码不能为空"];
            exit;
        }
        //登录执行
        $user=User::where("admin_name",$data["admin_name"])->first();
        if($user){
            if($user['admin_pwd']==md5($data['admin_pwd'])){
                $u_id=$user->admin_id;
                $role_id=UserRole::where("admin_id",$u_id)->get(['role_id']);
//                dd($role_id);

                $powerrole=PowerRole::join("admin_power","role_power.power_id","=","admin_power.power_id")
                    ->whereIn("role_power.role_id",$role_id)
                    ->get()
                    ->toArray();
                $user['power']=$powerrole;
                //登录存session
                session(["admin_user"=>$user]);
                return ["code"=>"000000","msg"=>"登录成功"];
            }else{
                return ["code"=>"000004","msg"=>"密码错误"];
            }
        }else{
            return ["code"=>"000001","msg"=>"没有此用户"];
        }
    }
    
}

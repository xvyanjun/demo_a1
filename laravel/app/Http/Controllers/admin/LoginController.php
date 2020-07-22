<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInfo;
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
        $res=User::insertGetId($data);
        if(!empty($res)){
           
            return ["code"=>"000000","msg"=>"注册成功","admin_id"=>$res];
            
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
                //登录存session
                session(["admin_name"=>$user['admin_name']]);
                return ["code"=>"000000","msg"=>"登录成功"];
            }else{
                return ["code"=>"000004","msg"=>"密码错误"];
            }
        }else{
            return ["code"=>"000001","msg"=>"没有此用户"];
        }
    }

    //登录详情信息
    public function home($id){
        
        return view("admin.login.home",["id"=>$id]);
    }
    //登录详细信息执行
    public function homeAdd(Request $request){
        $_token=$request->except("_token");
        
        // print_r($_token);exit;
        //添加图片 单文件上传
        if(request()->hasFile('s_img')){
            $_token['s_img']=$this->uplode('s_img');
        }
        $res=UserInfo::insert($_token);
        if($res){
            return redirect("admin/login/login");
        }
    }
    //单文件上传
    public function uplode($img){
        $file=request()->$img;
        if($file->isValid()){
           
            $store=$file->store('uploads');
            return $store;
        }
        exit('图片上传失败');
    }
    
}

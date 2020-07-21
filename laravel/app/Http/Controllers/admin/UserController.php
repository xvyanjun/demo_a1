<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRole;
class UserController extends Controller
{
    //用户展示
    public function list(Request $request){
        $res=User::where(['admin_del'=>1])->paginate(2);
        return view('admin.user.list',compact("res"));
    }
    //用户软删除
    public function del(Request $request){
        $admin_id=$request->admin_id;
        $res=User::where("admin_id",$admin_id)->update(['admin_del'=>2]);
        if($res){
            return ['code'=>"000000","msg"=>"软删除成功"];
        }else{
            return ['code'=>"000001","msg"=>"软删除失败"];
        }
    }
    //赋予角色
    public function content(Request $request){
        $id=$request->id;
        $res=User::where("admin_id",$id)->first();
        return view('admin.user.content',compact("res"));
    }
    //赋予角色执行
    public function contentAdd(Request $request){
        $res=$request->all();
        $model=new UserRole;
        foreach($res['role_id'] as $k=>$v){
            $data=[
                "role_id"=>intval($v),
                "admin_id"=>$res['admin_id'],
            ];
            $res1=$model->insert($data);
        }
        if($res1){
            return ['code'=>'000000',"msg"=>"赋予角色成功"];
        }else{
            return ["code"=>"000001","msg"=>"赋予角色失败"];
        }
    }
}

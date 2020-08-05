<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Indexuser;
use App\Models\Shop_code;
use App\models\PhoneCode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SafeController extends Controller
{
    //安全中心
    public function lists(Request $request){
        $data=$request->all();
        $u_id=request()->session()->get('u_id');    
        $res=Indexuser::where("u_id",$u_id)->first();
        return view('qtai/home-setting-safe',compact("res"));
    }
    // 执行·
    public function login_do(Request $request)
    {
        $u_name = $request->u_name;
        $u_pwd = $request->u_pwd;
        $new_pwd = $request->new_pwd;
//        echo $u_pwd;
//        dd($new_pwd);

        $user = new Indexuser();
        $isuser = $user::where('u_name',$u_name)->first();
//        dd($isuser);
        if(empty($isuser)){
            echo json_encode(['errno'=>00001,'msg'=>'此用户不存在']);
            die;
        }else if(md5($u_pwd)!=$isuser->u_pwd){
            echo json_encode(['errno'=>00001,'msg'=>'密码不正确']);
            die;
        }else{
//            $arr = array(
//                'u_pwd'=>$new_pwd
//            );
//            $res = $user::where('u_name',$u_name)->update($arr);
            $isuser->u_pwd=md5($new_pwd);
//            dd($res);
            if($isuser->save()){
                Session::flush('u_phone');
                Session::flush('u_id');
                echo json_encode(['errno'=>00000,'msg'=>'修改成功，请重新登录！']);
            }else{
                echo json_encode(['errno'=>00001,'msg'=>'修改失败']);
                die;
            }
        }

    }

    public function sendcode(Request $request){
        $u_phone = $request->u_phone;
        $phone_code_model = new PhoneCode();
        $re = $phone_code_model->code($u_phone);
        if($re){
           echo json_encode(['errno'=>00000,'msg'=>'短信发送成功']);
        }else{
            echo json_encode(['errno'=>00001,'msg'=>'短信发送失败']);
            die;
        }
    }

    public function change_phone(Request $request){
        $u_phone = $request->u_phone;
        $msgcode = $request->msgcode;
        $user_phone = Session::get('u_phone');

        $code = Session::get('code');

        if($code != $msgcode){
            echo json_encode(['errno'=>00001,'msg'=>'验证码不对！']);
            die;
        }else{
            $res = DB::table('shop_indexuser')->where('u_phone',$user_phone)->update(['u_phone'=>$u_phone]);
            if($res){
                echo json_encode(['errno'=>00000,'msg'=>'修改成功！']);
            }else{
                echo json_encode(['errno'=>00001,'msg'=>'修改失败！']);
                die;
            }
        }


    }

}

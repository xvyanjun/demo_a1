<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Indexuser;
use App\Models\Shop_code;
use App\models\PhoneCode;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //注册展示页面
    public function reg(Request $request)
    {
        return view("index/reg");
    }

    //注册登录页面
    public function login(Request $request)
    {
        return view("index/login");
    }

    /**
     * @param Request $request
     * @return array
     *发送手机验证码
     */
    public function go_reg(Request $request)
    {
        $phone = $request -> post('u_phone');
        if(empty($phone)){
            return [
                'code' => 00001,
                'msg' => '手机号不能为空',
                'result' => ''
            ];
        }
        if(DB::table('shop_code')->where('u_phone', $phone)->count()>=1){
            echo json_encode(['errno' => 00001, 'msg' => '该手机号已存在了!']);
            exit;
        }
        $code_model = new Shop_code();
        $phone_code_model = new PhoneCode();
        #调用短信验证码发送接口
        $re = $phone_code_model->code($phone);
        if($re){
            return [
                'code' => 00000,
                'msg' => '验证码发送成功',
                'result' => ''
            ];
        }else{
            return [
                'code' => 00001,
                'msg' => '验证码发送失败',
                'result' => ''
            ];
        }

    }

    /**
     * @param Request $request
     * @return array
     * 执行注册
     */
    public function reg_do(Request $request)
    {
        $phone = $request->post('u_phone');
        if (empty($phone)) {
            return [
                'code' => 00001,
                'msg' => '手机号不能为空',
                'result' => ''
            ];
        }
        $code = $request->post('code');
        if (empty($code)) {
            return [
                'code' => 00001,
                'msg' => '验证码不能为空',
                'result' => ''
            ];
        }

            $codetrue = DB::table('shop_code')->where('u_phone', $phone)->first();

            //dd($codetrue);
            if ($code != $codetrue->code) {
                echo json_encode(['errno' => 00001, 'msg' => '验证码错误!']);
                exit;
            }
            $pwd = $request->post('u_pwd');
            if (empty($pwd)) {
                return [
                    'code' => 00001,
                    'msg' => '密码不能为空',
                    'result' => ''
                ];
            }
           $u_name = $request -> post('u_name');


            $user_model = new Indexuser();
            $user_model->u_phone = $phone;
            $user_model->u_pwd = md5($pwd);
            $user_model->u_name = $u_name;
            $user_model->u_time = time();
            //echo 123;die;
            if ($user_model->save()) {
                return [
                    'code' => 00000,
                    'msg' => '注册成功',
                    'result' => ''
                ];


            }
        }

// 登录执行
    public function login_do(Request $request)
    {
        $data = $request->all();

        $u_phone = $request->post('u_phone');
        if (empty($u_phone)) {
            return [
                'code' => 00001,
                'msg' => '手机号不能为空',
                'result' => ''
            ];
        }

        $u_pwd = $request->post('u_pwd');
        if (empty($u_pwd)) {
            return [
                'code' => 00001,
                'msg' => '密码不能为空',
                'result' => ''
            ];
        }
        $where = [
            'u_phone' => $u_phone,
            'u_pwd' => $u_pwd
        ];
//        echo "123";die;
        $user_model = Indexuser::where('u_phone', $data['u_phone'])->first();
        if ($user_model) {
            if ($user_model ['u_pwd'] == md5($data['u_pwd'])) {
                session(['u_phone' => $user_model->u_phone]);
                session(['u_id' => $user_model->u_id]);

                $request->session()->save();
                return [
                    'code' => 00000,
                    'msg' => '登录成功',
                    'result' => ''
                ];
            }else{
                echo "123";
            }
        }
    }

}
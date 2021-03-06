<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Indexuser;
use App\Models\Shop_code;
use App\models\PhoneCode;
use Illuminate\Support\Facades\DB;
use App\Models\History;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Cookie as cookies;
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
            return ['code'=>'00007','msg'=>'手机号不能为空'];
        }
        $code = $request->post('code');
        if (empty($code)) {
            return ['code'=>'00001','msg'=>'验证码不能为空'];
            die;
        }

            $codetrue = DB::table('shop_code')->where('u_phone', $phone)->first();

            //dd($codetrue);
            if ($code != $codetrue->code) {
                echo json_encode(['errno' => 00001, 'msg' => '验证码错误!']);
                exit;
            }
            $pwd = $request->post('u_pwd');
            $arr='/^\w{6,16}$/';
            if(empty($pwd)){
                return ['code'=>'00001','msg'=>'密码不能为空'];
                die;
            }else if(!preg_match($arr,$pwd)){
                return ['code'=>'00002','msg'=>'密码必须六位,以及六位以上'];
                die;
            }
           $u_name = $request -> post('u_name');


            $user_model = new Indexuser();
            $user_model->u_phone = $phone;
            $user_model->u_pwd = md5($pwd);
            $user_model->u_name = $u_name;
            $user_model->u_time = time();
            //echo 123;die;
            if ($user_model->save()) {
                return ['code'=>'00000','msg'=>'注册成功'];
            }
        }

// 登录执行
    public function login_do(Request $request)
    {
        $data = $request->all();

        $u_phone = $request->post('u_phone');
        if (empty($u_phone)) {
            return ['code'=>'00006','msg'=>'手机号不能为空'];
           
        }

        $u_pwd = $request->post('u_pwd');
        //   //验证密码非空  必须是六位
        $arr='/^\w{6,16}$/';
        if(empty($u_pwd)){
            return ['code'=>'00001','msg'=>'密码不能为空'];
            die;
        }else if(!preg_match($arr,$u_pwd)){
            return ['code'=>'00002','msg'=>'密码必须六位,以及六位以上'];
            die;
        }
        $where = [
            'u_phone' => $u_phone,
            'u_pwd' => $u_pwd
        ];
//        echo "123";die;

        $user_model = Indexuser::where('u_phone', $data['u_phone'])->first()->toArray();
//        dd($user_model);
        if ($user_model) {
            if ($user_model ['u_pwd'] == md5($data['u_pwd'])) {

                $res=$this->user_history_insert($user_model['u_id']);
//                dd($res);
                session(['u_phone' => $user_model['u_phone']]);
                session(['u_id' => $user_model['u_id']]);
                session(['u_name' => $user_model['u_name']]);
                $request->session()->save();

                return ['code'=>'00000','msg'=>'登录成功'];

            }else{
                return ['code'=>'00003','msg'=>'密码错误'];
            }
        }else{
            return ['code'=>'00004','msg'=>'没有此用户'];
        }

    }

    //退出页面
    public function tuichu(Request $request){
        $u_id=request()->session()->put('u_id',null);
        $id=request()->session()->get('u_id');
//         print_r($id);exit;
//        dd($id);
        if($id==null){
            return redirect('/login');
        }
    }

    public function user_history_insert($u_id){
       if(!empty($u_id)){
        $sf=Cookie::get('user_history');
        if(!empty($sf)){
           $ar=unserialize($sf);
//            dd($ar);
           foreach($ar as $r5=>$t5){
            $History_vl=History::where([['u_id',$u_id],['goods_id',$r5]])->first();
            if($History_vl){
              $h_hits=$t5['h_hits']+$History_vl['h_hits'];  
              History::where([['u_id',$u_id],['goods_id',$r5]])->update([
              'h_time'=>$t5['h_time'],
              'h_hits'=>$h_hits
              ]);
            }else{
              History::insert([
              'goods_id'=>$t5['goods_id'], 
              'u_id'=>$u_id,
              'h_time'=>$t5['h_time'],
              'h_hits'=>$t5['h_hits']
              ]);
              $ck=Cookie::queue('user_history',null);

//                  Cookie::queue(Cookie::forget('user_history'));
//                    setCookie(user_history, "", -1);
//                cookies('user_history',null);
//                dd($ck);
                return $ck;
            }
           }
        }
       }
    }

}
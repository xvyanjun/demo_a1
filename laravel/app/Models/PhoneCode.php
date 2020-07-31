<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Shop_code;
use Illuminate\Support\Facades\Session;

class PhoneCode extends Model
{
    /**
     * @param $phone
     * 发送手机验证码
     */

    public function code($u_phone)
    {
        $host = "http://dingxin.market.alicloudapi.com";
        $path = "/dx/sendSms";
        $method = "POST";
        $appcode = "d446a015f446415d92536a0a940fb20d";
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $code = rand(10000,99999);
        $querys = "mobile=$u_phone&param=code%3A$code&tpl_id=TP1711063";
        $bodys = "";
        $url = $host . $path . "?" . $querys;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        //dd(curl_exec($curl));

        $code_model = new Shop_code();
        $arr = array(
            'code'=>$code,
            'c_time'=>time(),
            'u_phone'=>$u_phone
        );
        Session::put('code',$code);
        $res = $code_model -> insert($arr);
        return curl_exec($curl);
    }
}

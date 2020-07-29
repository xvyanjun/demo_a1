<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\Indexuser;
use Illuminate\Http\Request;
use App\Models\shop_uneed;
use App\Models\Area;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends  Controller
{

    //个人信息
    public function  add(Request $request){
        $uid = Session::get('u_id');
        $date = DB::table('date')->get();
        $province=Area::where(['pid'=>0])->get();
        return view('index/home',['date'=>$date,'province'=>$province]);
    }

  public function  city(Request $request){
      $all=$request->all();
      $pid=$all['p_id'];
      $city=Area::where(['pid'=>$pid])->get()->toArray();
      echo json_encode($city);
  }



    /**
     * @param Request $request
     * @return array
     * 执行添加
     */
    public function add_do(Request $request)
    {

        $_token=$request->all();
        $uid = Session::get('u_id');
        $_token['u_id'] = $uid;
        //添加图片 单文件上传
        $year = $_token['year'];
        $month = $_token['month'];
        $day = $_token['day'];
        $y_birthday = $year."年".$month."月".$day."日";
        unset($_token['year']);
        unset($_token['month']);
        unset($_token['day']);
        $_token['y_birthday'] = $y_birthday;
        if(request()->hasFile('y_img')){
            $_token['y_img']=$this->uplode('y_img');
        }
        $res= shop_uneed::insert($_token);
        if($res){
            echo '添加成功';
//            return redirect("admin/login/login");
        }
    }

//单文件上传
    public function uplode($y_img)
    {
        $file = $y_img;
        if ($file->isValid()) {
            $store = $file->store('uploads');
            return $store;
        }
        exit('图片上传失败');
    }


}

?>
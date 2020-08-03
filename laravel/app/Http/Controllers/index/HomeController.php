<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\Collert;
use App\Models\Goods;
use App\Models\History;
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
        $a1=empty($_token['y_img']);
        $a2=empty($_token['y_name']);
        $a3=empty($_token['year']);
        $a4=empty($_token['month']);
        $a5=empty($_token['day']);
        $a6=empty($_token['y_city']);
        if($a1==true||$a2==true||$a3==true||$a4==true||$a5==true||$a6==true){
           echo '参数缺失';exit;
        }
        $uid = request()->session()->get('u_id');   
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
            echo '添加成功s';
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

    /**
     * 收藏
     */
    public function collect(){
        $collert=new Collert();
        $u_id=request()->session()->get('u_id');
        $goods_id=$collert::where(['u_id'=>$u_id,'is_del'=>1])->get('goods_id')->toArray();
//        dd($goods_id);
        $goods=new Goods();
        $goods_info=$goods::where(['goods_del'=>1])->whereIn('goods_id',$goods_id)->get()->toArray();
//        dd($goods_info);

        //猜你喜欢
        $history=History::where("u_id",$u_id)->orderby("h_hits","desc")->limit(1)->get('goods_id')->toArray();
        if($history){
            $cate_id=Goods::where(["goods_id"=>$history[0]['goods_id']])->first('cate_id')->toArray();
            $history_goods=Goods::where(["cate_id"=>$cate_id])->orderby("goods_hits","desc")->limit(4)->get()->toArray();
        }else{
            $history_goods=[];
        }

        return view('qtai.home-person-collect',['goods_info'=>$goods_info,'history_goods'=>$history_goods]);
    }
    /**
     * 足迹
     */
    public function history(){
        $u_id=request()->session()->get('u_id');
        //猜你喜欢
        $history=History::where("u_id",$u_id)->orderby("h_hits","desc")->limit(1)->get('goods_id')->toArray();
        if($history){
            $cate_id=Goods::where(["goods_id"=>$history[0]['goods_id']])->first('cate_id')->toArray();
            $history_goods=Goods::where(["cate_id"=>$cate_id])->orderby("goods_hits","desc")->limit(4)->get()->toArray();
        }else{
            $history_goods=[];
        }

        $history_id=History::where("u_id",$u_id)->get('goods_id')->toArray();
//        dd($history_id);
        $goods=new Goods();
        $goods_info=$goods::where(['goods_del'=>1])->whereIn('goods_id',$history_id)->get()->toArray();
//        dd($goods_info);
        return view('qtai.home-person-footmark',['history_goods'=>$history_goods,'goods_info'=>$goods_info]);
    }
}


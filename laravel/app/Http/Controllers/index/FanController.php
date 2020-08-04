<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\shop_fan;
use App\Models\Indexuser;
class FanController extends Controller
{
    //反馈的方法
    public function fankui(Request $request){
        $shop_fan=shop_fan::where(['f_del'=>1,'p_id'=>0])->get();
        foreach($shop_fan as $k=>$v){
            $p_id=shop_fan::where("p_id",$v['f_id'])->get();
            $v['aa']=$p_id;
        }
        // dd($shop_fan);
        return view("qtai.fan",compact('shop_fan'));
    }
    //反馈的执行方法
    public function fanAdd(Request $request){
        $u_id=request()->session()->get('u_id');
        if(empty($u_id)){
            return redirect('/login');
        }
        $shop_fan=new shop_fan;
        $data=$request->all();
        if(empty($data['content'])){
            return redirect('/fankui');
            exit;
        }
        // print_r($data);exit;
        $shop_fan->f_time=time();
        $shop_fan->f_text=$data['content'];
        $u_name=Indexuser::where('u_id',$u_id)->value('u_name');
        // print_r($u_name);
        $shop_fan->f_name=$u_name;
        $res=$shop_fan->save($data);
        if($res){
            return redirect('/fankui');
        };
    }
    
    public function huiAdd(Request $request){
        $f_id=$request->f_id;
        $input_name=$request->input_name;
        if(empty($input_name)){
            return redirect('/fankui');
            exit;
        }
        $shop_fan=new shop_fan;
        $u_name=Indexuser::where('u_id',$u_id)->value('u_name');
        // print_r($u_name);
        $shop_fan->f_name=$u_name;
        $shop_fan->p_id=$f_id;
        $shop_fan->f_text=$input_name;
        $shop_fan->f_time=time();
        $res=$shop_fan->save();
        if($res){
            return redirect('/fankui');
        }
    }
}

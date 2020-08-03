<?php

namespace App\Http\Controllers\index;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Address;
class AddressController extends  Controller
{
    //展示
public  function  add_list(Request $request){
//    $data=$request->all();
//    var_dump($data);
    $res=Address::where(["address_del"=>1])->paginate(2);
//    var_dump($res);exit;
    $province=Area::where(['pid'=>0])->get();
    return view('qtai/home-setting-address',['province'=>$province],compact("res"));
}
    //三级联动
    public function  city(Request $request){
        $all=$request->all();
        $pid=$all['p_id'];
        $city=Area::where(['pid'=>$pid])->get()->toArray();
        echo json_encode($city);
    }
    //添加执行
    public function  add_do(Request $request){
    $data=$request->all(); 
//        dd($data);
    if(empty($data['address_name'])){
        return ['code'=>"000009","msg"=>"姓名不能为空"];
        exit;
    }
    $re=Address::where("address_name",$data['address_name'])->first();
    $res=Address::insert($data);

    if($res){
        return ['code'=>"000000","msg"=>"添加成功"];
    }else{
        return ['code'=>"000002","msg"=>"添加失败"];
    }
}
    //软删除
    public function del(Request $request){
        $xx=$request->all();
        $address_id=$request->address_id;
        $a1=array_key_exists('address_id',$xx);
        if($a1==false){
            $fh=['code'=>'000003','msg'=>'参数缺失'];
            return json_encode($fh);exit;
        }
        $res=Address::where("address_id",$address_id)->update(['address_del'=>2]);
        if($res){
            return ['code'=>"000000","msg"=>"软删除成功"];
        }else{
            return ['code'=>"000001","msg"=>"软删除失败"];
        }
    }
    //修改
    public function upd(Request $request){
        $data=$request->all();

        $address_id=$request->address_id;
        $res=Address::where("address_id",$address_id)->first();
        $province=Area::where(['pid'=>0])->get();

        return view("index/address",compact("res",'province'));
    }
    //修改执行
    public function updAdd(Request $request){
        $data=$request->all();
        $id=$data['address_id'];
        $res=Address::where("address_id",$id)->update($data);
        if($res){
            return ['code'=>"000000","msg"=>"修改成功"];
        }else{
            return ['code'=>"000001","msg"=>"修改失败"];
        }
    }
}
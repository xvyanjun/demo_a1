<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Shop_album;
use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Brand;
use App\Models\Cate;
class GoodsController extends Controller
{

    /**
     * 多文件上传页面
     */
    public function uploades(){
        $model=new Goods();
        $goods=$model::get()->toArray();
        return view('admin.goods.uploades',['goods'=>$goods]);
    }
    /**
     * 多文件上传
     */
    public function uploadesadd(Request $request){
        $data=$request->except('_token');
//        dd($data);
        if(!array_key_exists('goods_imgs',$data)){
            echo "
                        <style>
                            .listbut{
                                position:absolute;
                                top: 50%;
                                left: 50%;
                                margin-top: -150px;
                                margin-left: -150px;
                            }
                        </style>
            <link rel='stylesheet' href='/admin/plugins/bootstrap/css/bootstrap.min.css'>
              <script src='/admin/plugins/bootstrap/js/bootstrap.min.js'></script>
              <div class='listbut'>
                    <a href='/admin/goods/uploades'><button type='button' class='btn btn-primary'>文件未经检测到到或者不识别,请重新添加</button></a><br>
               </div>
            ";
            exit;
        }
        if($data['goods_imgs']){
            $photos=$this->Moreuploads('goods_imgs');
            $data['goods_imgs']=implode('|',$photos);
        }
//        dd($data);
        $model=new Shop_album();
        $model->goods_imgs=$data['goods_imgs'];
        $model->goods_id=$data['goods_id'];
        $model->time=time();
        if($model->save()){
            return redirect('/admin/goods/uploadeslist');
        }else{
            echo "
                        <style>
                            .listbut{
                                position:absolute;
                                top: 50%;
                                left: 50%;
                                margin-top: -150px;
                                margin-left: -150px;
                            }
                        </style>
            <link rel='stylesheet' href='/admin/plugins/bootstrap/css/bootstrap.min.css'>
              <script src='/admin/plugins/bootstrap/js/bootstrap.min.js'></script>
              <div class='listbut'>
                    <a href='/admin/goods/uploades'><button type='button' class='btn btn-primary'>相册添加失败,点击重新添加</button></a><br>
               </div>
            ";
            exit;
        }
    }
    //多文件上传引用
    function Moreuploads($filename){
        $photo=request()->file($filename);
        if(!is_array($photo)){
            return;
        }
        foreach($photo as $k=>$v){
            if($v->isValid()){
                $store_result[]=$v->store('upload_ses');
            }
        }
        return $store_result;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 商品相册管理显示页
     */
    public function uploadeslist(){
        $model=new Shop_album();
        $info=$model::where(['is_del'=>1])->paginate(3);

        $model=new Goods();
        $goods=$model::get()->toArray();

        foreach($info as $k=>$v){
            $info[$k]['goods_imgs']=explode('|',$v['goods_imgs']);
//            print_r($v);
        }
//        dd($info);
        return view('admin.goods.uploadeslist',['info'=>$info,'goods'=>$goods]);
    }
    /**
     *相册软删除
     */
    public function uploadesdel(Request $request)
    {
        $goods_imgid = $request->post('goods_imgid');
        if (empty($goods_imgid)) {
            $arr = [
                'code' => '300',
                'msg' => '非法操作',
                'sult' => []
            ];
            return json_encode($arr, JSON_UNESCAPED_UNICODE);
        }
        $model = new Shop_album();
        $info = $model::where(['goods_imgid' => $goods_imgid])->first();
        $info->is_del = 2;
        if ($info->save()) {
            $arr = [
                'code' => '200',
                'msg' => '删除完毕',
                'result' => []
            ];
            return json_encode($arr, JSON_UNESCAPED_UNICODE);
        } else {
            $arr = [
                'code' => '300',
                'msg' => '删除错误',
                'result' => []
            ];
            return json_encode($arr, JSON_UNESCAPED_UNICODE);
        }
    }
    //商品展示
    public function create(Request $request){
        $brand=Brand::get();
        $cate=Cate::get();
        return view("admin.goods.create",compact("brand","cate"));
    }
    //商品执行
    public function add(Request $request){
       $all=$request->except("_token");
//        dd($all);
       $all['goods_time']=time();
       //判断商品名称不能为空
       if(empty($all['goods_name'])){
            echo '
            <script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
            <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
            <script>
                alert("商品名称不能为空");
                window.location.href="/admin/goods/create"
            </script>';
            exit;
       }
       $str="/^[0-9]*$/";
        //验证是否为空正则
        if(empty($all['goods_stroe'])){
            echo '
            <script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
            <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
            <script>
                alert("库存不能为空");
                window.location.href="/admin/goods/create"
            </script>';
             exit;
        }else if(!preg_match($str,$all['goods_stroe'])){
            echo '
            <script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
            <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
            <script>
                alert("必须是纯数字");
                window.location.href="/admin/goods/create"
            </script>';
            exit;
        }
        if(empty($all['goods_price'])){
            echo '
            <script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
            <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
            <script>
                alert("价格不能为空");
                window.location.href="/admin/goods/create"
            </script>';
            exit;
        }else if(!preg_match($str,$all['goods_price'])){
            echo '
            <script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
            <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
            <script>
                alert("价格必须是纯数字");
                window.location.href="/admin/goods/create"
            </script>';
            exit;
        }
       if(request()->hasFile('goods_img')){
        $all['goods_img']=$this->uplode('goods_img');
        }
        $res=Goods::insert($all);
        if($res){
            return redirect("admin/goods/list");
        }
    }
    //单文件上传
    public function uplode($img){
        $file=request()->$img;
        if($file->isValid()){
            $store=$file->store('imgse');
            return $store;
        }
        exit('图片上传失败');
    }
    //商品展示
    public function list(Request $request){
        $res=Goods::leftjoin("shop_brand","shop_goods.brand_id","=","shop_brand.brand_id")
                    ->leftjoin("shop_cate","shop_cate.cate_id","=","shop_goods.cate_id")
                    ->where(['goods_del'=>1])
                    ->paginate(1);
        return view("admin.goods.list",compact("res"));
    }
    //商品软删除
    public function del(Request $request){
        $goods_id=$request->goods_id;
        $res=Goods::where("goods_id",$goods_id)->update(['goods_del'=>2]);
        if($res){
            return ['code'=>"000000","msg"=>"商品软删除成功"];
        }else{
            return ['code'=>"000004","msg"=>"商品软删除失败"];
        }
    }
    //商品修改展示
    public function upd(Request $request){
        $goods_id=$request->id;
        $brand=Brand::get();
        $cate=Cate::get();
        $goods=Goods::where("goods_id",$goods_id)->first();
        return view("admin.goods.upd",compact("brand","cate","goods"));
    }
    //商品修改执行
    public function updAdd(Request $request){
        $all=$request->except("_token");
        $id=$request->id;
        if(request()->hasFile('goods_img')){
            $all['goods_img']=$this->uplodes('goods_img');
        }
        $res=Goods::where("goods_id",$id)->update($all);
        if($res){
            return redirect("admin/goods/list");
        }
    }
     //单文件上传
     public function uplodes($img){
        $file=request()->$img;
        if($file->isValid()){
            $store=$file->store('imgse');
            return $store;
        }
        exit('图片上传失败');
    }
    //即点即改是否展示
    public function ajaxshow(Request $request){
        $id = request()->get("goods_id");
        $goods_show = request()->get("goods_show");
        // dd($id);
        $res = Goods::where("goods_id",$id)->update(["goods_show"=>$goods_show]);
        if($res){
            return json_encode(["code"=>"00000","msg"=>"ok"]);
        }
    }
     //即点即改修改库存
     public function ajaxname(Request $request){
        $id = request()->get("goods_id");
        $goods_stock = request()->get("goods_stock");
        // dd($id);
        $res = Goods::where("goods_id",$id)->update(["goods_stock"=>$goods_stock]);
        if($res){
            return json_encode(["code"=>"00000","msg"=>"ok"]);
        }
    }
    //即点即改修改价格
    public function ajaxprice(Request $request){
        $id = request()->get("goods_id");
        $goods_price = request()->get("goods_price");
        // dd($id);
        $res = Goods::where("goods_id",$id)->update(["goods_price"=>$goods_price]);
        if($res){
            return json_encode(["code"=>"00000","msg"=>"ok"]);
        }
    }
}

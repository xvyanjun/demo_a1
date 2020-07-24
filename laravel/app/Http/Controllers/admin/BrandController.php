<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 品牌展示
     */
    public function index(Request $request){
        $brand_name=$request->brand_name;
        $where=[
            ['brand_del','=',1],
        ];
        if($brand_name){
            $where[]=['brand_name','like','%'.$brand_name.'%'];
        }
        $model=new Brand();
        $res=$model::where($where)->paginate(5);
        $query=request()->all();
        return view('admin.brand.list',['res'=>$res,'query'=>$query]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 品牌添加页
     */
    public function addshow(){
        return view('admin.brand.add');
    }

    /**
     * @param Request $request
     * @return string
     * 品牌添加
     */
    public function add(Request $request)
    {
        $data=$request->all();
//        dd($data);
        $brand_img='';
        if(request()->hasFile('brand_img')) {
            $file = request()->file('brand_img');
            if ($file->isValid()) {
                $hz = request()->file('brand_img')->getClientOriginalExtension();
                $mz = md5(uniqid()).'.'.$hz;
                $dz='/uploads/image/'.date('Y/m/d',time());
                if(!is_dir($dz)){
                    mkdir($dz,777,true);
                }
                $brand_img = request()->file('brand_img')->storeAs($dz, $mz);
                // $qdz = public_path($sc);
            }
        }
//        dd($brand_img);
            $brand_name = $request->post('brand_name');
            if (empty($brand_name)) {
                echo "
                    <script>
                        alert('品牌名称未填写');
                        window.location.href='/admin/brandadd';
                    </script>
                ";
                exit;
            }
            $brand_url = $request->post('url');
            if (empty($brand_url)) {
                echo "
                   <script>
                        alert('品牌地址未填写');
                        window.location.href='/admin/brandadd';
                    </script>
                ";
                exit;

            }
            $brand_time = time();
            $model = new Brand();
            $res = $model::where(['brand_name' => $brand_name])->first();
            if (!empty($res)) {
                echo "
                    <script>
                        alert('品牌名称已存在');
                        window.location.href='/admin/brandadd';
                    </script>
                ";
                exit;
            } else {
                $model->brand_name = $brand_name;
                $model->brand_img = $brand_img;
                $model->brand_url = $brand_url;
                $model->brand_time = $brand_time;
                if ($model->save()) {
                    return redirect('/admin/brand');
                } else {
                    echo "
                        <script>
                            alert('品牌添加失败');
                            window.location.href='/admin/brandadd';
                        </script>
                    ";
                    exit;
                }
            }

    }

    /**
     * @param Request $request
     * 删除
     */
    public function del(Request $request){
        $brand_id=$request->post('brand_id');
        if(empty($brand_id)){
            $arr=[
                'code'=>'300',
                'msg'=>'非法操作',
                'sult'=>[]
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $model=new Brand();
        $info=$model::where(['brand_id'=>$brand_id])->first();
        $info->brand_del=2;
        if($info->save()){
                $arr=[
                    'code'=>'200',
                    'msg'=>'删除完毕',
                    'result'=>[]
                ];
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }else{
                $arr=[
                    'code'=>'300',
                    'msg'=>'删除错误',
                    'result'=>[]
                ];
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }

    }

    /**
     * @param $id
     * 修改页
     */
    public function cateupd($id){
        $model=new Brand();
        $brand=$model::where(['brand_id'=>$id,'brand_del'=>1])->first()->toArray();
        return view('admin.brand.upd',['brand'=>$brand]);
    }

    /**
     * @param Request $request
     * 修改
     */
    public function update(Request $request){
        $brand_img=$request->post('brand_img');
        $brand_id=$request->post('brand_id');
        $brand_name=$request->post('brand_name');
        $brand_url=$request->post('brand_url');
        if(empty($brand_name)){
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
                    <a href='/admin/brandupd/".$brand_id."'><button type='button' class='btn btn-primary'>品牌名称未填写,点我重新修改</button></a><br>
                    <a href='/admin/brand'><button type='button' class='btn btn-primary'>点击返回管理页面</button></a>
                  </div>
            ";
            exit;
        }
        $brand_time=time();

        $model=new Brand();
        $data = $model::where(['brand_id' => $brand_id])->first();
        if(!empty($brand_img)) {
            $brand_img = '';
            if (request()->hasFile('brand_img')) {
                $file = request()->file('brand_img');
                if ($file->isValid()) {
                    $hz = request()->file('brand_img')->getClientOriginalExtension();
                    $mz = md5(uniqid()) . '.' . $hz;
                    $dz = '/uploads/image/' . date('Y/m/d', time());
                    if (!is_dir($dz)) {
                        mkdir($dz, 777, true);
                    }
                    $brand_img = request()->file('brand_img')->storeAs($dz, $mz);
                }
            }
            $data->brand_name = $brand_name;
            $data->brand_url = $brand_url;
            $data->brand_img = $brand_img;
            $data->brand_time = $brand_time;
            if ($data->save()) {
                return redirect('/admin/brand');
            } else {
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
                         <a href='/admin/brandupd/".$brand_id."'><button type='button' class='btn btn-primary'>修改失败,点我重新修改</button></a><br>
                         <a href='/admin/brand'><button type='button' class='btn btn-primary'>点击返回管理页面</button></a>
                     </div>
                ";
                exit;
            }
        }else{
            $data->brand_name = $brand_name;
            $data->brand_url = $brand_url;
            $data->brand_time = $brand_time;
            if ($data->save()) {
                return redirect('/admin/brand');
            } else {
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
                         <a href='/admin/brandupd/".$brand_id."'><button type='button' class='btn btn-primary'>修改失败,点我重新修改</button></a><br>
                         <a href='/admin/brand'><button type='button' class='btn btn-primary'>点击返回管理页面</button></a>
                     </div>
                ";
                exit;
            }
        }
    }

}

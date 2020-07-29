<?php

namespace App\Http\Controllers\a_1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\shop_nav;
use App\Models\shop_service;
use App\Models\shop_slide;
use App\Models\shop_sku_name;
use App\Models\shop_sku_val;
use App\Models\shop_goods;
use App\Models\shop_property;

class demo_a2_contr extends Controller
{

//-------------------------------------------------------------导航
public function nav_tjq(){
  return view('admin.nav_demo.dhang_tjq');
}
//-------------------------------------------------------------
public function nav_tje(){
	$xx=request()->all();
	$a1=array_key_exists('nav_name',$xx);
	$a2=array_key_exists('nav_url',$xx);
	if($a1==false||$a2==false){
		$fh=['a1'=>'1','a2'=>'参数缺失'];
		return json_encode($fh);exit;
	}
	$sf=shop_nav::where([['nav_name',$xx['nav_name']],['nav_del','1']])->first();
    if($sf){
    	$fh=['a1'=>'1','a2'=>'名称重复'];
		return json_encode($fh);exit;
    }
    $tj=shop_nav::insert([
     'nav_name'=>$xx['nav_name'],
     'nav_url'=>$xx['nav_url'],
     'nav_show'=>$xx['nav_show'],
     'nav_time'=>time(),
     'nav_del'=>'1'
    ]);
    if($tj){
    	$fh=['a1'=>'0','a2'=>'添加成功'];
    }else{
    	$fh=['a1'=>'1','a2'=>'添加失败'];
    }
	return json_encode($fh);
}
//-------------------------------------------------------------
public function nav_zse(){
	$xx=request()->all();
	$xxi=shop_nav::where('nav_del','1')->paginate(2);
	if(request()->ajax()){
	  return view('admin.nav_demo.dhang_zse_s',['xxi'=>$xxi,'xx'=>$xx]);
	}
	return view('admin.nav_demo.dhang_zse',['xxi'=>$xxi,'xx'=>$xx]);
}
//-------------------------------------------------------------
public function nav_qx(){
   $xx=request()->all();
   $a1=array_key_exists('id_s',$xx);
   if($a1==false){
     $fh=['a1'=>'1','a2'=>'参数缺失'];
     return json_encode($fh);exit; 
   }
   $id_s=explode(',',$xx['id_s']);
   $sc_s=shop_nav::wherein('nav_id',$id_s)->update(['nav_del'=>'2']);
    if($sc_s){
      $fh=['a1'=>'0','a2'=>'删除成功'];
    }else{
      $fh=['a1'=>'1','a2'=>'删除失败'];
    }   
   return json_encode($fh);
}
//-------------------------------------------------------------
public function nav_jd(){
	$xx=request()->all();
	$a1=array_key_exists('nav_id',$xx);
	$a2=array_key_exists('nav_show',$xx);
	if($a1==false||$a2==false){
	  $fh=['a1'=>'1','a2'=>'参数缺失'];
	  return json_encode($fh);exit;	
	}
	$xg=shop_nav::where([['nav_id',$xx['nav_id']],['nav_del','1']])->update(['nav_show'=>$xx['nav_show']]);
	if($xg){
    	$fh=['a1'=>'0','a2'=>'修改成功'];
    }else{
    	$fh=['a1'=>'1','a2'=>'修改失败'];
    }
	return json_encode($fh);
}
//-------------------------------------------------------------
public function nav_jd_s(){
  $xx=request()->all();
  $a1=array_key_exists('nav_id',$xx);
  $a2=array_key_exists('nav_name',$xx);
  if($a1==false||$a2==false){
    $fh=['a1'=>'1','a2'=>'参数缺失'];
    return json_encode($fh);exit; 
  }
  $sf=shop_nav::where([['nav_name',$xx['nav_name']],['nav_id','<>',$xx['nav_id']],['nav_del','1']])->first();
    if($sf){
      $fh=['a1'=>'1','a2'=>'名称重复'];
      return json_encode($fh);exit;
    }
  $xg=shop_nav::where([['nav_id',$xx['nav_id']],['nav_del','1']])->update(['nav_name'=>$xx['nav_name']]);
  if($xg){
      $fh=['a1'=>'0','a2'=>'修改成功'];
    }else{
      $fh=['a1'=>'1','a2'=>'修改失败'];
    }
  return json_encode($fh);
}
//-------------------------------------------------------------
public function nav_sce(){
	$xx=request()->all();
	$a1=array_key_exists('nav_id',$xx);
	if($a1==false){
		$fh=['a1'=>'1','a2'=>'参数缺失'];
		return json_encode($fh);exit;
	}
	$sc=shop_nav::where([['nav_del','1'],['nav_id',$xx['nav_id']]])->update(['nav_del'=>'2']);
	if($sc){
    	$fh=['a1'=>'0','a2'=>'删除成功'];
    }else{
    	$fh=['a1'=>'1','a2'=>'删除失败'];
    }
	return json_encode($fh);
}
//-------------------------------------------------------------
public function nav_xgq(){
	$xx=request()->all();
	$a1=array_key_exists('nav_id',$xx);
	if($a1==false){
		$fh=['a1'=>'1','a2'=>'参数缺失'];
		return json_encode($fh);exit;
	}
	$xxi=shop_nav::where([['nav_del','1'],['nav_id',$xx['nav_id']]])->first();
	if($xxi){
    	return view('admin.nav_demo.nav_xgq',['xxi'=>$xxi]);
    }else{
    	return redirect('/nav/nav_zse');
    }
}
//-------------------------------------------------------------
public function nav_xge(){
    $xx=request()->all();
	$a1=array_key_exists('nav_name',$xx);
	$a2=array_key_exists('nav_url',$xx);
	$a3=array_key_exists('nav_id',$xx);
	if($a1==false||$a2==false||$a3==false){
		$fh=['a1'=>'1','a2'=>'参数缺失'];
		return json_encode($fh);exit;
	}
	$sf=shop_nav::where([['nav_id','<>',$xx['nav_id']],['nav_name',$xx['nav_name']],['nav_del','1']])->first();
    if($sf){
    	$fh=['a1'=>'1','a2'=>'名称重复'];
		return json_encode($fh);exit;
    }
    $xg=shop_nav::where([['nav_id',$xx['nav_id']],['nav_del','1']])->update([
     'nav_name'=>$xx['nav_name'],
     'nav_url'=>$xx['nav_url'],
     'nav_show'=>$xx['nav_show'],
     'nav_time'=>time(),
     'nav_del'=>'1'
    ]);
    if($xg){
    	$fh=['a1'=>'0','a2'=>'修改成功'];
    }else{
    	$fh=['a1'=>'1','a2'=>'修改失败'];
    }
	return json_encode($fh);
}
//-------------------------------------------------------------咨讯
public function service_tjq(){
  return view('admin.service_demo.service_tjq');
}
//-------------------------------------------------------------
public function service_tje(){
	$xx=request()->all();
	$a1=array_key_exists('service_title',$xx);
	$a2=array_key_exists('service_titles',$xx);
	$a3=array_key_exists('service_text',$xx);
	$a4=array_key_exists('service_sort',$xx);
	$a5=array_key_exists('service_show',$xx);
	if($a1==false||$a2==false||$a3==false||$a4==false||$a5==false){
		$fh=['a1'=>'1','a2'=>'参数缺失'];
		return json_encode($fh);exit;
	}
	$sf=shop_service::where([['service_title',$xx['service_title']],['service_del','1']])->first();
    if($sf){
    	$fh=['a1'=>'1','a2'=>'名称重复'];
		return json_encode($fh);exit;
    }
    $tj=shop_service::insert([
     'service_title'=>$xx['service_title'],
     'service_titles'=>$xx['service_titles'],
     'service_text'=>$xx['service_text'],
     'service_sort'=>$xx['service_sort'],
     'service_show'=>$xx['service_show'],
     'service_time'=>time(),
     'service_del'=>'1'
    ]);
    if($tj){
    	$fh=['a1'=>'0','a2'=>'添加成功'];
    }else{
    	$fh=['a1'=>'1','a2'=>'添加失败'];
    }
	return json_encode($fh);
}
//-------------------------------------------------------------
public function service_zse(){
	$xx=request()->all();
  $a1=array_key_exists('service_show',$xx);
  $a2=array_key_exists('service_title',$xx);

  $wher=[['service_del','1']];

  if($a1==false&&$a2==false){
    $wher=[['service_del','1']];
  }else{
    if(!empty($xx['service_show'])){
       $wher[]=['service_show',$xx['service_show']];
    }
    if(!empty($xx['service_title'])){
       $vl=$xx['service_title'];
       $wher[]=['service_title','like',"%$vl%"];
    }
  }


	$xxi=shop_service::where($wher)->paginate(2);
	if(request()->ajax()){
	  return view('admin.service_demo.service_zse_s',['xxi'=>$xxi,'xx'=>$xx]);
	}
	return view('admin.service_demo.service_zse',['xxi'=>$xxi,'xx'=>$xx]);
}
//-------------------------------------------------------------
public function service_qx(){
   $xx=request()->all();
   $a1=array_key_exists('id_s',$xx);
   if($a1==false){
     $fh=['a1'=>'1','a2'=>'参数缺失'];
     return json_encode($fh);exit; 
   }
   $id_s=explode(',',$xx['id_s']);
   $sc_s=shop_service::wherein('service_id',$id_s)->update(['service_del'=>'2']);
    if($sc_s){
      $fh=['a1'=>'0','a2'=>'删除成功'];
    }else{
      $fh=['a1'=>'1','a2'=>'删除失败'];
    }   
   return json_encode($fh);
}
//-------------------------------------------------------------
public function service_jd(){
  $xx=request()->all();
  $a1=array_key_exists('service_id',$xx);
  $a2=array_key_exists('service_show',$xx);
  if($a1==false||$a2==false){
    $fh=['a1'=>'1','a2'=>'参数缺失'];
    return json_encode($fh);exit; 
  }
  $xg=shop_service::where([['service_id',$xx['service_id']],['service_del','1']])->update(['service_show'=>$xx['service_show']]);
  if($xg){
      $fh=['a1'=>'0','a2'=>'修改成功'];
    }else{
      $fh=['a1'=>'1','a2'=>'修改失败'];
    }
  return json_encode($fh);
}
//-------------------------------------------------------------
public function service_jd_s(){
  $xx=request()->all();
  $a1=array_key_exists('service_id',$xx);
  $a2=array_key_exists('service_title',$xx);
  if($a1==false||$a2==false){
    $fh=['a1'=>'1','a2'=>'参数缺失'];
    return json_encode($fh);exit; 
  }
  $sf=shop_service::where([['service_title',$xx['service_title']],['service_id','<>',$xx['service_id']],['service_del','1']])->first();
    if($sf){
      $fh=['a1'=>'1','a2'=>'名称重复'];
      return json_encode($fh);exit;
    }
  $xg=shop_service::where([['service_id',$xx['service_id']],['service_del','1']])->update(['service_title'=>$xx['service_title']]);
  if($xg){
      $fh=['a1'=>'0','a2'=>'修改成功'];
    }else{
      $fh=['a1'=>'1','a2'=>'修改失败'];
    }
  return json_encode($fh);
}
//-------------------------------------------------------------
public function service_sce(){
	$xx=request()->all();
	$a1=array_key_exists('service_id',$xx);
	if($a1==false){
		$fh=['a1'=>'1','a2'=>'参数缺失'];
		return json_encode($fh);exit;
	}
	$sc=shop_service::where([['service_del','1'],['service_id',$xx['service_id']]])->update(['service_del'=>'2']);
	if($sc){
    	$fh=['a1'=>'0','a2'=>'删除成功'];
    }else{
    	$fh=['a1'=>'1','a2'=>'删除失败'];
    }
	return json_encode($fh);
}
//-------------------------------------------------------------
public function service_xgq(){
	$xx=request()->all();
	$a1=array_key_exists('service_id',$xx);
	if($a1==false){
		$fh=['a1'=>'1','a2'=>'参数缺失'];
		return json_encode($fh);exit;
	}
	$xxi=shop_service::where([['service_del','1'],['service_id',$xx['service_id']]])->first();
	if($xxi){
    	return view('admin.service_demo.service_xgq',['xxi'=>$xxi]);
    }else{
    	return redirect('/service/service_zse');
    }
}
//-------------------------------------------------------------
public function service_xge(){
	$xx=request()->all();
	$a1=array_key_exists('service_title',$xx);
	$a2=array_key_exists('service_titles',$xx);
	$a3=array_key_exists('service_text',$xx);
	$a4=array_key_exists('service_sort',$xx);
	$a5=array_key_exists('service_show',$xx);
	$a6=array_key_exists('service_id',$xx);
	if($a1==false||$a2==false||$a3==false||$a4==false||$a5==false||$a6==false){
		$fh=['a1'=>'1','a2'=>'参数缺失'];
		return json_encode($fh);exit;
	}
	$sf=shop_service::where([['service_id','<>',$xx['service_id']],['service_title',$xx['service_title']],['service_del','1']])->first();
    if($sf){
    	$fh=['a1'=>'1','a2'=>'名称重复'];
		return json_encode($fh);exit;
    }
    $xg=shop_service::where([['service_id',$xx['service_id']],['service_del','1']])->update([
     'service_title'=>$xx['service_title'],
     'service_titles'=>$xx['service_titles'],
     'service_text'=>$xx['service_text'],
     'service_sort'=>$xx['service_sort'],
     'service_show'=>$xx['service_show'],
     'service_time'=>time(),
     'service_del'=>'1'
    ]);
    if($xg){
    	$fh=['a1'=>'0','a2'=>'修改成功'];
    }else{
    	$fh=['a1'=>'1','a2'=>'修改失败'];
    }
	return json_encode($fh);
}
//-------------------------------------------------------------轮播图
public function slide_tjq(){
  return view('admin.slide_demo.slide_tjq');
}
//-------------------------------------------------------------
public function slide_tje(){
  $xx=request()->all();
  $qdz='';
  if(request()->hasFile('slide_img')) {
      $file = request()->file('slide_img');
      if ($file->isValid()) {
          $hz = request()->file('slide_img')->getClientOriginalExtension();
          $mz = md5(uniqid()).'.'.$hz;
          $dz='./uploads/image/'.date('Y/m/d');
          if(!is_dir($dz)){
           mkdir($dz,777,true);
          }
          $qdz = request()->file('slide_img')->storeAs($dz, $mz);
          // $qdz = public_path($sc);
      }
  }
  $cd=strlen($qdz);
  $slide_img=substr($qdz,1,$cd);

  $a1=array_key_exists('slide_url',$xx);
  // $a2=array_key_exists('slide_img',$xx);
  $a3=array_key_exists('slide_weight',$xx);
  $a4=array_key_exists('slide_show',$xx);
  if($a1==false&&$qdz==''&&$a3==false&&$a4==false){
  	$fh=['a1'=>'1','a2'=>'参数缺失'];
  	return redirect('/slide/slide_tjq');
	// return json_encode($fh);exit;
  }
  $sf=shop_slide::where([['slide_url',$xx['slide_url']],['slide_del','1']])->first();
  if($sf){
  	$fh=['a1'=>'1','a2'=>'该跳转地址已存在'];
  	return redirect('/slide/slide_tjq');
    // return json_encode($fh);exit;
  }
  $tj=shop_slide::insert([
     'slide_url'=>$xx['slide_url'],
     'slide_img'=>$slide_img,
     'slide_weight'=>$xx['slide_weight'],
     'slide_show'=>$xx['slide_show'],
     'slide_time'=>time(),
     'slide_del'=>'1'
    ]);
    if($tj){
    	return redirect('/slide/slide_zse');
    	$fh=['a1'=>'0','a2'=>'添加成功'];
    }else{
    	return redirect('/slide/slide_tjq');
    	$fh=['a1'=>'1','a2'=>'添加失败'];
    }
	// return json_encode($fh);

}
//-------------------------------------------------------------
public function scs($xc){
  $arr=[];
  $xc=request()->$xc;
  foreach($xc as $c=>$v){
    if($v->isValid()){
        $lj=$v->store('uploads');
        $arr[$c]=$lj;
    }
  }  
  return $arr;
}
//-------------------------------------------------------------
public function slide_zse(){
	$xx=request()->all();
	$xxi=shop_slide::where('slide_del','1')->paginate(2);
	if(request()->ajax()){
	  return view('admin.slide_demo.slide_zse_s',['xxi'=>$xxi,'xx'=>$xx]);
	}
	return view('admin.slide_demo.slide_zse',['xxi'=>$xxi,'xx'=>$xx]);
}
//-------------------------------------------------------------
public function slide_qx(){
   $xx=request()->all();
   $a1=array_key_exists('id_s',$xx);
   if($a1==false){
     $fh=['a1'=>'1','a2'=>'参数缺失'];
     return json_encode($fh);exit; 
   }
   $id_s=explode(',',$xx['id_s']);
   $sc_s=shop_slide::wherein('slide_id',$id_s)->update(['slide_del'=>'2']);
    if($sc_s){
      $fh=['a1'=>'0','a2'=>'删除成功'];
    }else{
      $fh=['a1'=>'1','a2'=>'删除失败'];
    }   
   return json_encode($fh);
}
//-------------------------------------------------------------
public function slide_jd(){
  $xx=request()->all();
  $a1=array_key_exists('slide_id',$xx);
  $a2=array_key_exists('slide_show',$xx);
  if($a1==false||$a2==false){
    $fh=['a1'=>'1','a2'=>'参数缺失'];
    return json_encode($fh);exit; 
  }
  $xg=shop_slide::where([['slide_id',$xx['slide_id']],['slide_del','1']])->update(['slide_show'=>$xx['slide_show']]);
  if($xg){
      $fh=['a1'=>'0','a2'=>'修改成功'];
    }else{
      $fh=['a1'=>'1','a2'=>'修改失败'];
    }
  return json_encode($fh);
}
//-------------------------------------------------------------
public function slide_jd_s(){
  $xx=request()->all();
  $a1=array_key_exists('slide_id',$xx);
  $a2=array_key_exists('slide_url',$xx);
  if($a1==false||$a2==false){
    $fh=['a1'=>'1','a2'=>'参数缺失'];
    return json_encode($fh);exit; 
  }
  $sf=shop_slide::where([['slide_url',$xx['slide_url']],['slide_id','<>',$xx['slide_id']],['slide_del','1']])->first();
    if($sf){
      $fh=['a1'=>'1','a2'=>'名称重复'];
      return json_encode($fh);exit;
    }
  $xg=shop_slide::where([['slide_id',$xx['slide_id']],['slide_del','1']])->update(['slide_url'=>$xx['slide_url']]);
  if($xg){
      $fh=['a1'=>'0','a2'=>'修改成功'];
    }else{
      $fh=['a1'=>'1','a2'=>'修改失败'];
    }
  return json_encode($fh);
}
//-------------------------------------------------------------
public function slide_sce(){
	$xx=request()->all();
	$a1=array_key_exists('slide_id',$xx);
	if($a1==false){
		$fh=['a1'=>'1','a2'=>'参数缺失'];
		return json_encode($fh);exit;
	}
	$sc=shop_slide::where([['slide_del','1'],['slide_id',$xx['slide_id']]])->update(['slide_del'=>'2']);
	if($sc){
    	$fh=['a1'=>'0','a2'=>'删除成功'];
    }else{
    	$fh=['a1'=>'1','a2'=>'删除失败'];
    }
	return json_encode($fh);
}
//-------------------------------------------------------------
public function slide_xgq(){
	$xx=request()->all();
	$a1=array_key_exists('slide_id',$xx);
	if($a1==false){
		$fh=['a1'=>'1','a2'=>'参数缺失'];
		return json_encode($fh);exit;
	}
	$xxi=shop_slide::where([['slide_del','1'],['slide_id',$xx['slide_id']]])->first();
	if($xxi){
    	return view('admin.slide_demo.slide_xgq',['xxi'=>$xxi]);
    }else{
    	return redirect('/slide/slide_zse');
    }
}
//-------------------------------------------------------------
public function slide_xge(){
	$xx=request()->all();
	$a1=array_key_exists('slide_url',$xx);
	$a2=array_key_exists('slide_img',$xx);
	$a3=array_key_exists('slide_weight',$xx);
	$a4=array_key_exists('slide_show',$xx);
	$a5=array_key_exists('slide_img_y',$xx);
	$a6=array_key_exists('slide_id',$xx);
	if($a1==false||$a3==false||$a4==false||$a6==false){
		$fh=['a1'=>'1','a2'=>'参数缺失'];
		return json_encode($fh);exit;
	}
	if($a2==false&&$a5==false){
		$fh=['a1'=>'1','a2'=>'参数缺失'];
		return json_encode($fh);exit;
	}
	if($a2==true){
		  $qdz='';
          if(request()->hasFile('slide_img')) {
              $file = request()->file('slide_img');
              if ($file->isValid()) {
                  $hz = request()->file('slide_img')->getClientOriginalExtension();
                  $mz = md5(uniqid()).'.'.$hz;
                  $dz='./uploads/image/'.date('Y/m/d');
                  if(!is_dir($dz)){
                   mkdir($dz,777,true);
                  }
                  $qdz = request()->file('slide_img')->storeAs($dz, $mz);
                  // $qdz = public_path($sc);
              }
          }
          $cd=strlen($qdz);
          $slide_img=substr($qdz,1,$cd);
	}else{
		  $slide_img=$xx['slide_img_y'];
	}
	$sf=shop_slide::where([['slide_id','<>',$xx['slide_id']],['slide_url',$xx['slide_url']],['slide_del','1']])->first();
    if($sf){
    	$fh=['a1'=>'1','a2'=>'名称重复'];
		return json_encode($fh);exit;
    }
    $xg=shop_slide::where([['slide_id',$xx['slide_id']],['slide_del','1']])->update([
     'slide_url'=>$xx['slide_url'],
     'slide_img'=>$slide_img,
     'slide_weight'=>$xx['slide_weight'],
     'slide_show'=>$xx['slide_show'],
     'slide_time'=>time(),
     'slide_del'=>'1'
    ]);
    if($xg){
    	return redirect('/slide/slide_zse');
    	$fh=['a1'=>'0','a2'=>'修改成功'];
    }else{
    	return redirect('/slide/slide_zse');
    	$fh=['a1'=>'1','a2'=>'修改失败'];
    }
}
//-------------------------------------------------------------sku属性
public function sku_name_tjq(){
  return view('admin.sku_name_demo.sku_name_tjq');
}
//-------------------------------------------------------------
public function sku_name_tje(){
  $xx=request()->all();
  $a1=array_key_exists('attr_name',$xx);
  if($a1==false){
    $fh=['a1'=>'1','a2'=>'参数缺失'];
    return json_encode($fh);exit;
  }
  $sf=shop_sku_name::where([['attr_name',$xx['attr_name']],['attr_del','1']])->first();
  if($sf){
    $fh=['a1'=>'1','a2'=>'名称重复'];
    return json_encode($fh);exit;
  }
  $tj=shop_sku_name::insert([
     'attr_name'=>$xx['attr_name'],
     'attr_time'=>time(),
     'attr_del'=>'1'
    ]);
    if($tj){
      $fh=['a1'=>'0','a2'=>'添加成功'];
    }else{
      $fh=['a1'=>'1','a2'=>'添加失败'];
    }
    return json_encode($fh);
}
//-------------------------------------------------------------
public function sku_name_zse(){
  // dd(eva());
  $xx=request()->all();
  $xxi=shop_sku_name::where('attr_del','1')->paginate(20);
  if(request()->ajax()){
    return view('admin.sku_name_demo.sku_name_zse_s',['xxi'=>$xxi,'xx'=>$xx]);
  }
  return view('admin.sku_name_demo.sku_name_zse',['xxi'=>$xxi,'xx'=>$xx]);
}
//-------------------------------------------------------------
public function sku_name_qx(){
   $xx=request()->all();
   $a1=array_key_exists('id_s',$xx);
   if($a1==false){
     $fh=['a1'=>'1','a2'=>'参数缺失'];
     return json_encode($fh);exit; 
   }
   $id_s=explode(',',$xx['id_s']);
   $sc_s=shop_sku_name::wherein('attr_id',$id_s)->update(['attr_del'=>'2']);
    if($sc_s){
      $fh=['a1'=>'0','a2'=>'删除成功'];
    }else{
      $fh=['a1'=>'1','a2'=>'删除失败'];
    }   
   return json_encode($fh);
}
//-------------------------------------------------------------
public function sku_name_jd_s(){
  $xx=request()->all();
  $a1=array_key_exists('attr_id',$xx);
  $a2=array_key_exists('attr_name',$xx);
  if($a1==false||$a2==false){
    $fh=['a1'=>'1','a2'=>'参数缺失'];
    return json_encode($fh);exit; 
  }
  $sf=shop_sku_name::where([['attr_name',$xx['attr_name']],['attr_id','<>',$xx['attr_id']],['attr_del','1']])->first();
    if($sf){
      $fh=['a1'=>'1','a2'=>'名称重复'];
      return json_encode($fh);exit;
    }
  $xg=shop_sku_name::where([['attr_id',$xx['attr_id']],['attr_del','1']])->update(['attr_name'=>$xx['attr_name']]);
  if($xg){
      $fh=['a1'=>'0','a2'=>'修改成功'];
    }else{
      $fh=['a1'=>'1','a2'=>'修改失败'];
    }
  return json_encode($fh);
}
//-------------------------------------------------------------
public function sku_name_sce(){
  $xx=request()->all();
  $a1=array_key_exists('attr_id',$xx);
  if($a1==false){
    $fh=['a1'=>'1','a2'=>'参数缺失'];
    return json_encode($fh);exit;
  }
  $sc=shop_sku_name::where([['attr_del','1'],['attr_id',$xx['attr_id']]])->update(['attr_del'=>'2']);
  if($sc){
      $fh=['a1'=>'0','a2'=>'删除成功'];
    }else{
      $fh=['a1'=>'1','a2'=>'删除失败'];
    }
  return json_encode($fh);
}
//-------------------------------------------------------------sku属性值
public function sku_val_tjq(){
  $xxi=shop_sku_name::where('attr_del','1')->get();
  return view('admin.sku_val_demo.sku_val_tjq',['xxi'=>$xxi]);
}
//-------------------------------------------------------------
public function sku_val_tje(){
  $xx=request()->all();
  $a1=array_key_exists('val_name',$xx);
  $a2=array_key_exists('attr_id',$xx);
  if($a1==false||$a2==false){
    $fh=['a1'=>'1','a2'=>'参数缺失'];
    return json_encode($fh);exit;
  }
  $sf=shop_sku_val::where([['val_name',$xx['val_name']],['val_del','1']])->first();
  if($sf){
    $fh=['a1'=>'1','a2'=>'名称重复'];
    return json_encode($fh);exit;
  }
  $tj=shop_sku_val::insert([
     'val_name'=>$xx['val_name'],
     'attr_id'=>$xx['attr_id'],
     'val_time'=>time(),
     'val_del'=>'1'
    ]);
    if($tj){
      $fh=['a1'=>'0','a2'=>'添加成功'];
    }else{
      $fh=['a1'=>'1','a2'=>'添加失败'];
    }
    return json_encode($fh);
}
//-------------------------------------------------------------
public function sku_val_zse(){
  $xx=request()->all();
  $sxing=shop_sku_name::where('attr_del','1')->get();
  $xxi=shop_sku_val::where('val_del','1')->paginate(20);
  if(request()->ajax()){
    return view('admin.sku_val_demo.sku_val_zse_s',['xxi'=>$xxi,'xx'=>$xx,'sxing'=>$sxing]);
  }
  return view('admin.sku_val_demo.sku_val_zse',['xxi'=>$xxi,'xx'=>$xx,'sxing'=>$sxing]);
}
//-------------------------------------------------------------
public function sku_val_qx(){
   $xx=request()->all();
   $a1=array_key_exists('id_s',$xx);
   if($a1==false){
     $fh=['a1'=>'1','a2'=>'参数缺失'];
     return json_encode($fh);exit; 
   }
   $id_s=explode(',',$xx['id_s']);
   $sc_s=shop_sku_val::wherein('val_id',$id_s)->update(['val_del'=>'2']);
    if($sc_s){
      $fh=['a1'=>'0','a2'=>'删除成功'];
    }else{
      $fh=['a1'=>'1','a2'=>'删除失败'];
    }   
   return json_encode($fh);
}
//-------------------------------------------------------------
public function sku_val_jd_s(){
  $xx=request()->all();
  $a1=array_key_exists('val_id',$xx);
  $a2=array_key_exists('val_name',$xx);
  if($a1==false||$a2==false){
    $fh=['a1'=>'1','a2'=>'参数缺失'];
    return json_encode($fh);exit; 
  }
  $sf=shop_sku_val::where([['val_name',$xx['val_name']],['val_id','<>',$xx['val_id']],['val_del','1']])->first();
    if($sf){
      $fh=['a1'=>'1','a2'=>'名称重复'];
      return json_encode($fh);exit;
    }
  $xg=shop_sku_val::where([['val_id',$xx['val_id']],['val_del','1']])->update(['val_name'=>$xx['val_name']]);
  if($xg){
      $fh=['a1'=>'0','a2'=>'修改成功'];
    }else{
      $fh=['a1'=>'1','a2'=>'修改失败'];
    }
  return json_encode($fh);
}
//-------------------------------------------------------------
public function sku_val_sce(){
  $xx=request()->all();
  $a1=array_key_exists('val_id',$xx);
  if($a1==false){
    $fh=['a1'=>'1','a2'=>'参数缺失'];
    return json_encode($fh);exit;
  }
  $sc=shop_sku_val::where([['val_del','1'],['val_id',$xx['val_id']]])->update(['val_del'=>'2']);
  if($sc){
      $fh=['a1'=>'0','a2'=>'删除成功'];
    }else{
      $fh=['a1'=>'1','a2'=>'删除失败'];
    }
  return json_encode($fh);
}
//-------------------------------------------------------------
}

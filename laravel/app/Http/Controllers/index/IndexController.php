<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\shop_slide;
use App\Models\shop_nav;
use App\Models\shop_service;

class IndexController extends Controller
{
//-------------------------------------------------------------------------
public function index(){
  $slide_s=shop_slide::where([['slide_del','1'],['slide_show','1']])->orderby('slide_weight','asc')->get();	
  $service_s=shop_service::where([['service_show','1'],['service_del','1']])->paginate(5);
  return view('qtai.index',['slide_s'=>$slide_s,'service_s'=>$service_s]);
}
//-------------------------------------------------------------------------
public function dhang_jz(){
  $nav_s=shop_nav::where([['nav_show','1'],['nav_del','1']])->get();
  return json_encode($nav_s);
}
//-------------------------------------------------------------------------

//-------------------------------------------------------------------------

//-------------------------------------------------------------------------

//-------------------------------------------------------------------------
}

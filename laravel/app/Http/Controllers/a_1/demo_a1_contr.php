<?php

namespace App\Http\Controllers\a_1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class demo_a1_contr extends Controller
{
//---------------------------------------------------------------------------	
public function index(){
  return view('qtai.index');
}
//---------------------------------------------------------------------------	
public function home_index(){
  return view('qtai.home-index');
}
//---------------------------------------------------------------------------	
public function home_order_pay(){
  return view('qtai.home-order-pay');
}
//---------------------------------------------------------------------------	
public function home_order_send(){
  return view('qtai.home-order-send');
}
//---------------------------------------------------------------------------	
public function home_order_receive(){
  return view('qtai.home-order-receive');
}
//---------------------------------------------------------------------------	
public function home_order_evaluate(){
  return view('qtai.home-order-evaluate');
}
//---------------------------------------------------------------------------	
public function home_person_collect(){
  return view('qtai.home-person-collect');
}
//---------------------------------------------------------------------------	
public function home_person_footmark(){
  return view('qtai.home-person-footmark');
}
//---------------------------------------------------------------------------	
public function home_setting_info(){
  return view('qtai.home-setting-info');
}
//---------------------------------------------------------------------------	
public function home_setting_address(){
  return view('qtai.home-setting-address');
}
//---------------------------------------------------------------------------	
public function home_setting_safe(){
  return view('qtai.home-setting-safe');
}
//---------------------------------------------------------------------------	
public function cart(){
  return view('qtai.cart');
}
//---------------------------------------------------------------------------	
public function getOrderInfo(){
  return view('qtai.getOrderInfo');
}
//---------------------------------------------------------------------------	
public function search(){
  return view('qtai.search');
}
//---------------------------------------------------------------------------	
public function item(){
  return view('qtai.item');
}
//---------------------------------------------------------------------------	
}

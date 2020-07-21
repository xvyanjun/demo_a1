<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//---------------------------------------------------------
// Route::get('/', function () {
//     return view('welcome');
// });
//---------------------------------------------------------
// Route::prefix('/demo')->group(function(){
//   Route::any('demo','a_1\Demo_demo1contr@demo'); 
// });
//---------------------------------------------------------
// Route::any('/','a_1\demo_a1_contr@eva');
//---------------------------------------------------------

//前台
Route::any('/','a_1\demo_a1_contr@index');
//---------------------------------------------------------
Route::any('/home_index','a_1\demo_a1_contr@home_index');
//---------------------------------------------------------
Route::any('/home_order_pay','a_1\demo_a1_contr@home_order_pay');
//---------------------------------------------------------
Route::any('/home_order_send','a_1\demo_a1_contr@home_order_send');
//---------------------------------------------------------
Route::any('/home_order_receive','a_1\demo_a1_contr@home_order_receive');
//---------------------------------------------------------
Route::any('/home_order_evaluate','a_1\demo_a1_contr@home_order_evaluate');
//---------------------------------------------------------
Route::any('/home_person_collect','a_1\demo_a1_contr@home_person_collect');
//---------------------------------------------------------
Route::any('/home_person_footmark','a_1\demo_a1_contr@home_person_footmark');
//---------------------------------------------------------
Route::any('/home_setting_info','a_1\demo_a1_contr@home_setting_info');
//---------------------------------------------------------
Route::any('/home_setting_address','a_1\demo_a1_contr@home_setting_address');
//---------------------------------------------------------
Route::any('/home_setting_safe','a_1\demo_a1_contr@home_setting_safe');
//---------------------------------------------------------
Route::any('/cart','a_1\demo_a1_contr@cart');
//---------------------------------------------------------
Route::any('/getOrderInfo','a_1\demo_a1_contr@getOrderInfo');
//---------------------------------------------------------
Route::any('/search','a_1\demo_a1_contr@search');
//---------------------------------------------------------
Route::any('/item','a_1\demo_a1_contr@item');
//---------------------------------------------------------
//后台
Route::any('/index', 'admin\IndexController@index');//首页

//商品
Route::prefix('/admin')->group(function(){
    Route::any('/goods', 'admin\GoodsController@index');//展示
    Route::any('/goodsadd', 'admin\GoodsController@addshow');//添加
});
//分类
Route::prefix('/admin')->group(function(){
    Route::any('/cate', 'admin\CateController@index');//展示
    Route::any('/cateadd', 'admin\CateController@addshow');//添加页
    Route::any('/cateadds', 'admin\CateController@add');//添加
    Route::any('/del', 'admin\CateController@del');//删除
    Route::any('/cateupd/{id}', 'admin\CateController@cateupd');//修改页
    Route::any('/update', 'admin\CateController@update');//修改
    Route::any('/updateshow', 'admin\CateController@updateshow');//即点即改
});
//品牌
Route::prefix('/admin')->group(function(){
    Route::any('/brand', 'admin\BrandController@index');//展示
    Route::any('/brandadd', 'admin\BrandController@addshow');//添加页
    Route::any('/brandadds', 'admin\BrandController@add');//添加
    Route::any('/branddel', 'admin\BrandController@del');//删除
    Route::any('/brandupd/{id}', 'admin\BrandController@cateupd');//修改页
    Route::any('/brandupdate', 'admin\BrandController@update');//修改
    Route::any('/updateshow', 'admin\BrandController@updateshow');//即点即改
});

//---------------------------------------------------------导航
Route::prefix('/nav')->group(function(){
  Route::any('nav_tjq','a_1\demo_a2_contr@nav_tjq'); 
  Route::any('nav_tje','a_1\demo_a2_contr@nav_tje'); 
  Route::any('nav_zse','a_1\demo_a2_contr@nav_zse');
  Route::any('nav_jd','a_1\demo_a2_contr@nav_jd');
  Route::any('nav_sce','a_1\demo_a2_contr@nav_sce');
  Route::any('nav_xgq','a_1\demo_a2_contr@nav_xgq'); 
  Route::any('nav_xge','a_1\demo_a2_contr@nav_xge');   
});
//---------------------------------------------------------资讯
Route::prefix('/service')->group(function(){
  Route::any('service_tjq','a_1\demo_a2_contr@service_tjq'); 
  Route::any('service_tje','a_1\demo_a2_contr@service_tje'); 
  Route::any('service_zse','a_1\demo_a2_contr@service_zse');
  Route::any('service_sce','a_1\demo_a2_contr@service_sce');
  Route::any('service_xgq','a_1\demo_a2_contr@service_xgq'); 
  Route::any('service_xge','a_1\demo_a2_contr@service_xge');   
});
//---------------------------------------------------------轮播图
Route::prefix('/slide')->group(function(){
  Route::any('slide_tjq','a_1\demo_a2_contr@slide_tjq'); 
  Route::any('slide_wje','a_1\demo_a2_contr@slide_wje');
  Route::any('slide_tje','a_1\demo_a2_contr@slide_tje'); 
  Route::any('slide_zse','a_1\demo_a2_contr@slide_zse');
  Route::any('slide_sce','a_1\demo_a2_contr@slide_sce');
  Route::any('slide_xgq','a_1\demo_a2_contr@slide_xgq'); 
  Route::any('slide_xge','a_1\demo_a2_contr@slide_xge');   
});
//---------------------------------------------------------
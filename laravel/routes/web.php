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


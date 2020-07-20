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

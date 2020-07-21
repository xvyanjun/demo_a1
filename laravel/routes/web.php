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

//rbac权限管理
Route::prefix('/admin')->group(function(){
    Route::any('/power/create', 'admin\PowerController@create');//权限添加展示
    Route::any('/power/add', 'admin\PowerController@add');//权限添加执行
    Route::any('/power/list', 'admin\PowerController@list');//权限添加执行
    Route::any('/power/del', 'admin\PowerController@del');//权限软删除
    Route::any('/power/upd/{id}', 'admin\PowerController@upd');//权限修改展示
    Route::any('/power/updAdd', 'admin\PowerController@updAdd');//权限修改执行
});
//rbac角色管理
Route::prefix('/admin')->group(function(){
    Route::any('/role/create', 'admin\RoleController@create');//角色添加展示
    Route::any('/role/add', 'admin\RoleController@add');//角色添加执行
    Route::any('/role/list', 'admin\RoleController@list');//角色列表展示
    Route::any('/role/del', 'admin\RoleController@del');//角色软删除
    Route::any('/role/upd/{id}', 'admin\RoleController@upd');//角色修改展示
    Route::any('/role/updAdd', 'admin\RoleController@updAdd');//角色修改执行
    Route::any('/role/content/{id}', 'admin\RoleController@content');//角色赋予权限
    Route::any('/role/contentAdd', 'admin\RoleController@contentAdd');//角色赋予执行
});
//rbac用户管理
Route::prefix('/admin')->group(function(){
    Route::any('/user/list', 'admin\UserController@list');//用户列表展示
    Route::any('/user/del', 'admin\UserController@del');//用户软删除
    Route::any('/user/content/{id}', 'admin\UserController@content');//给用户赋予角色
    Route::any('/user/contentAdd', 'admin\UserController@contentAdd');//给用户赋予角色执行
});


//友情链接
Route::prefix('/admin')->group(function(){
    Route::any('/friend/create', 'admin\FriendController@create');//友情添加展示
    Route::any('/friend/add', 'admin\FriendController@add');//友情添加执行
    Route::any('/friend/list', 'admin\FriendController@list');//友情添加展示
    Route::any('/friend/del', 'admin\FriendController@del');//友情软删除
    Route::any('/friend/upd/{id}', 'admin\FriendController@upd');//友情修改
    Route::any('/friend/updAdd', 'admin\FriendController@updAdd');//友情修改执行
});
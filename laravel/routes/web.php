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

//---------------------------------------------------------
//前台
Route::any('/','index\IndexController@index');
//---------------------------------------------------------
Route::prefix('/')->group(function(){
//---------------------------------------------------------导航
Route::any('/dhang_jz','index\IndexController@dhang_jz');
//---------------------------------------------------------点击分类页下的商品页
Route::any('/cate_list/{id}','index\CateController@cate_list');
Route::any('/cate_goods_list/tiaojian','index\GoodsController@goods_tiao_list'); //分类商品列表页点击条件
//---------------------------------------------------------商品详情页
Route::any('/goods_list/{id}','index\GoodsController@goods_list');
//---------------------------------------------------------商品加入购物车
Route::any('/shopping','index\GoodsController@shopping');
Route::any('/sehao','index\GoodsController@sehao');
//---------------------------------------------------------楼层左侧

Route::any('/dhang_lceng','index\IndexController@dhang_lceng');
//-----------------------------------------------------------
Route::any('/list/{id}','index\ListController@list');//品牌列表

//---------------------------------------------------------前台首页

Route::any('dhang_lceng','index\IndexController@dhang_lceng');
//---------------------------------------------------------js楼层-条件-数据获取
Route::any('lou_ceng_sj','index\IndexController@lou_ceng_sj');
//---------------------------------------------------------js有趣—加载时获数据
Route::any('yqv_replace_sj','index\IndexController@yqv_replace_sj');
//---------------------------------------------------------首页品牌加载
Route::any('ppai_js','index\IndexController@ppai_js');

//----------------------------------------------------------
});
//---------------------------------------------------------
Route::any('/friend','index\IndexController@friend');
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
//前台登录
Route::any('/login','index\LoginController@login'); //登录展示
Route::any('/login_do','index\LoginController@login_do'); //执行登录
//前台注册
Route::any('/reg','index\LoginController@reg');//注册
Route::any('/go_reg','index\LoginController@go_reg');//发送短信验证码
Route::any('/reg_do','index\LoginController@reg_do');//执行注册

//个人信息
Route::any('/add','index\HomeController@add');
Route::any('/add_do','index\HomeController@add_do');
Route::any('/city','index\HomeController@city');

//收获地址
Route::any('/add_list','index\AddressController@add_list');
Route::any('/city','index\AddressController@city');
Route::any('/add_do','index\AddressController@add_do');
Route::any('/del','index\AddressController@del');
Route::any('/upd/{address_id}','index\AddressController@upd');
Route::any('/updAdd','index\AddressController@updAdd');






//---------------------------------------------------------后台
Route::any('/index', 'admin\IndexController@index');//首页
//---------------------------------------------------------rbac权限管理
//rbac权限管理
Route::prefix('/admin')->group(function(){
    Route::any('/power/create', 'admin\PowerController@create');//权限添加展示
    Route::any('/power/add', 'admin\PowerController@add');//权限添加执行
    Route::any('/power/list', 'admin\PowerController@list');//权限添加执行
    Route::any('/power/del', 'admin\PowerController@del');//权限软删除
    Route::any('/power/upd/{id}', 'admin\PowerController@upd');//权限修改展示
    Route::any('/power/updAdd', 'admin\PowerController@updAdd');//权限修改执行
});
//---------------------------------------------------------rbac角色管理
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
//---------------------------------------------------------rbac用户管理
Route::prefix('/admin')->group(function(){
    Route::any('/user/list', 'admin\UserController@list');//用户列表展示
    Route::any('/user/del', 'admin\UserController@del');//用户软删除
    Route::any('/user/content/{id}', 'admin\UserController@content');//给用户赋予角色
    Route::any('/user/contentAdd', 'admin\UserController@contentAdd');//给用户赋予角色执行
});
//---------------------------------------------------------友情链接
Route::prefix('/admin')->middleware('checklogin')->group(function(){
    Route::any('/friend/create', 'admin\FriendController@create');//友情添加展示
    Route::any('/friend/add', 'admin\FriendController@add');//友情添加执行
    Route::any('/friend/list', 'admin\FriendController@list');//友情添加展示
    Route::any('/friend/del', 'admin\FriendController@del');//友情软删除
    Route::any('/friend/upd/{id}', 'admin\FriendController@upd');//友情修改
    Route::any('/friend/updAdd', 'admin\FriendController@updAdd');//友情修改执行
});
//---------------------------------------------------------商品
//商品相册
Route::prefix('/admin')->middleware('checklogin')->group(function(){
    Route::any('/goods/uploades', 'admin\GoodsController@uploades');//商品相册上传页
    Route::any('/goods/uploadesadd', 'admin\GoodsController@uploadesadd');//商品相册上传
    Route::any('/goods/uploadeslist', 'admin\GoodsController@uploadeslist');//相册展示
    Route::any('/goods/uploadesdel', 'admin\GoodsController@uploadesdel');//相册删除
});
//---------------------------------------------------------
//分类
Route::prefix('/admin')->middleware('checklogin')->group(function(){
    Route::any('/cate', 'admin\CateController@index');//展示
    Route::any('/cateadd', 'admin\CateController@addshow');//添加页
    Route::any('/cateadds', 'admin\CateController@add');//添加
    Route::any('/del', 'admin\CateController@del');//删除
    Route::any('/cateupd/{id}', 'admin\CateController@cateupd');//修改页
    Route::any('/update', 'admin\CateController@update');//修改
    Route::any('/updateshow', 'admin\CateController@updateshow');//即点即改
});
//---------------------------------------------------------品牌
Route::prefix('/admin')->middleware('checklogin')->group(function(){
    Route::any('/brand', 'admin\BrandController@index');//展示
    Route::any('/brandadd', 'admin\BrandController@addshow');//添加页
    Route::any('/brandadds', 'admin\BrandController@add');//添加
    Route::any('/branddel', 'admin\BrandController@del');//删除
    Route::any('/brandupd/{id}', 'admin\BrandController@cateupd');//修改页
    Route::any('/brandupdate', 'admin\BrandController@update');//修改
    Route::any('/updateshow', 'admin\BrandController@updateshow');//即点即改
});
//---------------------------------------------------------配送方式
Route::prefix('/admin')->middleware('checklogin')->group(function(){
    Route::any('/mode', 'admin\ModeController@index');//展示
    Route::any('/modeadd', 'admin\ModeController@addshow');//添加页
    Route::any('/modeadds', 'admin\ModeController@add');//添加
    Route::any('/modedel', 'admin\ModeController@del');//删除
    Route::any('/modeupd/{id}', 'admin\ModeController@cateupd');//修改页
    Route::any('/modeupdate', 'admin\ModeController@update');//修改
});

//---------------------------------------------------------导航
Route::prefix('/nav')->middleware('checklogin')->group(function(){
  Route::any('nav_tjq','a_1\demo_a2_contr@nav_tjq'); 
  Route::any('nav_tje','a_1\demo_a2_contr@nav_tje'); 
  Route::any('nav_zse','a_1\demo_a2_contr@nav_zse');
  Route::any('nav_qx','a_1\demo_a2_contr@nav_qx');
  Route::any('nav_jd','a_1\demo_a2_contr@nav_jd');
  Route::any('nav_jd_s','a_1\demo_a2_contr@nav_jd_s');
  Route::any('nav_sce','a_1\demo_a2_contr@nav_sce');
  Route::any('nav_xgq','a_1\demo_a2_contr@nav_xgq'); 
  Route::any('nav_xge','a_1\demo_a2_contr@nav_xge');   
});
//---------------------------------------------------------资讯
Route::prefix('/service')->middleware('checklogin')->group(function(){
  Route::any('service_tjq','a_1\demo_a2_contr@service_tjq'); 
  Route::any('service_tje','a_1\demo_a2_contr@service_tje'); 
  Route::any('service_zse','a_1\demo_a2_contr@service_zse');
  Route::any('service_qx','a_1\demo_a2_contr@service_qx');
  Route::any('service_jd','a_1\demo_a2_contr@service_jd');
  Route::any('service_jd_s','a_1\demo_a2_contr@service_jd_s');  
  Route::any('service_sce','a_1\demo_a2_contr@service_sce');
  Route::any('service_xgq','a_1\demo_a2_contr@service_xgq'); 
  Route::any('service_xge','a_1\demo_a2_contr@service_xge');   
});
//---------------------------------------------------------轮播图
Route::prefix('/slide')->middleware('checklogin')->group(function(){
  Route::any('slide_tjq','a_1\demo_a2_contr@slide_tjq'); 
  Route::any('slide_wje','a_1\demo_a2_contr@slide_wje');
  Route::any('slide_tje','a_1\demo_a2_contr@slide_tje'); 
  Route::any('slide_zse','a_1\demo_a2_contr@slide_zse');
  Route::any('slide_qx','a_1\demo_a2_contr@slide_qx');
  Route::any('slide_jd','a_1\demo_a2_contr@slide_jd');
  Route::any('slide_jd_s','a_1\demo_a2_contr@slide_jd_s');   
  Route::any('slide_sce','a_1\demo_a2_contr@slide_sce');
  Route::any('slide_xgq','a_1\demo_a2_contr@slide_xgq'); 
  Route::any('slide_xge','a_1\demo_a2_contr@slide_xge');   
});
//---------------------------------------------------------sku属性
Route::prefix('/sku_name')->middleware('checklogin')->group(function(){
  Route::any('sku_name_tjq','a_1\demo_a2_contr@sku_name_tjq'); 
  Route::any('sku_name_tje','a_1\demo_a2_contr@sku_name_tje'); 
  Route::any('sku_name_zse','a_1\demo_a2_contr@sku_name_zse'); 
  Route::any('sku_name_qx','a_1\demo_a2_contr@sku_name_qx');
  Route::any('sku_name_jd_s','a_1\demo_a2_contr@sku_name_jd_s');    
  Route::any('sku_name_sce','a_1\demo_a2_contr@sku_name_sce');
});
//---------------------------------------------------------sku属性值
Route::prefix('/sku_val')->middleware('checklogin')->group(function(){
  Route::any('sku_val_tjq','a_1\demo_a2_contr@sku_val_tjq'); 
  Route::any('sku_val_tje','a_1\demo_a2_contr@sku_val_tje'); 
  Route::any('sku_val_zse','a_1\demo_a2_contr@sku_val_zse'); 
  Route::any('sku_val_qx','a_1\demo_a2_contr@sku_val_qx');
  Route::any('sku_val_jd_s','a_1\demo_a2_contr@sku_val_jd_s');   
  Route::any('sku_val_sce','a_1\demo_a2_contr@sku_val_sce');   
});
//---------------------------------------------------------
//注册登录页面
Route::any('/admin/login/reg','admin\LoginController@reg'); //注册展示
Route::any('/admin/login/login','admin\LoginController@login'); //登录展示
Route::any('/admin/login/regAdd','admin\LoginController@regAdd'); //注册执行
Route::any('/admin/login/login_del','admin\LoginController@login_del'); //退出
Route::any('/admin/login/loginAdd','admin\LoginController@loginAdd'); //登录执行
//---------------------------------------------------------
Route::any('/admin/login/home/{id}','admin\LoginController@home'); //登录详情信息
Route::any('/admin/login/homeAdd','admin\LoginController@homeAdd'); //登录详情信息执行
//---------------------------------------------------------
//商品
Route::prefix('/admin')->middleware('checklogin')->group(function(){
    Route::any('/goods/create', 'admin\GoodsController@create');//商品展示
    Route::any('/goods/brand_list', 'admin\GoodsController@brand_list');//商品分类下的品牌展示
    Route::any('/goods/add', 'admin\GoodsController@add');//商品执行
    Route::any('/goods/list', 'admin\GoodsController@list');//商品展示
    Route::any('/goods/del', 'admin\GoodsController@del');//商品软删除
    Route::any('/goods/upd/{id}', 'admin\GoodsController@upd');//商品软删除
    Route::any('/goods/updAdd/{id}', 'admin\GoodsController@updAdd');//修改执行
    Route::get('/goods/ajaxshow', 'admin\GoodsController@ajaxshow');//商品是否展示极点技改
    Route::get('/goods/ajaxname', 'admin\GoodsController@ajaxname');//商品是库存极点技改
    Route::get('/goods/ajaxprice', 'admin\GoodsController@ajaxprice');//商品是价格极点技改
});
//---------------------------------------------------------
//sku关联字段
Route::prefix('/admin')->group(function(){
    Route::any('/skug/sku', 'admin\SkuController@sku');//商品属性展示
    Route::any('/skug/skuAdd', 'admin\SkuController@skuAdd');//商品属性执行
    Route::any('/skug/list', 'admin\SkuController@list');//商品属性展示
    Route::any('/skug/del', 'admin\SkuController@del');//商品属性软删
    Route::any('/skug/upd/{id}', 'admin\SkuController@upd');//商品属性修改展示
    Route::any('/skug/updAdd', 'admin\SkuController@updAdd');//商品属性修改执行
});
//---------------------------------------------------------
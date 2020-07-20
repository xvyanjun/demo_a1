<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 后台首页
     */
    public function index(){
        return view('admin.goods');
    }

    public function addshow(){
        return view('admin.goodsadd');
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //用户添加
    public function create(Request $request){
        return view('admin.user.create');
    }
}

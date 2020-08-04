<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shop_fan extends Model
{
    //表名
    protected $table = 'shop_fan';
    //自增主键
    protected $primaryKey = 'f_id';
    //是否默认增加添加时间与修改时间
    public $timestamps = false;
    //黑名单
    protected $guarded = [];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shop_property extends Model
{
//表名
    protected $table = 'shop_property';
    //自增主键
    protected $primaryKey = 'id';
    //是否默认增加添加时间与修改时间
    public $timestamps = false;
    //白名单
    //protected $fillable = ['name'];
    //黑名单
    protected $guarded = [];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shop_uneed extends Model
{
    //表名
    protected $table = 'shop_uneed';
    //自增主键
    protected $primaryKey = 'y_id';
    //是否默认增加添加时间与修改时间
    public $timestamps = false;
    //白名单
    //protected $fillable = ['name'];
    //黑名单
    protected $guarded = [];
}

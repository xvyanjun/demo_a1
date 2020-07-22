<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shop_sku_name extends Model
{
 //表名
    protected $table = 'shop_sku_name';
    //自增主键
    protected $primaryKey = 'attr_id';
    //是否默认增加添加时间与修改时间
    public $timestamps = false;
    //白名单
    //protected $fillable = ['name'];
    //黑名单
    protected $guarded = [];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shop_order_details extends Model
{
    //表名
    protected $table = 'shop_order_details';
    //自增主键
    protected $primaryKey = 'order_goods_id';
    //是否默认增加添加时间与修改时间
    public $timestamps = false;
    
    protected $guarded = [];
}

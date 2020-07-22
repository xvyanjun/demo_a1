<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table="shop_goods";
    protected $primaryKey="goods_id";
    //去掉修改的默认时间
    public $timestamps=false;
    //删除的没名单
    protected $guarded=[];
}

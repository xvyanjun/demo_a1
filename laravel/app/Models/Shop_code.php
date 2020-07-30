<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop_code extends Model
{
    protected $table="shop_code";
    protected $primaryKey="c_id";
    //去掉修改的默认时间
    public $timestamps=false;
    //删除的没名单
    protected $guarded=[];
}

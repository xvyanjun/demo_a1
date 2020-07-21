<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PowerRole extends Model
{
    protected $table="role_power";
    protected $primaryKey="id";
    //去掉修改的默认时间
    public $timestamps=false;
    //删除的没名单
    protected $guarded=[];
}

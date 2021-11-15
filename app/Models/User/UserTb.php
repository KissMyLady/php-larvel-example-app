<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


//自动创建命令: php artisan make:model User/UserTB
//手动: 复制粘贴
class UserTb extends Model
{
    use HasFactory;

    //定义关联的表
    protected $table = "tb_user";
    //主键(可选)
    protected $primaryKey = "id";
    //定义禁止操作时间
    public $timestamps = false;

    //设置允许写入的字段
    protected $fillable = ["id", "name", "age", "email"];

    //guarded 排除字段, *

}

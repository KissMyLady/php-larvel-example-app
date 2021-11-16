<?php

namespace App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


//映射数据库创建
class UserRef extends Model {

    use HasFactory;

    protected $table = "table_users";
    protected $primaryKey = "id";
    public $timestamps = true;

    //设置允许写入的字段
    protected $fillable = ["title", "slug", "body", "image", "user_id"];



}

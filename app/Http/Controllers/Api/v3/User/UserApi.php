<?php

namespace App\Http\Controllers\Api\v3\User;
use \App\Http\Controllers\Api\v3\ApiController;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;


class UserApi extends ApiController{

    //测试
    public function test1(){
        //echo "Hello Php";
        return $this->ok("成功");
    }

    //查循id大于2并且年龄小于21的数据
    public function queryWhere(){
        $db = DB::table("tb_user");
        $result = $db -> where("id", ">", 2)
            -> where("age", "<", 19)  //并
            -> get();
        //dd($result);
        return $this -> ok($result);
    }

    //取出单个数据
    public function queryFirst(){
        $db = DB::table("tb_user");
        $result = $db
            -> where("id", ">", 2)
            -> first();
        return $this -> ok($result);
        //dd($result);
    }

    //取出某个具体的值
    //返回: 阿紫
    public function querySomeOne(){
        $db = DB::table("tb_user");
        $result = $db
            -> where("id", "=", 11)
            -> value("name");
        return $this -> ok($result);
        //dd($result);
    }

    //获取某些字段数据(返回多个)
    public function querySomeOneRow(){
        $db = DB::table("tb_user");
        $result = $db
            -> select("id", "name as user_name", "email")
            -> get();
        return $this -> ok($result);
        //dd($result);
    }

    //排序
    public function orderBy(){
        $db = DB::table("tb_user");
        $result = $db
            -> select("id", "name as user_name", "age", "email")
            -> orderBy("age", "desc")
            -> get();
        return $this -> ok($result);
        //dd($result);
    }

    //分页
    public function pagination(){
        $db = DB::table("tb_user");
        $result = $db
            -> limit(3)    //pageSize
            -> offset(2)   //page
            -> get();
        dd($result);
    }

    //直接执行SQL语句
    //执行任意的 insert update delete语句[影响记录语句]
    public function queryBySQL_1(){
        try {
            $db = DB::statement("insert into tb_user value (22, '光之君', 28, '21321321')");
            return $this -> ok("插入成功");
        }catch (\Exception $e){
            return $this -> error("插入失败");
        }
        //dd();
    }

    //执行任意的 select 语句[不影响记录]
    public function queryBySQL_2(){
        try {
            $res = DB::select("select * from tb_user");
            return $this -> ok($res, "查询成功");
        }catch (\Exception $e){
            return $this -> error("失败");
        }
    }
}

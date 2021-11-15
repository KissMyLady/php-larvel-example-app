<?php

namespace App\Http\Controllers\Api\v3\User;
use Illuminate\Support\Facades\DB;
use App\Models\User\UserTb;
use Illuminate\Http\Request;


class UserModelCtrl{

    //删除
    public function model_delete_1(){
        $user_1 = UserTb::where("id", "=", "1") -> first();

        //删除
        dd($user_1 -> delete() ? "ok": "fail");
    }

    //修改数据
    public function model_chang_1(){
        $user_1 = UserTb::where("id", "=", "1") -> first();

        //修改
        $user_1 -> name = "紫式部";
        $user_1 -> age = "1312";
        dd($user_1 -> save() ? "ok": "fail");
    }

    //查询多行并指定数据
    //UserTb::all()
    //UserTb::all(['id', 'name', 'age', 'email']) //all不支持连续查询
    //相当于get方法

    //按条件查询多个字段
    public function model_query_3(){
        $user_1 = UserTb::where("id", ">", "11") -> get(["id", "name"]);    //数组
        $user_2 = UserTb::where("id", ">", "11") -> select("id", "name");   //字符串选列
        $user_3 = UserTb::where("id", ">", "11") -> select(["id", "name"]); //字符串选列
        dd($user_3);
    }

    //获取指定主键的一条数据
    public function model_query_1(){
        $user = UserTb::find(11) -> toArray();
        dd($user);
    }

    //获取指定条件的第一条数据 -> get() -> toArray()
    public function model_query_2(){
        $user = UserTb::where("id",">","15") -> first();
        dd("查询成功 $$user");
    }

    //增加数据
    //对象传递 限制类型
    public function modelAddUser_2(Request $request){
        $user = new UserTb();
        $result = $user -> save($request -> all());
        dd("保存成功 2 $result");
    }

    //增加数据
    //AR模式, 实例化模型
    public function modelAddUser(){
        $user = new UserTb();
        $user -> name = "张麻子";
        $user -> age = "32";
        $user -> email = "1233121";  # 不建议使用, 有更高级的
        $user -> save();
        dd("保存成功");
    }


    //直接静态使用, 像DB调用
    public function directUse(){
        $res = UserTb::get();
        dd($res);
    }

    //实例化使用
    public function newModel(){
        $user = new UserTb();
        $user -> get();
        dd($user);
    }


}

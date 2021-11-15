<?php

namespace App\Http\Controllers\Api\v3\User;
use Illuminate\Support\Facades\DB;
use App\Models\User\UserTb;


class UserModelCtrl{

    //增加数据
    //AR模式, 实例化模型
    public function modelAddUser(){
        $user = new UserTb();
        $user -> name = "张麻子";
        $user -> age = "32";
        $user -> email = "1233121";
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

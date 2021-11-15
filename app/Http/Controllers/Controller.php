<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request; //命名空间的三元素, 常量, 方法, 类
use Symfony\Component\Console\Input\Input;
//引入DF门面, 可以省略路径
use Illuminate\Support\Facades\DB;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    //测试
    public function test1(){
        phpinfo();
    }

    //测试2 参数获取
    public function test2(){
        //获取值, 默认10086
        echo Input::get("id", "10086") ."\r\n";;

        //获取全部的值,(数组形式返回)
        $all = Input::all();

        //获取 Input::get('name');
        //    Input::get(['id', 'name']);
        //获取除了xx之外的值: Input::get(['name']);
        //是否存在          Input::has('gender');
    }

}

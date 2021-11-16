<?php

use App\Http\Controllers\Api\v3\User\UserApi;
use App\Http\Controllers\Api\v3\User\UserModelCtrl;
use App\Http\Controllers\UserQuery;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Controller;
Route::get('/home/test/test1', [Controller::class, "test1"]);


use App\Http\Controllers\UserCtrl;
Route::get('/home/user/userAdd',      [UserCtrl::class, "userAdd"]);    //增
Route::get('/home/user/userUpdate',   [UserCtrl::class, "userUpdate"]); //改
Route::get('/home/user/usesGet',      [UserCtrl::class, "usesGet"]);    //查
Route::get('/home/user/usesWhereGet', [UserCtrl::class, "usesWhereGet"]);  //查询id大于3
Route::get('/home/user/userDel',      [UserCtrl::class, "userDel"]);       //真删
Route::get('/home/user/userDelFake',  [UserCtrl::class, "userDelFake"]);   //假删

## 其他查询
/**
 * -> where() -> where() -> where() ... 并且关系
 * -> where() -> orWhere() -> orWhere() ....  或者关系
 */

## 分页查询
Route::get('/home/user/pageGetUSer',  [UserQuery::class, "pageGetUSer"]);   //假删


## 查询类
Route::prefix("v3")->namespace("v3")
    -> group(function (){
        Route::get("test1",        [UserApi::class, "test1"]);
        Route::get("queryWhere",   [UserApi::class, "queryWhere"]);    //查循id大于2并且年龄小于21的数据
        Route::get("queryFirst",   [UserApi::class, "queryFirst"]);    //取出单个数据
        Route::get("querySomeOne", [UserApi::class, "querySomeOne"]);  //取出字段具体的值
        Route::get("querySomeOneRow", [UserApi::class, "querySomeOneRow"]);  //获取某些字段数据(多个)
        Route::get("orderBy",      [UserApi::class, "orderBy"]);     //排序
        Route::get("pagination",   [UserApi::class, "pagination"]);  //分页
        Route::get("queryBySQL_1", [UserApi::class, "queryBySQL_1"]);  //sql查询
        Route::get("queryBySQL_2", [UserApi::class, "queryBySQL_2"]);  //sql查询

        ## 模型类 directUse
        Route::get("directUse",    [UserModelCtrl::class, "directUse"]); //静态查询
        Route::get("newModel",     [UserModelCtrl::class, "newModel"]);  //new对象查询
        Route::get("modelAddUser", [UserModelCtrl::class, "modelAddUser"]);
        Route::get("modelAddUser_2", [UserModelCtrl::class, "modelAddUser_2"]);
        Route::get("model_query_1", [UserModelCtrl::class, "model_query_1"]);
        Route::get("model_query_2", [UserModelCtrl::class, "model_query_2"]);
        Route::get("model_query_3", [UserModelCtrl::class, "model_query_3"]);

        //修改数据
        Route::get("model_chang_1",  [UserModelCtrl::class, "model_chang_1"]);
        Route::get("model_delete_1", [UserModelCtrl::class, "model_delete_1"]);

        //关联查询


    });


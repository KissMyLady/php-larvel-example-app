<?php

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

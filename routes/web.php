<?php

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
Route::get('/home/user/userGet', [UserCtrl::class, "userGet"]);
Route::get('/home/user/userAdd', [UserCtrl::class, "userAdd"]);
Route::get('/home/user/userDel', [UserCtrl::class, "userDel"]);

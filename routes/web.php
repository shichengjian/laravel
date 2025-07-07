<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\DbController;
use App\Http\Controllers\LoginController;
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

/**
 * 1、自定义路由
 */

// {id?}|{id} 可选参数和必选参数 (也可通过用户端[？id='']方式传递参数)
Route::get('user/{id?}', function($id = "jon"){
    echo "This is user page!".$id;
});
Route::get('people/{id}', function($id){
    echo "This is people page!".$id;
}); 
//定义路由别名  ->name()  ，则使用route('别名')方法可以获取完整路由地址。
Route::get('people1/sss', function(){
    echo "12";
})->name('student');
//路由群组，对相同前缀url进行封装 ['prefix'=>'admin']
Route::group(['prefix'=>'admin'],function(){
    Route::get('user/{id?}', function($id = "jon"){
        echo "This is user page!".$id;
    });
    Route::get('people/{id}', function($id){
        echo "This is people page!".$id;
    });
});

/**
 * 2、控制器路由[新版php风格写法]
 */
Route::get('Db', [DbController::class,'index']);
Route::get('admin/admin/index', [AdminController::class,'index']);
Route::group(['prefix'=>'db'],function(){
    Route::get('add',[AdminController::class,'add']);
    Route::get('del',[AdminController::class,'del']);
    Route::get('exit',[AdminController::class,'exit']);
    Route::get('show',[AdminController::class,'show']);
    Route::get('modelShow',[AdminController::class,'modelShow']);


    Route::get('user',[AdminController::class,'view']);
});

Route::any('home/login/show',[LoginController::class,'show']);
Route::post('admin/admin/modelAdd',[AdminController::class,'modelAdd']);
Route::post('admin/admin/store',[AdminController::class,'store']);

Route::get('admin/admin/showajax',[AdminController::class,'showajax']);
Route::get('admin/admin/ajax',[AdminController::class,'ajax']);

Route::get('Db/findArticles',[DbController::class,'findArticles']);
/**
 * 3、视图路由[新版php风格写法]
 */
Route::view('home/user','home.user');


/**    
 * csrf验证[跨域攻击]
 */
Route::group(['prefix'=>'login'],function(){
    Route::get('show',[LoginController::class,'show']);
    Route::post('csrf',[LoginController::class,'csrf_verify']);
});
<?php

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

// Route::請求方式('請求的url',匿名函數或控制響應的方法)

// 根路由 
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    echo '當前訪問的地址是/home';
});

// any語法
Route::any('/anyTest', function () {
    echo '當前訪問的地址是/anyTest';
});

// match語法
Route::match(['get','post'],'/matchTest', function () {
    echo '當前訪問的地址是/matchTest';
});

// 必選參數
Route::any('/anyTest2/{id}', function ($id) {
    echo '當前訪問的地址是/anyTest2 , 當前用戶的id是 ' .$id;
});

// 可選參數
Route::any('/anyTest3/{id?}', function ($id='') {
    echo '當前訪問的地址是/anyTest3 , 當前用戶的id是 ' .$id;
});

// 通過?形式傳遞get參數
Route::any('/anyTest4', function () {
    echo '當前訪問的地址是/anyTest4  ' .$_GET['id'];
});

// 路由別名
Route::any('/anyTest5', function () {
    echo '當前訪問的地址是/anyTest5  ' .$_GET['id'];
}) -> name('ives');

// 路由群組
Route::group(['prefix' => 'admin'], function () {
    Route::get('test1', function () {
        echo '當前訪問的地址是/admin/test1';
    });

    Route::get('test2', function () {
        echo '當前訪問的地址是/admin/test2';
    });

    Route::get('test3', function () {
        echo '當前訪問的地址是/admin/test3';
    });
});

// 控制器路由寫法
Route::get('/home/test/test1', 'TestController@test1');

// 分目錄管理
Route::get('/home/index/index', 'Home\IndexController@index');
Route::get('/admin/index/index', 'Admin\IndexController@index');

// 增加測試路由
Route::get('/home/test/test2', 'TestController@test2');

// DB門面的增刪改查
Route::group(['prefix' => 'home/test'],function(){
    Route::get('add', 'TestController@add');
    Route::get('del', 'TestController@del');
    Route::get('update', 'TestController@update');
    Route::get('select', 'TestController@select');
});

// view測試
Route::get('/home/viewtest', 'TestController@viewtest');

// foreach測試
Route::get('/home/foreachtest', 'TestController@foreachtest');
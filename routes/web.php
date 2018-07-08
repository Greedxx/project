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
    Route::group([],function(){
        // 后台首页
        Route::any('/admin/index','admin\IndexController@index');
        
        // 后台 订单模块
        Route::resource('/admin/orders','admin\OrdersController');

        // 后台 物流模块
        Route::resource('/admin/wuliu','admin\WuliuController');

        // 后台 物流发货模块
        Route::any('/admin/wuliulist','admin\WuliuListController@index');

        Route::post('/admin/wuliulist/fahuo','admin\WuliuListController@fahuo');
    });
 
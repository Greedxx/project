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
*/  Route::group([],function(){
        //前台首页
        Route::any('/','home\IndexController@index');

        //列表页
        Route::any('/list/{id?}','home\GoodsListController@index');

        //详情页
        Route::any('/good/{id}','home\GoodsInfoController@index');

        //服务帮助页及其他
        Route::any('/service/{id}','home\ServiceController@index');

    });

    //购物车
    // Route::any('/good','home\CartController@index');
    
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
        Route::post('/admin/wuliulist/status/','admin\WuliuListController@status');

        Route::resource('admin/message','admin\MessageController');

        
        //分类管理
        Route::resource('/admin/cate','admin\CateController');

        //添加子分类传参
        Route::get('/admin/cate/{id}/create','admin\CateController@add' );

        //商品管理
        Route::resource('/admin/goods','admin\GoodsController');

        //文章管理
        Route::resource('/admin/content','admin\ContentController');

        //图片组信息管理
        Route::resource('/admin/goodsimg/{gid}/guan','admin\GoodsImgController');

        //ajax goods - status 上下架
        Route::any('/admin/ajaxtao/gstatus','admin\AjaxtaoController@gstatus');

        //ajax gpic - 图片开关
        Route::any('/admin/ajaxtao/gpicstatus','admin\AjaxtaoController@gpicstatus');

    });
 
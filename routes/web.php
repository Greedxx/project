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
        //前台首页
        Route::any('/','home\IndexController@index');

        //列表页
        Route::any('/list/{id?}','home\GoodsListController@index');

        //详情页
        Route::any('/good/{id}','home\GoodsInfoController@index');

        //服务帮助页及其他
        Route::any('/service/{id}','home\ServiceController@index');

    });


    //前台
    Route::group([],function(){
        //用户中心
        Route::any('home/user','home\UserController@index');
        //收货地址
        Route::resource('home/receive','home\ReceiveController');
        //用户信息修改
        Route::resource('home/users','home\UsersController');
        //密码修改
        Route::any('home/xiu','home\PassController@xiu');
        Route::any('home/gai','home\PassController@gai');
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

        // 后台 商品评论模块
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



        //用户管理
        Route::resource('/admin/user','admin\UserController');

        //管理员
        Route::resource('/admin/admin','admin\AdminController');
        //
        Route::resource('admin/admin','admin\AdminController');
        //退出
       Route::any('/admin/logout','admin\LoginController@logout');
       //修改密码
        Route::any('/admin/xian','admin\PassController@xian');
        Route::any('/admin/gai','admin\PassController@gai');
        //登陆
        Route::any('admin/login','Admin\LoginController@login');


          //广告管理
        Route::resource('admin/ad','admin\AdController');
        //links 友情链接
        Route::resource('admin/links','admin\LinksController');
        //轮播管理
        Route::resource('admin/lunbo','admin\LunboController');

    });

      //点击修改
    Route::any('admin/ajaxuser','admin\Admincontroller@ajaxuser');

    //点击修改
    Route::any('admin/ajaxkai','admin\Admincontroller@ajaxkai');
   
    Route::any('admin/dologin','Admin\LoginController@dologin'); 
    //验证码
    Route::get('admin/captcha/','admin\LoginController@captcha');

    //前台注册
    Route::any('/home/zhuce','home\ZhuceController@index');
    Route::any('/home/dozhuce','home\ZhuceController@dozhuce');
    //前台登录
    Route::any('/home/login','home\LoginController@login');
    Route::any('/home/dologin','home\LoginController@dologin');
    //前台退出
    Route::any('home/lologin','home\LoginController@lologin');
    //验证码
    Route::get('home/captcha/','home\ZhuceController@captcha');


    
 
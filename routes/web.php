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

/*Route::get('/', function () {
    return view('welcome');
});*/


//Route::get('/', 'WelcomeController@index');
Route::get('/', ['as'=>'page.home.index','uses'=>'Home\HomeController@index']);

/*end home*/
Route::get('admin','Admin\IndexController@index');

Route::group(['prefix' => 'admin'], function () {
    Route::get('logout',['as'=>'admin.getLogout','uses'=>'Auth\LoginController@getLogout']);
    Route::get('login',['as'=>'admin.getLogin','uses'=>'Auth\LoginController@getLogin']);
    Route::post('login',['as'=>'admin.postLogin','uses'=>'Auth\LoginController@postLogin']);

});
Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {

    Route::group(['prefix' => 'pdt'], function () {
        Route::get('list',['as'=>'admin.pdt.getList','uses'=>'Admin\ProductController@getList']);
        Route::get('add',['as'=>'admin.pdt.getAdd','uses'=>'Admin\ProductController@getAdd']);
        Route::post('add',['as'=>'admin.pdt.postAdd','uses'=>'Admin\ProductController@postAdd']);
        Route::get('edit/{id}',['as'=>'admin.pdt.getEdit','uses'=>'Admin\ProductController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.pdt.postEdit','uses'=>'Admin\ProductController@postEdit']);
        Route::post('DelImg',['as'=>'admin.pdt.getDelImg','uses'=>'Admin\ProductController@getDelImg']);
        Route::post('UpdateItem',['as'=>'admin.pdt.postUpdateItem','uses'=>'Admin\ProductController@postUpdateItem']);
        Route::post('delItem',['as'=>'admin.pdt.DelItem','uses'=>'Admin\ProductController@DelItem']);
    });
    Route::group(['prefix' => 'cte'], function () {
        Route::get('list',['as'=>'admin.cte.getList','uses'=>'Admin\CateController@getList']);
        Route::get('add',['as'=>'admin.cte.getAdd','uses'=>'Admin\CateController@getAdd']);
        Route::post('add',['as'=>'admin.cte.postAdd','uses'=>'Admin\CateController@postAdd']);
        Route::get('edit/{id}',['as'=>'admin.cte.getEdit','uses'=>'Admin\CateController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.cte.postEdit','uses'=>'Admin\CateController@postEdit']);
        Route::post('delItem',['as'=>'admin.cte.postDelItem','uses'=>'Admin\CateController@postDelItem']);
        Route::post('updateItem',['as'=>'admin.cte.postUpdateItem','uses'=>'Admin\CateController@postUpdateItem']);
        Route::post('updateOrder',['as'=>'admin.cte.upOrder','uses'=>'Admin\CateController@upOrder']);
    });
    Route::group(['prefix' => 'pst'], function () {
        Route::get('list',['as'=>'admin.pst.getList','uses'=>'Admin\PostController@getList']);
        Route::get('add',['as'=>'admin.pst.getAdd','uses'=>'Admin\PostController@getAdd']);
        Route::post('add',['as'=>'admin.pst.postAdd','uses'=>'Admin\PostController@postAdd']);
        Route::get('edit/{id}',['as'=>'admin.pst.getEdit','uses'=>'Admin\PostController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.pst.postEdit','uses'=>'Admin\PostController@postEdit']);
        Route::post('DelImg',['as'=>'admin.pst.getDelImg','uses'=>'Admin\PostController@getDelImg']);
        Route::post('UpdateItem',['as'=>'admin.pst.postUpdateItem','uses'=>'Admin\PostController@postUpdateItem']);
        Route::post('delItem',['as'=>'admin.pst.DelItem','uses'=>'Admin\PostController@DelItem']);
    });

    Route::group(['prefix' => 'adm'], function () {
        Route::get('list',['as'=>'admin.adm.getList','uses'=>'Admin\AdminController@getList']);
        Route::get('add',['as'=>'admin.adm.getAdd','uses'=>'Admin\AdminController@getAdd']);
        Route::post('add',['as'=>'admin.adm.postAdd','uses'=>'Admin\AdminController@postAdd']);
        Route::get('edit/{id}',['as'=>'admin.adm.getEdit','uses'=>'Admin\AdminController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.adm.postEdit','uses'=>'Admin\AdminController@postEdit']);
        Route::post('UpdateItem',['as'=>'admin.adm.postUpdateItem','uses'=>'Admin\AdminController@postUpdateItem']);
        Route::post('delItem',['as'=>'admin.adm.DelItem','uses'=>'Admin\AdminController@DelItem']);
    });

    Route::group(['prefix' => 'usr'], function () {
        Route::get('list',['as'=>'admin.usr.getList','uses'=>'Admin\UserController@getList']);
        Route::get('add',['as'=>'admin.usr.getAdd','uses'=>'Admin\UserController@getAdd']);
        Route::post('add',['as'=>'admin.usr.postAdd','uses'=>'Admin\UserController@postAdd']);
        Route::get('edit/{id}',['as'=>'admin.usr.getEdit','uses'=>'Admin\UserController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.usr.postEdit','uses'=>'Admin\UserController@postEdit']);
        Route::post('UpdateItem',['as'=>'admin.usr.postUpdateItem','uses'=>'Admin\UserController@postUpdateItem']);
        Route::post('delItem',['as'=>'admin.usr.DelItem','uses'=>'Admin\UserController@DelItem']);
    });

    Route::group(['prefix' => 'banner'], function () {
        Route::get('list',['as'=>'admin.banner.getList','uses'=>'Admin\BannerController@getList']);
        Route::get('add',['as'=>'admin.banner.getAdd','uses'=>'Admin\BannerController@getAdd']);
        Route::post('add',['as'=>'admin.banner.postAdd','uses'=>'Admin\BannerController@postAdd']);
        Route::get('edit/{id}',['as'=>'admin.banner.getEdit','uses'=>'Admin\BannerController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.banner.postEdit','uses'=>'Admin\BannerController@postEdit']);
        Route::post('DelImg',['as'=>'admin.banner.getDelImg','uses'=>'Admin\BannerController@getDelImg']);
        Route::post('UpdateItem',['as'=>'admin.banner.postUpdateItem','uses'=>'Admin\BannerController@postUpdateItem']);
        Route::post('delItem',['as'=>'admin.banner.DelItem','uses'=>'Admin\BannerController@DelItem']);
    });
    Route::group(['prefix' => 'stp'], function () {
        Route::get('info',['as'=>'admin.stp.getInfo','uses'=>'Admin\SetupController@getInfo']);
        Route::post('info',['as'=>'admin.stp.postInfo','uses'=>'Admin\SetupController@postInfo']);
    });
});

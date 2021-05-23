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

Route::get('/', 'HomeController@index')->name("home");

Route::get('select/admin', 'MainController@admin')->name("main.admin"); //Seleccion la emprea
Route::get('select/mediaroom', 'MainController@mediaroom')->name("main.mediaroom"); //Seleccion la emprea

//Rutas para el modulo OnLine
Route::group(['middleware' => 'cors', 'prefix' => 'mediaroom'], function () {

    Auth::routes();

    Route::get('/', 'MainController@loadmediaroom')->name("mediaroom.load");
    Route::get('home', ['as' => 'mediaroom.home', 'uses' => 'MediaRoom\HomeController@index']);

    Route::group(['prefix' => 'configuration'], function () {
        Route::get('user/perfil', 'MediaRoom\Configuration\UserController@miperfil')->name("mediaroom.miperfil");
        Route::put('user/{id}/perfil', 'MediaRoom\Configuration\UserController@updateperfil')->name("mediaroom.updateperfil");

        Route::get('password', 'MediaRoom\Configuration\UserController@password')->name("mediaroom.password");
        Route::put('password', 'MediaRoom\Configuration\UserController@passwordupdate');
      
    });

});

Route::group(['middleware' => 'cors', 'prefix' => 'admin'], function () {

    Route::get('login', 'Admin\Auth\LoginController@showLoginForm');
    Route::post('login', 'Admin\Auth\LoginController@login')->name("admin.login");
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name("admin.logout");
    Route::get('/', 'MainController@loadadmin')->name("admin.load");
    Route::get('home', ['as' => 'admin.home', 'uses' => 'Admin\HomeController@index']);

});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

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

    Route::group(['middleware' => 'cors', 'prefix' => 'images'], function () {
        Route::get('/{idCategory?}', ['as' => 'mediaroom.images.index', 'uses' => 'MediaRoom\ImageController@index']);      
                 Route::get('/{idArea}/area', ['as' => 'mediaroom.images.area', 'uses' => 'MediaRoom\ImageController@area']);      

            Route::group(['middleware' => 'cors', 'prefix' => 'select'], function () {
                Route::get('areas', ['as' => 'mediaroom.images.select.areas', 'uses' => 'MediaRoom\ImageController@getAreas']);        
            });
    });

    Route::group(['middleware' => 'cors', 'prefix' => 'documents'], function () {        
        Route::get('/{idArea?}', ['as' => 'mediaroom.documents.index', 'uses' => 'MediaRoom\DocumentController@index']);            
            Route::group(['middleware' => 'cors', 'prefix' => 'select'], function () {                
                Route::get('areas', ['as' => 'mediaroom.documents.areas', 'uses' => 'MediaRoom\DocumentController@getDocuments']);
            });
    });

    Route::group(['middleware' => 'cors', 'prefix' => 'videos'], function () {        
        Route::get('/{idArea?}', ['as' => 'mediaroom.videos.index', 'uses' => 'MediaRoom\VideoController@index']);            
            Route::group(['middleware' => 'cors', 'prefix' => 'select'], function () {                
                Route::get('areas', ['as' => 'mediaroom.videos.areas', 'uses' => 'MediaRoom\VideoController@getVideos']);
            });
    });

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


    Route::group(['prefix' => 'catalogs'], function () {

        Route::group(['prefix' => 'categories'], function () {  
            Route::get('index', 'Admin\Configuration\CategoryController@index');          
            Route::post('store', 'Admin\Configuration\CategoryController@store');
            Route::put('update/{id}', 'Admin\Configuration\CategoryController@update');
            Route::delete('destroy/{id}', 'Admin\Configuration\CategoryController@destroy');            
        });

        Route::group(['prefix' => 'areas'], function () {   
            Route::get('{idCategory}/index ', 'Admin\Configuration\AreaController@index');                      
            Route::post('store', 'Admin\Configuration\AreaController@store');
            Route::put('update/{id}', 'Admin\Configuration\AreaController@update');
            Route::delete('destroy/{id}', 'Admin\Configuration\AreaController@destroy');            
            Route::group(['prefix' => 'areas'], function () {   
                Route::get('{idArea}/files ', 'Admin\Configuration\AreaController@files');          
            });
        });

    });


});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

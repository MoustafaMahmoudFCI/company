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

Route::group(['prefix' => LaravelLocalization::setLocale()] , function(){
    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

});

// Admin routes
Route::group(['prefix' => 'admin'] , function(){
    Route::get('/dashboard' , function(){
        return view('admin.dashboard');
    });

    Route::resources([
        'category' => 'CategoryController' ,
        'service' => 'ServiceController' ,
        'portoflio' => 'PortoflioController' ,
        'slider' => 'SliderController' ,
        'partner' => 'OurPartnerController' ,
        'testimonial' => 'TestimonialsController' ,
        'users' => 'UsersController' ,
    ]);

    Route::get('users/{id}/changeRole' , 'UsersController@changeRole')->name('users.changeRole');

    Route::get('setting' , 'SiteSettingController@index')->name('setting');
    Route::put('setting/update' , 'SiteSettingController@update')->name('setting.update');

});




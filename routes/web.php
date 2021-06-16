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
Auth::routes(['verify' => true]);

Route::get('/','LoginController@index')->name('login');
Route::post('/login','LoginController@login')->name('login.post');
Route::get('/logout','LoginController@logout')->name('login.logout');

Route::group(['prefix' => 'admin'], function (){
    Route::get('/','Admin\AdminController@index')->name('admin.index');
    Route::get('/create','Admin\AdminController@create')->name('admin.create');
    Route::post('/save','Admin\AdminController@save')->name('admin.save');
    Route::get('/{id}','Admin\AdminController@find')->name('admin.find');
    Route::post('/update','Admin\AdminController@update')->name('admin.update');
    Route::get('/delete/{id}','Admin\AdminController@delete')->name('admin.delete');

});

Route::group(['prefix' => 'user'], function () {
    Route::get('/','User\UserController@index')->name('user.index');

    Route::group(['prefix' => 'mail'], function () {
        Route::get('/','User\UserController@mail')->name('user.mail.index');
        Route::get('/send','User\UserController@send')->name('user.mail.send');
        Route::post('/save','User\UserController@save')->name('user.mail.save');
    });
});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('admin.logs');

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
//Auth::routes(['verify' => true]);

Route::get('/','LoginController@index')->name('login');
Route::post('/login','LoginController@index')->name('login.post');
Route::post('/logout','LoginController@logout')->name('login.logout');

Route::prefix('admin')->group(function () {
    Route::get('/','Admin\AdminController@index')->name('admin.index');
});

Route::prefix('user')->group(function () {

});

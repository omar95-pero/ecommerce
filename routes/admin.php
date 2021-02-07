<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::group(
    ['namespace' => 'Admin', 'middleware' => 'auth:admin'],
    function () {
        Route::get('/', 'DashboardController@index')->name('admin.dashboard');
        ######################Begin Languages Route##############
        Route::group(['prefix' => 'langs'], function () {
            Route::get('/', 'LanguagesController')->name('admin.languages');
        });
        ######################End Languages Route  ##############
    }
);
Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin'], function () {
    Route::get('/login', 'AdminController@getLogin');
    Route::post('/login', 'AdminController@login')->name('admin.login');
});

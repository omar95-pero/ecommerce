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

define('PAGINATION_COUNT', 20);
Route::group(
    ['namespace' => 'Admin', 'middleware' => 'auth:admin'],
    function () {
        Route::get('/', 'DashboardController@index')->name('admin.dashboard');
        ######################Begin Languages Route##############
        Route::group(['prefix' => 'langs'], function () {
            Route::get('/', 'LanguagesController@index')->name('admin.languages');
            Route::get('create', 'LanguagesController@create')->name('admin.languages.create');
            Route::post('store', 'LanguagesController@store')->name('admin.languages.store');
            Route::get('edit/{id}', 'LanguagesController@edit')->name('admin.languages.edit');
            Route::post('update/{id}', 'LanguagesController@update')->name('admin.languages.update');
            Route::get('delete/{id}', 'LanguagesController@destroy')->name('admin.languages.delete');
        });
        ######################End Languages Route  ##############
    }
);
Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin'], function () {
    Route::get('/login', 'AdminController@getLogin');
    Route::post('/login', 'AdminController@login')->name('admin.login');
});

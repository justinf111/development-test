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
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', 'App\Http\Controllers\LoginController@index');
    Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login');
    Route::post('/login', 'App\Http\Controllers\LoginController@store');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

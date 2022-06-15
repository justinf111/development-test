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

    Route::group(['prefix' => 'companies'], function() {
        Route::get('/', 'App\Http\Controllers\CompaniesController@index')->name('companies.index');
        Route::get('/create', 'App\Http\Controllers\CompaniesController@create')->name('companies.create');
        Route::post('/', 'App\Http\Controllers\CompaniesController@store')->name('companies.store');
        Route::get('/{company}/edit', 'App\Http\Controllers\CompaniesController@edit')->name('companies.edit');
        Route::put('/{company}', 'App\Http\Controllers\CompaniesController@update')->name('companies.update');
        Route::delete('/{company}', 'App\Http\Controllers\CompaniesController@destroy')->name('companies.delete');
    });

    Route::group(['prefix' => 'employees'], function() {
        Route::get('/', 'App\Http\Controllers\EmployeesController@index')->name('employees.index');
        Route::get('/create', 'App\Http\Controllers\EmployeesController@create')->name('employees.create');
        Route::post('/', 'App\Http\Controllers\EmployeesController@store')->name('employees.store');
        Route::get('/{employee}/edit', 'App\Http\Controllers\EmployeesController@edit')->name('employees.edit');
        Route::put('/{employee}', 'App\Http\Controllers\EmployeesController@update')->name('employees.update');
        Route::delete('/{employee}', 'App\Http\Controllers\EmployeesController@destroy')->name('employees.delete');
    });
});

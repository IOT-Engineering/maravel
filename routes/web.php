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

Route::group(['prefix' => 'admin'], function()
{
    Auth::routes();
});

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function()
{
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('users', 'UsersController');
    Route::resource('roles', 'RolesController');

    Route::put('rolepermissions/{id}', 'RolesController@updatePermissions');
    Route::patch('rolepermissions/{id}', 'RolesController@updatePermissions');
    Route::get('filter/rolepermissions/{view}', 'RolesController@searchRolePermissions');
    
    Route::group(['prefix' => 'config'], function()
    {
        Route::post('dashboard', 'HomeController@config');
        Route::post('dashboard/block', 'HomeController@addBlock');
        Route::delete('dashboard/block/{id}', 'HomeController@deleteBlock')->name('dashboard-delete-block');
        Route::put('dashboard/block/{id}', 'HomeController@updateBlock')->name('dashboard-update-block');
    });
});

Route::get('/', function ()
{
    return view('public/home');
});


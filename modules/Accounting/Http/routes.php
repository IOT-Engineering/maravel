<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin/cloudware-square/accounting', 'namespace' => 'Modules\Accounting\Http\Controllers'], function()
{
    //Route::get('/', 'AccountingController@index');
    Route::resource('invoices', 'InvoicesController');
    
});


Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin/cloudware-square/accounting/config', 'namespace' => 'Modules\Accounting\Http\Controllers'], function()
{
    //Route::get('/', 'ConfigController@index');
    
    Route::resource('categories', 'CategoriesController');
    Route::resource('taxes', 'TaxesController');
});
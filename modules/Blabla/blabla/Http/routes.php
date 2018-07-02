<?php

Route::group(['middleware' => 'web', 'prefix' => 'blabla/blabla', 'namespace' => 'Modules\Blabla/blabla\Http\Controllers'], function()
{
    Route::get('/', 'Blabla/blablaController@index');
});

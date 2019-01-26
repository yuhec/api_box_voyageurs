<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'Notifications@index');
Route::get('/{id}', 'Notifications@show');

Route::post('/', 'Notifications@create');

Route::put('/{id}', 'Notifications@update');

Route::delete('/{id}', 'Notifications@delete');

<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'ActivityTypes@index');
Route::get('/{id}', 'ActivityTypes@show');

Route::post('/', 'ActivityTypes@create');

Route::put('/{id}', 'ActivityTypes@update');

Route::delete('/{id}', 'ActivityTypes@delete');

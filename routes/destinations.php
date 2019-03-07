<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Destinations@index');
Route::get('/{id}', 'Destinations@show');

Route::post('/', 'Destinations@create');

Route::put('/{id}', 'Destinations@update');

Route::delete('/{id}', 'Destinations@delete');
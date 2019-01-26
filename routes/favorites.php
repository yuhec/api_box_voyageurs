<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'Favorites@index');
Route::get('/{id}', 'Favorites@show');

Route::post('/', 'Favorites@create');

Route::put('/{id}', 'Favorites@update');

Route::delete('/{id}', 'Favorites@delete');

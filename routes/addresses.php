<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'Addresses@index');
Route::get('/{id}', 'Addresses@show');

Route::post('/', 'Addresses@create');

Route::put('/{id}', 'Addresses@update');

Route::delete('/{id}', 'Addresses@delete');

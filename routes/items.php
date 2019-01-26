<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'Items@index');
Route::get('/{id}', 'Items@show');

Route::post('/', 'Items@create');

Route::put('/{id}', 'Items@update');

Route::delete('/{id}', 'Items@delete');

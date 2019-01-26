<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'Contents@index');
Route::get('/{id}', 'Contents@show');

Route::post('/', 'Contents@create');

Route::put('/{id}', 'Contents@update');

Route::delete('/{id}', 'Contents@delete');

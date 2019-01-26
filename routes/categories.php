<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'Categories@index');
Route::get('/{id}', 'Categories@show');

Route::post('/', 'Categories@create');

Route::put('/{id}', 'Categories@update');

Route::delete('/{id}', 'Categories@delete');

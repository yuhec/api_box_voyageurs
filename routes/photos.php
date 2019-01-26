<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'Photos@index');
Route::get('/{id}', 'Photos@show');

Route::post('/', 'Photos@create');

Route::put('/{id}', 'Photos@update');

Route::delete('/{id}', 'Photos@delete');

<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'Boxes@index');
Route::get('/{id}', 'Boxes@show');

Route::post('/', 'Boxes@create');

Route::put('/{id}', 'Boxes@update');

Route::delete('/{id}', 'Boxes@delete');

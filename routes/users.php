<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'Users@index');
Route::get('/{id}', 'Users@show');

Route::post('/', 'Users@create');

Route::put('/{id}', 'Users@update');

Route::delete('/{id}', 'Users@delete');

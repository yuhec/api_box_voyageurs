<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'EventTypes@index');
Route::get('/{id}', 'EventTypes@show');

Route::post('/', 'EventTypes@create');

Route::put('/{id}', 'EventTypes@update');

Route::delete('/{id}', 'EventTypes@delete');

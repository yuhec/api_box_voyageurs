<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'CategoryEvents@index');
Route::get('/{id}', 'CategoryEvents@show');

Route::post('/', 'CategoryEvents@create');

Route::put('/{id}', 'CategoryEvents@update');

Route::delete('/{id}', 'CategoryEvents@delete');

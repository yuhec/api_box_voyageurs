<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'PhotoEvents@index');
Route::get('/{id}', 'PhotoEvents@show');

Route::post('/', 'PhotoEvents@create');

Route::put('/{id}', 'PhotoEvents@update');

Route::delete('/{id}', 'PhotoEvents@delete');

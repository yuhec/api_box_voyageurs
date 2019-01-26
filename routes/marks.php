<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'Marks@index');
Route::get('/{id}', 'Marks@show');

Route::post('/', 'Marks@create');

Route::put('/{id}', 'Marks@update');

Route::delete('/{id}', 'Marks@delete');

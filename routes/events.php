<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'Events@index');
Route::get('/{id}', 'Events@show');

Route::post('/', 'Events@create');

Route::put('/{id}', 'Events@update');

Route::delete('/{id}', 'Events@delete');

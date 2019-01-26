<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'Genders@index');
Route::get('/{id}', 'Genders@show');

Route::post('/', 'Genders@create');

Route::put('/{id}', 'Genders@update');

Route::delete('/{id}', 'Genders@delete');

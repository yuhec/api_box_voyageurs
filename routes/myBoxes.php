<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'MyBoxes@index');
Route::get('/{id}', 'MyBoxes@show');

Route::post('/', 'MyBoxes@create');

Route::put('/{id}', 'MyBoxes@update');

Route::delete('/{id}', 'MyBoxes@delete');

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/happies/new', 'NengaController@new')->name('nenga.new');
Route::post('/happies', 'NengaController@create')->name('nenga.create');
Route::get('/happies/{nenga}', 'NengaController@show')->name('nenga.show');

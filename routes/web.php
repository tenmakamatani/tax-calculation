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

Route::get('/', 'TaxController@index');
Route::post('/', 'TaxController@calculate');
Route::post('/create', 'TaxController@create');
Route::post('/delete/{id}', 'TaxController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

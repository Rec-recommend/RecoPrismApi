<?php
use Illuminate\Http\Request;

Route::get('/', 'Guest\HomeController@index')->name('home');
Route::get('/create', 'Guest\ClientController@create')->name('ClientCreate');
Route::post('/store', 'Guest\ClientController@store')->name('ClientStore');



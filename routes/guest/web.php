<?php
use Illuminate\Http\Request;
Route::get('/test','TestController@index')->name('test');
Route::get('/', 'Guest\HomeController@index')->name('home');
Route::get('/create', 'Guest\ClientController@create')->name('ClientCreate');
Route::post('/store', 'Guest\ClientController@store')->name('ClientStore');
Route::post('/subscription', 'Guest\SubscriptionController@store')->name('subscription.store');




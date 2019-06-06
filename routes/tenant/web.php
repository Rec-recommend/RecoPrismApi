<?php
use Illuminate\Http\Request;

// Route::get('/', 'TestController@index')->name('home');
Auth::routes();

Route::get('/csv', 'Tenant\Web\CSVController@import')->name('csv.import');
Route::post('/csv', 'Tenant\Web\CSVController@store')->name('csv.store');

Route::get('/test', 'TestController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::resource('user', 'UserController', ['except' => ['show']]);
Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
Route::get('attributes', 'Tenant\AttributeController@index')->name('indexAttributes');
Route::get('attributes/create', 'Tenant\AttributeController@create')->name('createAttributes');
Route::post('attributes', 'Tenant\AttributeController@store')->name('storeAttributes');
Route::delete('attribute/{id}', 'Tenant\AttributeController@destroy')->name('deleteAttribute');
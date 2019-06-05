<?php
use Illuminate\Http\Request;
Auth::routes();

Route::get('/test', 'TestController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('applications', 'Api\TenantController@index')->name('tenantIndex');
Route::get('create', 'Api\TenantController@create')->name('createApp');
Route::post('store', 'Api\TenantController@store')->name('storeApp');
Route::delete('delete/{id}', 'Api\TenantController@delete')->name('deleteApp');
Route::resource('user', 'UserController', ['except' => ['show']]);
Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
Route::get('attributes', 'Tenant\AttributeController@index')->name('indexAttributes');
Route::get('attributes/create', 'Tenant\AttributeController@create')->name('createAttributes');
Route::post('attributes', 'Tenant\AttributeController@store')->name('storeAttributes');
Route::delete('attribute/{id}', 'Tenant\AttributeController@destroy')->name('deleteAttribute');

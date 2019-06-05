<?php
use Illuminate\Http\Request;
Auth::routes();

Route::get('/test', 'TestController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('applications', 'System\TenantController@index')->name('tenantIndex');
Route::delete('delete/{id}', 'System\TenantController@delete')->name('deleteApp');
Route::resource('user', 'UserController', ['except' => ['show']]);
Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

<?php
use Illuminate\Http\Request;

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


// Auth::routes();

// // Landing Page 
// Route::group([
//     'domain' => 'recoprism.com'
// ], function () {
//     Route::get('/', 'TestController@index')->name('home');
// });


// // Admin Routes:
// Route::group([
//     'domain' => 'admin.recoprism.com',
//     'middleware' => 'auth'
// ], function () {
//     Route::get('/home', 'HomeController@index')->name('home');;
//     Route::get('/', 'HomeController@index')->name('home');
// });

// Tenant(subdomain) Routes
// Route::group(['middleware' => 'tenant'], function () {
//     Route::get('/', 'HomeController@index')->name('home');
//     Route::get('applications', 'Api\TenantController@index')->name('tenantIndex');
//     Route::get('create', 'Api\TenantController@create')->name('createApp');
//     Route::post('store', 'Api\TenantController@store')->name('storeApp');
//     Route::delete('delete/{id}', 'Api\TenantController@delete')->name('deleteApp');
//     Route::resource('user', 'UserController', ['except' => ['show']]);
//     Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
//     Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
//     Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
//     Route::get('attributes','Tenant\AttributeController@index')->name('indexAttributes');
//     Route::get('attributes/create','Tenant\AttributeController@create')->name('createAttributes');
//     Route::post('attributes','Tenant\AttributeController@store')->name('storeAttributes');
//     Route::delete('attribute/{id}','Tenant\AttributeController@destroy')->name('deleteAttribute');
// });


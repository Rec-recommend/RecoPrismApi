<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::middleware(['auth'])->group(function () {

    Route::get('/test', 'TestController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('applications', 'System\TenantController@index')->name('tenantIndex');
    Route::delete('delete/{id}', 'System\TenantController@destroy')->name('deleteApp');
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::get('/packages/show', 'System\PlanController@show')->name('pkgshow');
    Route::get('/package/create', 'System\PlanController@create')->name('pkgcreate');
    Route::post('/package/store', 'System\PlanController@store')->name('pkgstore');
    Route::delete('/package/delete/{id}', 'System\PlanController@destroy')->name('pkgdestroy');
});

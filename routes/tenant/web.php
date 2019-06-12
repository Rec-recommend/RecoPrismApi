<?php
use Illuminate\Http\Request;

// Route::get('/', 'TestController@index')->name('home');
Auth::routes();



Route::middleware(['auth'])->group(function () {
Route::get('/csv', 'Tenant\Web\CSVController@import')->name('csv.import');
Route::post('/csv', 'Tenant\Web\CSVController@store')->name('csv.store');

Route::get('/test', 'TestController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::resource('user', 'UserController', ['except' => ['show']]);
Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
Route::get('attributes', 'Tenant\Web\AttributeController@index')->name('indexAttributes');
Route::get('attributes/create', 'Tenant\Web\AttributeController@create')->name('createAttributes');
Route::post('attributes', 'Tenant\Web\AttributeController@store')->name('storeAttributes');
Route::delete('attribute/{id}', 'Tenant\Web\AttributeController@destroy')->name('deleteAttribute');
Route::get('settings', 'Tenant\Web\SettingController@index')->name('setting.index');
Route::put('settings/{id}', 'Tenant\Web\SettingController@update')->name('setting.update');
Route::get('/subscription', 'Guest\SubscriptionController@index')->name('subscription.index');
Route::post('/swap', 'Guest\SubscriptionController@swap')->name('subscription.swap');
Route::get('/unsubscribe', 'Guest\SubscriptionController@unsubscribe')->name('subscription.unsubscribe');
Route::get('/resume', 'Guest\SubscriptionController@resume')->name('subscription.resume');

});
<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" mid dleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function () {
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
    Route::post('login', 'Auth\LoginController@login');
});


// Route::middleware('auth:api')->get('/user', function (Request $request) {
    // return $request->user();
// });
// Route::post('data', 'Api\TenantController@insert_data')->middleware(['apikeycheck','tenancy.enforce']);
// Route::middleware()->group(function () {
// });

Route::group(['middleware' => 'api'], function () {
    Route::apiResource('items', 'Api\Tenant\ItemController');
    Route::apiResource('users', 'Api\Tenant\UserController');
    Route::apiResource('ratings', 'Api\Tenant\RatingController');
    Route::apiResource('purchases', 'Api\Tenant\PurchaseController');
});

<?php

use Illuminate\Http\Request;

Route::group(['middleware' => 'api'], function () {
    Route::apiResource('items', 'Api\Tenant\ItemController');
    Route::apiResource('users', 'Api\Tenant\UserController');
    Route::apiResource('ratings', 'Api\Tenant\RatingController');
    Route::apiResource('purchases', 'Api\Tenant\PurchaseController');
});

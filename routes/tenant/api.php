<?php

use Illuminate\Http\Request;

Route::apiResource('items', 'Tenant\Api\ItemController');
Route::apiResource('users', 'Tenant\Api\UserController');
Route::apiResource('ratings', 'Tenant\Api\RatingController');
Route::apiResource('purchases', 'Tenant\Api\PurchaseController');

<?php
use Illuminate\Http\Request;

Route::group(['middleware' => 'system'],function(){
    Route::get('/', 'TestController@index')->name('home');
});

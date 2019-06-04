<?php
use Illuminate\Http\Request;

Route::group(['middleware' => 'system'],function(){
    Route::get('/', 'Guest\HomeController@index')->name('home');
});

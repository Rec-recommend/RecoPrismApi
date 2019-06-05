<?php
use Illuminate\Http\Request;

Route::get('/', 'Guest\HomeController@index')->name('home');

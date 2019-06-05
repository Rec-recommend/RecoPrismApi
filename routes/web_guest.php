<?php
use Illuminate\Http\Request;

Route::get('/', 'Guest\HomeController@index')->name('home');
Route::get('/register', 'Guest\RegistrationController@index')->name('Guestregister');
Route::post('/register', 'Guest\RegistrationController@store')->name('GuestregisterCreate');



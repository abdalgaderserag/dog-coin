<?php

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

Route::get('/', 'HomeController@index')->name('home')->middleware('guest');

Auth::routes();

Route::namespace('Auth')->middleware('guest')->group(function () {
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login')->name('login');
    Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', 'HomeController@home')->name('dashboard');
    Route::get('/profile/{slug?}', 'HomeController@profile')->name('profile');
    Route::get('/edit/profile', 'HomeController@authProfile')->name('profile');
    Route::put('/profile/edit', 'UserController@update')->name('user.update');
    Route::get('/request/send', 'HomeController@sendRequest')->name('request.send');
    Route::get('/request/recipient', 'HomeController@recipientRequest')->name('request.recipient');
    Route::get('/statical', 'HomeController@statical')->name('statical');
    Route::get('/favorite', 'HomeController@favorite')->name('favorite');

});
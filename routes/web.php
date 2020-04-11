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

Route::get('/', function () {
    return view('layout.user.index');
})->name(USER_HOME);

Route::namespace('Auth')->group(function () {
   Route::prefix('register')->group(function () {
      Route::get('/', 'RegisterController@showScreenRegister')->name(REGISTER_SHOW_SCREEN_REGISTER);
   });
});

//Route::get('/register', )

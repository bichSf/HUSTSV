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
        Route::get('/step1', 'RegisterController@showScreen1')->name(REGISTER_SHOW_SCREEN_1);
        Route::get('/step2', 'RegisterController@showScreen2')->name(REGISTER_SHOW_SCREEN_2);
        Route::get('/step3', 'RegisterController@showScreen3')->name(REGISTER_SHOW_SCREEN_3);
        Route::get('/step4', 'RegisterController@showScreen4')->name(REGISTER_SHOW_SCREEN_4);
        Route::post('/set-data-step1', 'RegisterController@setDataScreenStep1')->name(REGISTER_SET_DATA_SCREEN_STEP_1);
        Route::post('/set-data-step2', 'RegisterController@setDataScreenStep2')->name(REGISTER_SET_DATA_SCREEN_STEP_2);
        Route::post('/set-data-step3', 'RegisterController@sendMail')->name(REGISTER_SEND_MAIL);
        Route::get('/authentication/{verifiedToken}',
            'RegisterController@verifiedRegister')->name(REGISTER_VERIFIED_REGISTER);
        Route::post('/validateInfo', 'RegisterController@validateInfo')->name(REGISTER_VALIDATE_REGISTER);
    });
});
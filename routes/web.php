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
      Route::post('/set-data-step1', 'RegisterController@setDataScreenStep1')->name(REGISTER_SET_DATA_SCREEN_STEP_1);
      Route::post('/set-data-step2', 'RegisterController@setDataScreenStep2')->name(REGISTER_SET_DATA_SCREEN_STEP_2);
      Route::post('/set-data-step3', 'RegisterController@setDataScreenStep3')->name(REGISTER_SET_DATA_SCREEN_STEP_3);
      Route::post('/set-data-step4', 'RegisterController@setDataScreenStep4')->name(REGISTER_SET_DATA_SCREEN_STEP_4);
      Route::get('/step1', 'RegisterController@showScreen1')->name(REGISTER_SHOW_SCREEN_1);
      Route::get('/step2', 'RegisterController@setDataScreenStep4')->name(REGISTER_SET_DATA_SCREEN_STEP_4);
      Route::get('/step3', 'RegisterController@setDataScreenStep4')->name(REGISTER_SET_DATA_SCREEN_STEP_4);
      Route::get('/step4', 'RegisterController@setDataScreenStep4')->name(REGISTER_SET_DATA_SCREEN_STEP_4);
   });
});
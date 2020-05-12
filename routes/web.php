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

Route::get('/home', function () {
    return view('layout.home.index');
})->name(USER_HOME);

Route::get('/team', function () {
    return view('user.team');
})->name(USER_TEAM);

Route::get('/contact', function () {
    return view('user.contact');
})->name(USER_CONTACT);

Route::get('/faculties', function () {
    return view('user.faculties');
})->name(USER_FACULTIES);

Route::get('/', function () {
    return view('layout.home.index');
})->name(USER_TOP);

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
        Route::post('/normal', 'RegisterController@showScreenNormal')->name(REGISTER_SHOW_SCREEN_NORMAL);
    });
    Route::get('/login/facebook', 'LoginController@redirectToProvider')->name(LOGIN_USE_FACEBOOK);
    Route::get('/login/facebook/callback', 'LoginController@handleProviderCallback')->name(LOGIN_USE_FACEBOOK_CALLBACK);
    Route::get('/login/google', 'LoginController@redirectToProviderGoogle')->name(LOGIN_USE_GOOGLE);
    Route::get('/login/google/callback', 'LoginController@handleProviderCallbackGoogle')->name(LOGIN_USE_GOOGLE_CALLBACK);
});

Route::post('/register/normal/store', 'Backend\UserController@store');

/*
| Web Routes need to login
*/
Route::middleware(['auth'])->group(function () {
    Route::namespace('Backend')->group(function () {
        Route::get('/home', 'HomeController@index')->name(USER_HOME);
        Route::get('/register/profile', 'TeamController@create')->name(PROFILE_TEAM_CREATE);
        Route::post('/profile/leader/store', 'ProfileController@store')->name(PROFILE_LEADER_STORE);
        Route::post('/profile/team/store', 'TeamController@store')->name(PROFILE_TEAM_STORE);
    });
});
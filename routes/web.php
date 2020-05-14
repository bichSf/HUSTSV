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
    return view('user.top');
})->name(USER_TOP);

Route::namespace('Auth')->group(function () {
    Route::get('/home', function () {
        return view('layout.home.index');
    })->name(USER_HOME);
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
        Route::post('/normal/step2', 'RegisterController@showStep2Normal')->name(REGISTER_SHOW_SCREEN_NORMAL_STEP_2);
    });
    Route::prefix('login')->group(function () {
        Route::get('/facebook', 'LoginController@redirectToProvider')->name(LOGIN_USE_FACEBOOK);
        Route::get('/facebook/callback', 'LoginController@handleProviderCallback')->name(LOGIN_USE_FACEBOOK_CALLBACK);
        Route::get('/google', 'LoginController@redirectToProviderGoogle')->name(LOGIN_USE_GOOGLE);
        Route::get('/google/callback', 'LoginController@handleProviderCallbackGoogle')->name(LOGIN_USE_GOOGLE_CALLBACK);
        Route::get('/', 'LoginController@index')->name(LOGIN_INDEX);
        Route::post('/login', 'LoginController@login')->name(LOGIN);
    });

    Route::prefix('/pass-reminder')->group(function () {
        Route::get('/', 'ResetPasswordController@index')->name(USER_RESET_PASSWORD_INDEX);
        Route::post('/send-mail-reset-password',
            'ResetPasswordController@sendMailResetPassword')->name(USER_RESET_PASSWORD_SEND_MAIL);
        Route::get('/changepass/{token}',
            'ResetPasswordController@showScreenConfirmPassword')->name(USER_RESET_PASSWORD_CONFIRM);
        Route::post('/reset-password',
            'ResetPasswordController@updateChangePassword')->name(USER_RESET_PASSWORD_UPDATE);
    });

    Route::get('/logout', 'LoginController@logout')->name(LOGOUT);
});

Route::namespace('Backend')->group(function () {

});
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
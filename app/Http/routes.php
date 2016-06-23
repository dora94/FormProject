<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/forms',function(){
   return view('form/formList');
});

Route::get('/basic', function () {
    return view('base/navBar');
});

Route::get('generate', 'FormController@showCreate');

Route::post('generate','FormController@store');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

/* Facebook login */
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');


/* Email route */
Route::get('/sendEmail', function(){
    return view('form.emailForm');
});

Route::post('/send', 'EmailController@send');




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

Route::get('/forms','FormController@getFormInformation');

Route::get('/basic', function () {
    return view('base/navBar');
});

Route::get('generate', 'FormController@showCreate');
Route::post('generate/upload','FormController@storeFile');
Route::post('generate','FormController@store');
Route::get('submit/{url}', 'FormController@showSubmission');
Route::get('submission/{url}','SubmissionController@getSubmissions');
Route::get('submission/{url}/download','SubmissionController@getSubmissionsFile');
Route::post('submission/save','SubmissionController@storeSubmission');
Route::get('download/{name}','FormController@getFile');


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




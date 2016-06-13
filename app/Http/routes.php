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

Route::get('/basic', function () {
    return view('form/baseForm');
});

Route::get('/generate', function () {
    return view('form/formGenerator');
});

Route::get('/login', function () {
    return view('user/loginForm');
});

Route::get('/register', function () {
    return view('user/registerForm');
});





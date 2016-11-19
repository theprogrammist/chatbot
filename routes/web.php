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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/register/success', function () {
    return view('auth.register-success-confirmation')
        ->with('resultMessage', 'Для подтверждения электронной почты откройте письмо от нашего сервиса и перейдите по ссылке в теле письма.');
});

Route::get('register/verify/{confirmation_code?}', [
    'uses' => 'Auth\RegisterController@confirm'
]);
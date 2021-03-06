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

Route::get('/', ['uses' => 'LoginController@login']);
Route::post('Login/loginVerify', ['uses' => 'LoginController@loginVerify']);
Route::get('System/userRight', ['uses' => 'SystemController@userRight']);
Route::get('System/page', ['uses' => 'SystemController@page']);
Route::get('System/visitSelect', ['uses' => 'SystemController@visitSelect']);
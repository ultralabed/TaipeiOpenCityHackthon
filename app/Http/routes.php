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

// Route::post('auth/register', 'Auth\AuthController@postRegister');

// Route::post('hihi', function() {
// 	return 'hihi';
// });

Route::post('register', 'Ed\EdController@register')->middleware('cors');

Route::post('login', 'Ed\EdController@login')->middleware('cors');

Route::post('storeEventToList', 'ListController@store')->middleware('cors');

Route::post('uploadFileToList', 'ListController@uploadFile')->middleware('cors');

Route::get('lists/{lat}/{lon}','ListController@index')->middleware('cors');

Route::get('user/{id}/lists','ListController@user')->middleware('cors');


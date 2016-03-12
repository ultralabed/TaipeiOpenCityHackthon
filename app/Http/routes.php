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

Route::post('ed/register', 'Ed\EdController@register');

Route::post('ed/login', 'Ed\EdController@login');

Route::post('storeEventToList', 'ListController@store');

Route::post('uploadFileToList', 'ListController@uploadFile');

Route::get('lists/{lat}/{lon}','ListController@index');

Route::get('user/{id}/lists',function(){
    $data = [
        ['name'=>'list1'],['name'=>'list2'],['name'=>'list3']
    ];
    return response()->json($data);
});


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
Route::filter(
    'cors',
    function ($route, $request, $response) {

        if (! empty($response)) {

            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->headers->set(
                'Access-Control-Allow-Methods',
                'POST, GET, OPTIONS, DELETE, PUT, HEAD'
            );
            $response->headers->set(
                'Access-Control-Allow-Headers',
                implode(
                    ', ',
                    [
                        'Origin', 'Content-Type', 'Accept', 'Authorization',
                        'X-Requested-With'
                    ]
                )
            );
            $response->headers->set('Access-Control-Allow-Credentials', 'true');
            $response->headers->set('Access-Control-Expose-Headers', '');
            $response->headers->set('Access-Control-Max-Age', time() + 2629746);

            return $response;
        }
    }
);

Route::get('/', function () {
    return view('welcome');
});

// Route::post('auth/register', 'Auth\AuthController@postRegister');

// Route::post('hihi', function() {
// 	return 'hihi';
// });

Route::post('register', 'Ed\EdController@register');

Route::post('login', 'Ed\EdController@login');

Route::post('storeEventToList', 'ListController@store');

Route::post('uploadFileToList', 'ListController@uploadFile');

Route::get('lists/{lat}/{lon}','ListController@index');

Route::get('user/{id}/lists','ListController@user');


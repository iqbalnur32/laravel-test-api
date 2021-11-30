<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([], function() {
	Route::get('all', 'RestApiController@get_all');
	Route::get('get-id/{id}', 'RestApiController@readyById');
	Route::post('create', 'RestApiController@create');
	Route::post('update/{id}', 'RestApiController@update');
	Route::post('delete/{id}', 'RestApiController@delete');
});

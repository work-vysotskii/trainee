<?php

use Illuminate\Http\Request;

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

Route::get('/application','ApplicationController@index');
Route::post('/application','ApplicationController@store');
Route::put('/application/{id}','ApplicationController@edit');
Route::delete('/application/{id}','ApplicationController@delete');
Route::put('/application/{id}/approve','ApplicationController@approve');


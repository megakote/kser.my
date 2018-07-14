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

Route::post('/form/feedback', 'FormController@addFeedback');
Route::post('/form/order', 'FormController@createOrder');
Route::post('/form', 'FormController@addForm');
Route::post('/work-status', 'FormController@workStatus');

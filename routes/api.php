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

Route::post('users1/{user_id}', function ($user_id) {
    return $user_id;
});

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

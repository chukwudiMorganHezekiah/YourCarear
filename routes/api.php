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

Route::post("select_profile_image","UserController@index");

Route::get('usingreact',function(){
    return "goon";
});
Route::post("submitjob","ApplicationController@store");


Route::get("search_jobs/{value}","JobController@search");


<?php

use Illuminate\Http\Request;
use App\FunEvents;
use App\FunEventsController;
use App\ExtApp;
use App\ExtAppController;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::get('events', 'FunEventsController@index');
Route::get('events/{id}', 'FunEventsController@show');
Route::post('events', 'FunEventsController@store');
Route::put('events/{id}', 'FunEventsController@update');
Route::delete('events/{id}', 'FunEventsController@delete');
Route::get('extevents', 'ExtAppController@index');
Route::get('extevents/{id}', 'ExtAppController@show');
Route::post('extevents', 'ExtAppController@store');
Route::put('extevents/{id}', 'ExtAppController@update');
Route::delete('extevents/{id}', 'ExtAppController@delete');

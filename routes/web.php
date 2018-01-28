<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('fun-event-created', function(){

    \App\FunEvents::create(['title'=>'test 2', 'body'=>'testing event',
    'date'=>'2018-10-10 16:20', 'venue'=>'NYC','price'=>100]);

    dd('created successfully.');

});



Route::get('fun-event-updated/{id}', function($id){

    \App\FunEvents::find($id)->update(['title'=>'test 8', 'price'=>400]);

    dd(' updated successfully.');

});



Route::get('fun-event-deleted/{id}', function($id){

    \App\FunEvents::find($id)->delete();

    dd('deleted successfully.');

});

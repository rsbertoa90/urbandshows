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

Route::get('/songs','SongController@getAll');
Route::get('/events','EventController@getAll');
Route::get('/tags','TagController@getAll');
Route::get('/sets','SetController@getAll');
Route::get('/contacts','ContactController@getall');

Route::get('/metadatas','MetadataController@getAll');

Route::get('/states','StateController@get');

Route::get('/city/{id}','StateController@getCity');


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


Auth::routes();

Route::middleware('CheckAdmin')->prefix('admin')->group(function(){

    Route::get('/','AdminController@tableView');

    Route::post('/category','CategoryController@create');

    Route::post('/product','ProductController@create');

    Route::post('/product/image','ProductImageController@create')->middleware('OptimizeImages');
    Route::delete('/product/image/{id}','ProductImageController@destroy');
});


Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', function(){return redirect('/');});

Route::get('/cotizador','HomeController@cotizer');
Route::get('/regalos-empresariales',function(){return redirect('/');});
Route::get('/franquicia',function(){return redirect('/');});
Route::get('/sucursales',function(){return redirect('/');});
Route::get('/contacto',function(){return redirect('/');});


Route::get('/logout',function(){
    Auth::logout();
    return redirect('/');
});
Auth::routes();


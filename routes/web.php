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

Route::middleware('CheckSuper')->prefix('super')->group(function(){
    Route::get('/', 'SuperController@panel');

    Route::post('/category/image','CategoryController@uploadImage')->middleware('OptimizeImages');

    Route::put('/metadata','MetadataController@update');
});


Route::middleware('CheckAdmin')->prefix('admin')->group(function(){

    Route::get('/','AdminController@tableView');
    Route::get('/cotizador','AdminController@cotizador');

    Route::post('/category','CategoryController@create');
    Route::put('/category','CategoryController@update');


    Route::post('/product','ProductController@create');
    Route::put('/product','ProductController@update');

    Route::post('/product/image','ProductImageController@create')->middleware('OptimizeImages');
    Route::delete('/product/image/{id}','ProductImageController@destroy');

    Route::put('/order','OrderController@edit');
    Route::get('/ordenes','AdminController@orders');
    Route::get('/getOrders','OrderController@getOrders');
});


Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', function(){return redirect('/');});

Route::get('/cotizador','HomeController@cotizer');
Route::get('/regalos-empresariales','HomeController@regalosEmpresariales');
Route::get('/franquicia','HomeController@franquicia');
Route::get('/sucursales','HomeController@sucursales');
Route::get('/contacto','HomeController@contacto');

Route::get('/logout',function(){
    Auth::logout();
    return redirect('/');
});
Auth::routes();


Route::get('/getUser','HomeController@getUser');

Route::post('cotizer/send','OrderController@create');



/* ESTAS RUTAS SIEMPRE AL FINAL */

Route::get('/{category}','CategoryController@detail');

Route::get('/{category}/{product}','ProductController@detail');